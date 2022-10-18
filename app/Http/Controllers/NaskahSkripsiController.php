<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sesi;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Ruangan;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;
use App\Models\NaskahSkripsi;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class NaskahSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'dosen'){
            $naskah = NaskahSkripsi::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan', 'pengujiSatu.user', 'pengujiDua.user', 'pengujiTiga.user')
                                        ->whereHas('mahasiswa', function ($query){
                                            $query->where('dospem_satu', Auth::user()->dosen->id);
                                        })
                                        ->orWhereHas('mahasiswa', function ($query){
                                            $query->where('dospem_dua', Auth::user()->dosen->id);
                                        })
                                        ->orderBy('id', 'asc')
                                        ->get();
        }elseif(auth()->user()->role == 'mahasiswa'){
            $naskah = NaskahSkripsi::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan', 'pengujiSatu.user', 'pengujiDua.user', 'pengujiTiga.user')->where('mahasiswa_id', auth()->user()->mahasiswa->id)->get();
            // dd($naskah);
        }else{
            $naskah = NaskahSkripsi::with('mahasiswa', 'mahasiswa.dospemSatu.user','mahasiswa.dospemDua.user', 'sesi', 'ruangan', 'pengujiSatu.user', 'pengujiDua.user', 'pengujiTiga.user')->orderBy('id', 'asc')->get();
        }

        return view('mahasiswa.ujian_naskah.index', compact('naskah'));
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
        $dosen = Dosen::with('user')->get();

        return view('mahasiswa.ujian_naskah.create', compact('sesi', 'ruang', 'dosen'));
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
            'penguji1' => 'required',
            'penguji2' => 'required',
            'penguji3' => 'required',
            'draft' => 'required|file|mimes:pdf,doc,docx|max:10024',
            'sesi_id' => 'required',
            'tanggal' => 'required',
            'ruangan_id' => 'required',
        ]);

        $draft = Auth::user()->name. '_' .'Ujian Naskah Skripsi'. '_' .date('Y-m-d'). '.' . $request->draft->extension();
        $request->file('draft')->move('skripsi3/ujiannaskah_skripsi', $draft);

        NaskahSkripsi::create([
            'mahasiswa_id' => $request->iduser,
            'judul' => $request->judul,
            'penguji1' => $request->penguji1,
            'penguji2' => $request->penguji2,
            'penguji3' => $request->penguji3,
            'tanggal' => $request->tanggal,
            'sesi_id' => $request->sesi_id,
            'ruangan_id' => $request->ruangan_id,
            'draft' => $draft,
        ]);

        Alert::toast('Data Berhasil Dikirim', 'success');
        return redirect()->route('ujiannaskah-skripsi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NaskahSkripsi  $naskahSkripsi
     * @return \Illuminate\Http\Response
     */
    public function show(NaskahSkripsi $naskahSkripsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NaskahSkripsi  $naskahSkripsi
     * @return \Illuminate\Http\Response
     */
    public function edit(NaskahSkripsi $naskahSkripsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NaskahSkripsi  $naskahSkripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NaskahSkripsi $naskahSkripsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NaskahSkripsi  $naskahSkripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(NaskahSkripsi $naskahSkripsi)
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
        $judul = $request->judul;
        $dospem_satu = $request->dospem_satu;
        $dospem_dua = $request->dospem_dua;

        // To add a page
        $pdf->AddPage();

        // set the source file
        // Below is the path of pdf in which you going to print details.
        //  Right now i had blank pdf
        $path = public_path("/skripsi3/ujiannaskah_skripsi/BA/BA Sidang Internal Judul1.pdf");

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
        return $pdf->Output('D', 'Berita Acara Ujian Naskah Skripsi_'.$nama.''.'.pdf', true);
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
        $penguji1 = $request->penguji1;
        $penguji2 = $request->penguji2;
        $penguji3 = $request->penguji3;
        $dospem_satu = $request->dospem_satu;
        $dospem_dua = $request->dospem_dua;

        // To add a page
        $pdf->AddPage();

        // set the source file
        // Below is the path of pdf in which you going to print details.
        //  Right now i had blank pdf
        $path = public_path("/skripsi3/ujiannaskah_skripsi/Undangan/Undangan.pdf");

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

        //Dospem1
        $pdf->SetFont('Times','','8');
        $pdf->SetY(58);
        $pdf->SetX(18);
        $pdf->Cell(10, 5, $dospem_satu, 0, 1, 'L');

        //Dospem2
        $pdf->SetFont('Times','','8');
        $pdf->SetY(61);
        $pdf->SetX(18);
        $pdf->Cell(10, 5, $dospem_dua, 0, 1, 'L');

        //Penguji1
        $pdf->SetFont('Times','','8');
        $pdf->SetY(64.5);
        $pdf->SetX(18);
        $pdf->Cell(10, 5, $penguji1, 0, 1, 'L');

        //Penguji2
        $pdf->SetFont('Times','','8');
        $pdf->SetY(68);
        $pdf->SetX(18);
        $pdf->Cell(10, 5, $penguji2, 0, 1, 'L');

        //Penguji3
        $pdf->SetFont('Times','','8');
        $pdf->SetY(72);
        $pdf->SetX(18);
        $pdf->Cell(10, 5, $penguji3, 0, 1, 'L');

        //Nama
        $pdf->SetFont('Times','','8');
        $pdf->SetY(101);
        $pdf->SetX(40);
        $pdf->Cell(10, 5, $nama, 0, 1, 'L');

        //NIM
        $pdf->SetFont('Times','','8');
        $pdf->SetY(104.5);
        $pdf->SetX(40);
        $pdf->Cell(10, 5, $nim, 0, 1, 'L');

        //Prodi
        $pdf->SetFont('Times','','8');
        $pdf->SetY(108);
        $pdf->SetX(40);
        $pdf->Cell(10, 5, $prodi, 0, 1, 'L');

        // judul
        $pdf->SetFont('Times','','8');
        $pdf->SetY(112);
        $pdf->SetX(40);
        $pdf->MultiCell(100, 4, $judul, 0, 'L');

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(126.5);
        $pdf->SetX(45);
        $pdf->Cell(15, 5, Carbon::parse($tanggal)->translatedFormat('l, d F Y'), 0, 1, 'L');

        //Sesi
        $pdf->SetFont('Times','','8');
        $pdf->SetY(130.5);
        $pdf->SetX(45);
        $pdf->Cell(10, 5, Carbon::parse($sesi)->translatedFormat('H:i'), 0, 1, 'L');

        //Hari
        $pdf->SetFont('Times','','8');
        $pdf->SetY(134.5);
        $pdf->SetX(45);
        $pdf->Cell(10, 5, $ruangan, 0, 1, 'L');

        //Tanggal
        $pdf->SetFont('Times','','8');
        $pdf->SetY(149.5);
        $pdf->SetX(77);
        $pdf->Cell(10, 5, Carbon::parse($tanggal)->translatedFormat('l d F Y'), 0, 1, 'L');

        // Because I is for preview for browser.
        return $pdf->Output('I', 'Undangan Ujian Naskah Skripsi_'.$nama.''.'.pdf', true);
    }
}
