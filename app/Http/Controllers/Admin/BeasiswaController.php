<?php

namespace App\Http\Controllers\Admin;

use App\Beasiswa;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Mahasiswa;
use App\Prodi;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class BeasiswaController extends Controller
{

    public function pdf()
    {
        $data = ['title' => 'Welcome to Beasiswa PHB'];
   $pdf = PDF::loadView('pages.admin.beasiswa.pdf');

//        PDF::loadView('pages.admin.beasiswa.pdf', $data);
        return $pdf->stream('laporan-pdf.pdf');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Beasiswa::all();
        $prodi = Prodi::all();
        $kategori = Kategori::all();
        return view('pages.admin.beasiswa.index', compact('datas','prodi', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function filter(Request $request){
//        dd($request->all());
        $prodi = $request->program_studi;
        $kategori = $request->kategori;
        $tahun_akademik = $request->tahun_akademik;

        $datas = Beasiswa::whereHas('mahasiswa', function($query) use ($prodi){
           $prodi ? $query->where('id_prodi', $prodi) : null;
        })->where('tahun_akademik', $tahun_akademik)->where('kategori', $kategori)->get();

//        dd($datas);

        $prodi = Prodi::all();
        $kategori = Kategori::all();
        return view('pages.admin.beasiswa.index', compact('datas','prodi', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beasiswa = Beasiswa::find($id);
        $kategori = Kategori::where('status', true)->first();
        return view('pages.admin.beasiswa.detail', compact('beasiswa', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
         * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
