<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Sesi;
use App\Models\Ruangan;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Str;
use App\Models\JadwalSidang;
use Illuminate\Http\Request;
use App\Models\PembimbinganNaskah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PembimbinganNaskahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'dosen'){
            $pn = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                                        ->where('sidang_type', 'naskah_proposal')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->orderBy('id', 'asc')
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $pn = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->where('sidang_type', 'naskah_proposal')->get();
        }else{
            $pn = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->orderBy('id', 'asc')->where('sidang_type', 'naskah_proposal')->get();
        }

        return view('mahasiswa.pembimbingan_naskah.index', compact('pn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sesi = Sesi::get();
        $ruang = Ruangan::get();

        return view('mahasiswa.pembimbingan_naskah.create', compact('sesi', 'ruang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'judul' => 'required',
            'draft' => 'required|file|mimes:pdf,doc,docx|max:10024',
            'sesi_id' => 'required',
            'tanggal' => 'required',
            'ruangan_id' => 'required',
        ]);

        $ru = $request->ruangan_id;
        $se = $request->sesi_id;

        if(JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'statusInternalJudul', 'sesi', 'ruangan')
                            ->where('tanggal', '=', $request->tanggal)
                            ->whereHas('sesi', function($q) use($se){
                                $q->where('id', '=', $se);
                            })
                            ->whereHas('ruangan', function($q) use($ru){
                                $q->where('id', '=', $ru);
                            })
                            ->exists()){
                                Alert::toast('Jadwal Sudah Terisi', 'error');
                                return redirect()->back()->withInput();
                            }
                            else{
            $draft = Auth::user()->name. '_' .'Internal Naskah Proposal'. '_' .date('d-m-Y'). '.' . $request->draft->extension();
            $request->file('draft')->move('skripsi1/pembimbingan_naskah', $draft);

            $itj = JadwalSidang::create([
                'mahasiswa_id' => $request->iduser,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'tanggal' => $request->tanggal,
                'sesi_id' => $request->sesi_id,
                'ruangan_id' => $request->ruangan_id,
                'sidang_type' => $request->sidang_type,
                'draft' => $draft,
            ]);

            Alert::toast('Data Berhasil Dikirim', 'success');
            return redirect()->route('pembimbingan-naskah.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembimbinganNaskah  $pembimbinganNaskah
     * @return \Illuminate\Http\Response
     */
    public function show(PembimbinganNaskah $pembimbinganNaskah)
    {
        //
    }

    public function edit($id)
    {
        $naskahProposal = JadwalSidang::where('sidang_type', 'naskah_proposal')->find($id);
        try {
                if($naskahProposal->mahasiswa_id != auth()->user()->mahasiswa->id){
                    Alert::toast('Error', 'error');
                    return redirect()->back();
                }
            } catch (Exception $e){
                Alert::toast('Error', 'error');
                return redirect()->back();
        }
        $ruangan = Ruangan::get();
        $sesi = Sesi::get();

        return view('mahasiswa.pembimbingan_naskah.edit', compact('naskahProposal', 'ruangan', 'sesi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ruangan_id' => 'required',
            'sesi_id' => 'required',
            'tanggal' => 'required',
            'draft' => 'file|mimes:pdf,doc,docx|max:10024'
        ]);
        $ru = $request->ruangan_id;
        $se = $request->sesi_id;

        if(JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                            ->where('tanggal', '=', $request->tanggal)
                            ->where('mahasiswa_id', '!=', Auth::user()->mahasiswa->id)
                            ->whereHas('sesi', function($q) use($se){
                                $q->where('id', '=', $se);
                            })
                            ->whereHas('ruangan', function($q) use($ru){
                                $q->where('id', '=', $ru);
                            })
                            ->exists()){
                                Alert::toast('Jadwal Sudah Terisi', 'error');
                                return redirect()->back()->withInput();
        }else{
            $naskahProposal = JadwalSidang::with('mahasiswa')->find($id);
            $reqpro = $request->all();

            if($draft = $request->file('draft')) {
                File::delete('skripsi1/pembimbingan_naskah'.$naskahProposal->draft);
                $destinationPath = 'skripsi1/pembimbingan_naskah';
                $filename = $naskahProposal->mahasiswa->user->name. '_' .'Internal Naskah Proposal '. '_' .date('d-m-Y'). '.' . $request->draft->extension();
                $draft->move($destinationPath, $filename);
                $reqpro['draft'] = "$filename";
            }else{
                unset($reqpro['draft']);
            }

            $naskahProposal->update($reqpro);

            Alert::toast('Data Berhasil Diupdate', 'success');

            return redirect()->route('pembimbingan-naskah.index');
        }
    }


    public function destroy($id)
    {
        $naskahProposal = JadwalSidang::where('sidang_type', 'naskah_proposal')->find($id);

        $naskahProposal->delete();

        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();

    }

    public function berita(Request $request)
    {
        $pdf = new Fpdi();


        $nama = $request->nama;
        $nim = $request->nim;
        $prodi = $request->prodi;
        $ruangan = $request->ruangan;
        $tanggal = $request->tanggal;
        $sesi = $request->sesi;
        $judul = $request->judul;
        $dospem_satu = $request->dospem_satu;
        $dospem_dua = $request->dospem_dua;

        // To add a page
        $pdf->AddPage();

        // set the source file
        // Below is the path of pdf in which you going to print details.
        //  Right now i had blank pdf
        $path = public_path("/skripsi1/pembimbingan_naskah/BA/BA .pdf");

        // Set path
        $pdf->setSourceFile($path);

        // import page 1
        // define page number
        // if you want to print detail in page to you have to write 2 instead of 1.
        // right now we have only one page pdf.

        $tplId = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplId, null, null, null, 210, true);

        // Now this details we are going to print in pdf.
        // Horizontal and veritcal setXY


        // $pdf->SetXY(120, 90);
        // Details you want to print

       // let's bring another below it

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(47);
        $pdf->SetX(35);
        $pdf->Cell(15, 5, Carbon::parse($tanggal)->translatedFormat('l'), 0, 1, 'L');

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(47);
        $pdf->SetX(55);
        $pdf->Cell(15, 5, Carbon::parse($tanggal)->translatedFormat('d'), 0, 1, 'L');

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(47);
        $pdf->SetX(70);
        $pdf->Cell(15, 5, Carbon::parse($tanggal)->translatedFormat('F'), 0, 1, 'L');

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(47);
        $pdf->SetX(92);
        $pdf->Cell(10, 5, Carbon::parse($tanggal)->translatedFormat('Y'), 0, 1, 'L');

        //Sesi
        $pdf->SetFont('Times','','8');
        $pdf->SetY(47);
        $pdf->SetX(109);
        $pdf->Cell(10, 5, Carbon::parse($sesi)->translatedFormat('H:i'), 0, 1, 'L');

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(51);
        $pdf->SetX(43);
        $pdf->Cell(10, 5, $ruangan, 0, 1, 'C');

        //Nama
        $pdf->SetFont('Times','','8');
        $pdf->SetY(93);
        $pdf->SetX(42);
        $pdf->Cell(10, 5, $nama, 0, 1, 'L');

        //NIM
        $pdf->SetFont('Times','','8');
        $pdf->SetY(97);
        $pdf->SetX(42);
        $pdf->Cell(10, 5, $nim, 0, 1, 'L');

        //Prodi
        $pdf->SetFont('Times','','8');
        $pdf->SetY(101);
        $pdf->SetX(42);
        $pdf->Cell(10, 5, $prodi, 0, 1, 'L');

        // judul
        // $pdf->SetFont('Times','','8');
        // $pdf->SetY(102);
        // $pdf->SetX(42);
        // $pdf->MultiCell(100, 4, $judul, 0, 'L');

        //Tanggal
        $pdf->SetFont('Times','','8');
        $pdf->SetY(142);
        $pdf->SetX(93);
        $pdf->Cell(10, 5, Carbon::parse($tanggal)->translatedFormat('l d F Y'), 0, 1, 'L');

        //Dospem1
        $pdf->SetFont('Times','B','8');
        $pdf->SetY(168);
        $pdf->SetX(16.5);
        $pdf->Cell(10, 5, $dospem_satu, 0, 1, 'L');

        //Dospem2
        $pdf->SetFont('Times','B','8');
        $pdf->SetY(168);
        $pdf->SetX(84);
        $pdf->Cell(10, 5, $dospem_dua, 0, 1, 'L');

        // Because I is for preview for browser.
        return $pdf->Output('D', 'Berita Acara Sidang Pembimbingan Naskah_'.$nama.''.'.pdf', true);
    }
}
