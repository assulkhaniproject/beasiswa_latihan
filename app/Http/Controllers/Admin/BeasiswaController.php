<?php

namespace App\Http\Controllers\Admin;

use App\Beasiswa;
use App\Exports\BeasiswaExport;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Mahasiswa;
use App\Prodi;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use function GuzzleHttp\Promise\all;

class BeasiswaController extends Controller
{

    public function pdf($id)
    {
        $beasiswa = Beasiswa::find($id);
        //  $datas = Beasiswa::all();
        //$data = ['title' => 'Welcome to Beasiswa PHB'];
        //$pdf = PDF::loadView('pages.admin.beasiswa.pdf', compact('beasiswa'));

        $pdf =PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('pages.admin.beasiswa.pdf', compact(['beasiswa']));
        return $pdf->stream();
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
        return view('pages.admin.beasiswa.index', compact('datas', 'prodi', 'kategori'));
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

    public function filter(Request $request)
    {

        $kategori = Kategori::where('id', $request->kategori)->first();

        $prodi = $request->program_studi;
        $status = $request->status;

        $datas = Beasiswa::whereHas('mahasiswa', function ($query) use ($prodi) {
            $prodi != null ? $query->where('id_prodi', $prodi) : null;
        })->where('kategori', $kategori->kategori)
            ->where('tahun_akademik', $kategori->tahun_akademik)
            ->where(function ($query) use ($status){
                $status != 'all' ? $query->where('status', $status) : null;
            })->get();

        $prodi = Prodi::all();
        $kategori = Kategori::all();
        return view('pages.admin.beasiswa.index', compact('datas', 'prodi', 'kategori'));
    }

    public function exportExcel()
    {
        $kategori = Kategori::where('id', \request()->get('kategori'))->first();
        $prodi = \request()->get('program_studi');
        $status = \request()->get('status');

        return Excel::download(new BeasiswaExport($kategori, $prodi, $status), 'beasiswa.xlsx');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
