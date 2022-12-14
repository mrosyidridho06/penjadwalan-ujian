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
use App\Models\InternalJudul;
use Illuminate\Support\Facades\DB;
use App\Models\StatusInternalJudul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;

class InternalJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'dosen'){
            $interjudul = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')
                                        ->where('sidang_type', 'internal_judul')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->orderBy('id', 'asc')
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $interjudul = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->where('sidang_type', 'internal_judul')->get();
        }else{
            $interjudul = JadwalSidang::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan')->orderBy('id', 'asc')->where('sidang_type', 'internal_judul')->get();
        }

        return view('mahasiswa.internal_judul.index', compact('interjudul'));
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


        return view('mahasiswa.internal_judul.create', compact('sesi', 'ruang'));
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
            $draft = Auth::user()->name. '_' .'Internal Judul'. '_' .date('d-m-Y'). '.' . $request->draft->extension();
            $request->file('draft')->move('skripsi1/internal_judul', $draft);

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
            return redirect()->route('internal-judul.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternalJudul  $internalJudul
     * @return \Illuminate\Http\Response
     */
    public function show(InternalJudul $internalJudul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternalJudul  $internalJudul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internalJudul = JadwalSidang::find($id);
        try {
                if($internalJudul->mahasiswa_id != auth()->user()->mahasiswa->id){
                    Alert::toast('Error', 'error');
                    return redirect()->back();
                }
            } catch (Exception $e){
                Alert::toast('Error', 'error');
                return redirect()->back();
        }
        $ruangan = Ruangan::get();
        $sesi = Sesi::get();

        return view('mahasiswa.internal_judul.edit', compact('internalJudul', 'ruangan', 'sesi'));

    }

    public function editDosen($id)
    {
        $internalJudul = InternalJudul::find($id);

        // $internalJuduls = InternalJudul::find($id);

        return view('dosen.internal_judul.edit', compact('internalJudul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternalJudul  $internalJudul
     * @return \Illuminate\Http\Response
     */
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
                            // ->where('sidang_type', 'internal_judul')
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
            $internalJudul = JadwalSidang::with('mahasiswa')->find($id);
            $interjudul = $request->all();

            if($draft = $request->file('draft')) {
                File::delete('skripsi1/internal_judul'.$internalJudul->draft);
                $destinationPath = 'skripsi1/internal_judul';
                $filename = $internalJudul->mahasiswa->user->name. '_' .'Internal Judul'. '_' .date('d-m-Y'). '.' . $request->draft->extension();
                $draft->move($destinationPath, $filename);
                $interjudul['draft'] = "$filename";
            }else{
                unset($interjudul['draft']);
            }

            $internalJudul->update($interjudul);

            Alert::toast('Data Berhasil Diupdate', 'success');

            return redirect()->route('internal-judul.index');
        }

    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'status_dospem1' => 'required',
            'status_dospem2' => 'required',
        ]);

        Alert::toast('Data Berhasil Diupdate', 'success');

        return redirect()->route('internal-judul.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternalJudul  $internalJudul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internalJudul = JadwalSidang::where('sidang_type', 'internal_judul')->find($id);

        $internalJudul->delete();
        Alert::toast('Data Berhasil Dihapus', 'success');
        return redirect()->back();

    }

    public function sertifikat(Request $request)
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
        $path = public_path("/skripsi1/internal_judul/BA/BA Sidang Internal Judul1.pdf");

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
        return $pdf->Output('D', 'Berita Acara Sidang Internal Judul_'.$nama.''.'.pdf', true);
    }

    public function undangan(Request $request)
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
        $path = public_path("/skripsi1/internal_judul/BA/BA Sidang Internal Judul1.pdf");

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
        return $pdf->Output('D', 'Berita Acara Sidang Internal Judul_'.$nama.''.'.pdf', true);
    }
}
