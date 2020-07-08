<?php

namespace App\Http\Controllers\Prodi;

use App\Beasiswa;
use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Http\Request;
use Auth;
use DB;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Beasiswa::whereHas('mahasiswa', function ($query){
            $query->where('id_prodi',Auth::guard('prodi')->user()->id);
        })->get();

        $kategori = Kategori::where('status', true)->first();
        return view('pages.prodi.beasiswa.index', compact('datas', 'kategori'));
    }

    public function filterAkademik(Request $request){
    $tahun_akademik = $request->tahun_akademik;

        if($tahun_akademik){
            $datas = Beasiswa::with(['mahasiswa' => function($query){
                $query->with('prodi');
            }])->whereHas('mahasiswa', function ($query){
                $query->where('id_prodi',Auth::guard('prodi')->user()->id);
            })->where('tahun_akademik', $tahun_akademik)->get();

            return $datas;
        }else{
            $datas = Beasiswa::with('mahasiswa')->whereHas('mahasiswa', function ($query){
                $query->with('prodi')->where('id_prodi',Auth::guard('prodi')->user()->id);
            })->get();

            return $datas;
        }



    }

    public function filter(Request $request){
        $beasiswa = Beasiswa::whereHas('mahasiswa', function ($query) {
            $query->where('id_prodi', Auth::guard('prodi')->user()->id);
        })->where('tahun_akademik', $request->tahun_akademik)->get();
//        dd($beasiswa);
        $kategori = Kategori::where('status', true)->first();
        if(count($beasiswa) > 0) {
            $kuota = Auth::guard('prodi')->user()->kuota_beasiswa;
            $cekPenghasilanTerkecil = Beasiswa::whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('penghasilan_ortu')
                ->where('tahun_akademik', $request->tahun_akademik)
                ->orderBy('penghasilan_ortu', 'ASC')->first()->penghasilan_ortu;
            $cekTanggunganTerbesar = Beasiswa::whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('tanggungan_ortu')
                ->where('tahun_akademik', $request->tahun_akademik)
                ->orderBy('tanggungan_ortu', 'DESC')->first()->tanggungan_ortu;

            $cekIpkTerbesar = Beasiswa::whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('ipk')
                ->where('tahun_akademik', $request->tahun_akademik)
                ->orderBy('ipk', 'DESC')->first()->ipk;

            $datas = $cekIpkTerbesar = Beasiswa::with('mahasiswa')->whereHas('mahasiswa', function ($query) {
                $query->where('id_prodi', Auth::guard('prodi')->user()->id);
            })->select('id_mahasiswa', 'email', 'id', 'foto',
                DB::raw(str_replace(".", "", $cekPenghasilanTerkecil) . '/ (replace(penghasilan_ortu,".","")) * (0.2) as skorPenghasilan'),
                DB::raw('(round(tanggungan_ortu /' . $cekTanggunganTerbesar . ', 2) ) * (0.2) as skorTanggungan'),
                DB::raw('(ipk / ' . $cekIpkTerbesar . ') * 0.6  as skorIpk'),
                DB::raw('SUM(
            CAST(' . str_replace(".", "", $cekPenghasilanTerkecil) . '/ (replace(penghasilan_ortu,".","")) * 0.2 as decimal(5, 2)) 
            + CAST((round(tanggungan_ortu /' . $cekTanggunganTerbesar . ', 2) ) * 0.2 as decimal(5, 2)) 
            + ((ipk / ' . $cekIpkTerbesar . ') * 0.6) 
            ) * 100 as total'))
                ->where('tahun_akademik', $request->tahun_akademik)
                ->orderBy('total', 'DESC')
                ->groupBy('id_mahasiswa', 'penghasilan_ortu', 'tanggungan_ortu', 'ipk', 'email', 'id', 'foto')
                ->limit($kuota)
                ->get();


            return view('pages.prodi.beasiswa.index', compact('datas', 'kategori'));
        }
        $datas = $beasiswa;
        return view('pages.prodi.beasiswa.index', compact('datas', 'kategori'))->with('message','Data beasiswa tidak ditemukan');

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
        return view('pages.prodi.beasiswa.detail', compact('beasiswa', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
