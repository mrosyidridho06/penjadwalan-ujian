<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sesi;
use App\Models\Ruangan;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;
use App\Models\InternalJudul;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class InternalJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'dosen'){
            $interjudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospem', 'sesi', 'ruangan')->get();
        }else{
            $interjudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospem', 'sesi', 'ruangan')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
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

        InternalJudul::create([
            'mahasiswa_id' => $request->iduser,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'sesi_id' => $request->sesi_id,
            'ruangan_id' => $request->ruangan_id,
            'draft' => $draft,
        ]);

        Alert::toast('Data Berhasil Dikirim', 'success');
        return redirect()->route('index');
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
        // $interjudul = InternalJudul::with('mahasiswa', 'mahasiswa.dospem', 'sesi', 'ruangan')->find($internalJudul);
        if(auth()->check()){
            if(auth()->user()->role == 'dosen' || auth()->user()->role == 'admin'){
                $internalJuduls = InternalJudul::with('mahasiswa', 'sesi', 'ruangan')->where('id', $id)->get();
            }elseif(auth()->user()->role == 'mahasiswa'){
                $internalJuduls = InternalJudul::with('mahasiswa', 'sesi', 'ruangan')->where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('id', $id)->get();
            }else{
                abort(404);
            }
        }


        return view('mahasiswa.internal_judul.edit', compact('internalJuduls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternalJudul  $internalJudul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternalJudul $internalJudul)
    {
        $request->validate([
            'status' => 'required'
        ]);


        $internalJudul->update([
            'status' => $request->status,
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

        // To add a page
        $pdf->AddPage();

        // set the source file
        // Below is the path of pdf in which you going to print details.
        //  Right now i had blank pdf
        $path = public_path("/skripsi1/internal_judul/BA/BA Sidang Internal Judul.pdf");

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
        $pdf->SetX(30);
        $pdf->Cell(10, 5, $ruangan, 0, 1, 'L');

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

        //Tanggal
        $pdf->SetFont('Times','','8');
        $pdf->SetY(142);
        $pdf->SetX(93);
        $pdf->Cell(10, 5, Carbon::parse($tanggal)->translatedFormat('l d F Y'), 0, 1, 'L');


        // Because I is for preview for browser.
        return $pdf->Output('I', 'sertif'.'.pdf', true);
    }
}
