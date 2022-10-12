<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sesi;
use App\Models\Ruangan;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;
use App\Models\InternalJudul;
use Illuminate\Support\Facades\DB;
use App\Models\StatusInternalJudul;
use Illuminate\Support\Facades\Auth;
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
            $interjudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'statusInternalJudul', 'sesi', 'ruangan')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $interjudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'statusInternalJudul', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
            // dd($interjudul);
        }else{
            $interjudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'statusInternalJudul', 'sesi', 'ruangan')->get();
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

        $draft = Auth::user()->name. '_' .'Sidang Internal Judul'. '_' .date('Y-m-d'). '.' . $request->draft->extension();
        $request->file('draft')->move('skripsi1/internal_judul', $draft);

        $itj = InternalJudul::create([
            'mahasiswa_id' => $request->iduser,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'sesi_id' => $request->sesi_id,
            'ruangan_id' => $request->ruangan_id,
            'draft' => $draft,
        ]);
        StatusInternalJudul::create([
            'status_dospem1' => 'menunggu',
            'status_dospem2' => 'menunggu',
            'internal_judul_id' => $itj->id,
        ]);

        Alert::toast('Data Berhasil Dikirim', 'success');
        return redirect()->route('internal-judul.index');
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
    public function edit(InternalJudul $internalJudul)
    {
        if($internalJudul->mahasiswa_id != auth()->user()->mahasiswa->id){
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
        $internalJudul = InternalJudul::find($id);

        $request->validate([
            'ruangan_id' => 'required',
            'sesi_id' => 'required',
            'tanggal' => 'required',
        ]);

        $internalJudul->update([
            'ruangan_id' => $request->ruangan_id,
            'sesi_id' => $request->sesi_id,
            'tanggal' => $request->tanggal,
        ]);

        StatusInternalJudul::where('id', $internalJudul->id)
                                ->update([
                                    'status_dospem1' => 'menunggu',
                                    'status_dospem2' => 'menunggu'
                                ]);

        // if($internalJudul->statusInternalJudul->status_dospem1 == 'ditolak' &&  $internalJudul->statusInternalJudul->status_dospem2 == 'disetujui'){
        //     StatusInternalJudul::where('id', $internalJudul->id)
        //                         ->update([
        //                             'status_dospem1' => 'menunggu'
        //                         ]);
        // }elseif($internalJudul->statusInternalJudul->status_dospem1 == 'disetujui' &&  $internalJudul->statusInternalJudul->status_dospem2 == 'ditolak'){
        //     StatusInternalJudul::where('id', $internalJudul->id)->
        //                         update([
        //                             'status_dospem2' => 'menunggu'
        //                         ]);
        // }else{

        // }

        Alert::toast('Data Berhasil Diupdate', 'success');

        return redirect()->route('internal-judul.index');

    }

    public function updateDosen(Request $request, $id)
    {
        $request->validate([
            'status_dospem1' => 'required',
            'status_dospem2' => 'required',
        ]);

        $status = StatusInternalJudul::find($id);
        // dd($status);

        $status->update([
            'status_dospem1' => $request->status_dospem1,
            'status_dospem2' => $request->status_dospem2,
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
    public function destroy(InternalJudul $internalJudul)
    {
        //
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
        // $pdf->SetY(101);
        // $pdf->SetX(42);
        // $pdf->MultiCell(100, 5, 'Pengembangan materi dan metode pelatihan pasien simulasi sebagai evaluasi KIE obat Rinitis alergi mahasiswa Farmasi Universitas X', 0, 'L');

        //Tanggal
        $pdf->SetFont('Times','','8');
        $pdf->SetY(142);
        $pdf->SetX(93);
        $pdf->Cell(10, 5, Carbon::parse($tanggal)->translatedFormat('l d F Y'), 0, 1, 'L');

        //Dospem1
        $pdf->SetFont('Times','','8');
        $pdf->SetY(168);
        $pdf->SetX(16.5);
        $pdf->Cell(10, 5, $dospem_satu, 0, 1, 'L');

        //Dospem2
        $pdf->SetFont('Times','','8');
        $pdf->SetY(168);
        $pdf->SetX(84);
        $pdf->Cell(10, 5, $dospem_dua, 0, 1, 'L');

        // Because I is for preview for browser.
        return $pdf->Output('I', 'sertif'.'.pdf', true);
    }
}
