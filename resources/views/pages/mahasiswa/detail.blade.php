<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from designreset.com/cork/ltr/demo4/form_layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:15:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BEASISWA PHB | Detail Data </title>
    <link rel="icon" type="image/x-icon" href="{{asset('mahasiswa/assets/img/favicon.png')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('mahasiswa/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('mahasiswa/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{asset('mahasiswa/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="100">
        <div class="row layout-top-spacing">
            <div class="col-12 layout-spacing">

        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-sm-6 col-6">
                            <h3 class="mt-3 text-center text-primary"><b>Data Beasiswa</b></h3>
                        </div>
                        <div class="col-xl-6 col-md-3 col-sm-6 col-6 mt-2">
                            @if(!$kategori)
                            <div class="alert alert-warning mb-4" role="alert">
                                <strong>Warning!</strong> Tidak Bisa Mengajukan Beasiswa, Silakan Hubungi Admin !
                            </div>
                                @endif
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <label class="text-black ml-5 mb-4 align-items-center">__________________________________________________________ Data Mahasiswa</label>
                    <form method="post" action="{{route('mahasiswas.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Kategori/Tahun Akademik*</label>
                            <div class="col-xl-4 col-lg-9 col-sm-10">
                                <input name="kategori" value="{{$kategori ? $kategori->kategori : ''}}" readonly type="text" class="form-control" id="kategori" placeholder="" required>
                            </div>
                            <div class="col-xl-2 col-lg-9 col-sm-8">
                                <input name="tahun_akademik" value="{{$kategori ? $kategori->tahun_akademik : ''}}"  readonly type="text" class="form-control" id="tahun_akademik" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nomor Induk Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nim" value="{{$user->nim}}" readonly type="text" class="form-control" id="program_study" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama" value="{{$user->nama}}" readonly type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Program Studi</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->prodi->program_study}}" readonly type="text" class="form-control" id="program_study" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Angkatan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->angkatan}}" readonly type="text" class="form-control" id="program_study" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Tempat/Tanggal Lahir</label>
                            <div class="col-xl-3 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->tempat_lahir}}" readonly type="text" class="form-control" id="program_study" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-9 col-sm-8">
                                <input name="program_study" value="{{$user->tanggal_lahir}}" readonly type="date" class="form-control" id="program_study" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Jenis Kelamin</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="jenis_kelamin" value="{{$user->jenis_kelamin}}" readonly type="text" class="form-control" id="program_study" placeholder="">
                            </div>
                        </div>
                        {{--<div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Jenis Kelamin</label>
                            <div class="new-control new-radio radio-primary ml-3">
                                <input type="radio" class="new-control-input mt-2" name="custom-radio-1">
                                <span class="new-control-indicator"></span>Laki-Laki
                            </div>
                            <a class="new-control new-radio radio-primary ml-3">
                                <input type="radio" class="new-control-input mt-2" name="custom-radio-1">
                                <span class="new-control-indicator"></span>Perempuan
                            </a>
                        </div>--}}
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Agama</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <select name="agama" class="form-control  basic">
                                    <option selected="selected">-Pilih-</option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Budha</option>
                                    <option>Hindu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Alamat</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <textarea name="alamat" value="" type="text" class="form-control" id="alamat" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Kode Pos</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="kode_pos" value="" type="number" maxlength="5" class="form-control" id="kode_pos" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">IP Komulatif</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="ipk" value="" type="text" class="form-control" id="ipk" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan KHS</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_khs" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan KRS</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_krs" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Semester</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="semester" value="" type="text" class="form-control" id="semester" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Email</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="email" value="" type="email" class="form-control" id="email" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">No. Hp Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_hp" value="" type="number" maxlength="13" class="form-control placement-bottom" id="no_hp" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Kartu Tanda Mahasiswa (KTM)</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_ktm" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Kartu Tanda Penduduk (KTP)</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_ktp" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Foto Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="foto" value="" type="file" class="form-control" accept="image/*">
                                <small id="emailHelp1" class="form-text text-muted">Foto Resmi Beralmamater | size max : 2 MB </small>
                            </div>
                        </div>

                        {{--Data Orang Tua--}}
                        <label class="text-black ml-5 mt-4 align-items-center">__________________________________________________________ Data Orang Tua</label>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5">
                                <h5></h5>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Orang Tua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_ortu" value="" type="text" class="form-control" id="nama_ortu" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Alamat</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <textarea name="alamat_ortu" value="" type="text" class="form-control" id="alamat_ortu" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Pekerjaan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="pekerjaan_ortu" value="" type="text" class="form-control" id="pekerjaan_ortu" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">No. Hp Orangtua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_hp_ortu" value="" type="number" class="form-control" maxlength="13" id="defaultconfig" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Penghasilan Orangtua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">Rp.</span>
                                <input name="penghasilan_ortu" value="" type="number" class="form-control" id="penghasilan_ortu" placeholder="">
                            </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Slip Gaji</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_penghasilan" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Jumlah Tanggungan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="tanggungan_ortu" value="" type="number" class="form-control" id="tanggungan_ortu" placeholder="">
                                <small id="emailHelp1" class="form-text text-muted">Sesuai Dengan Kartu Keluarga</small>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Kartu Keluarga</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_kk" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <label class="text-black ml-5 mt-4 align-items-center">__________________________________________________________ Data Nomor Rekening</label>
                        {{--Data Rekening Bank--}}
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5">
                                <h5></h5>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Lengkap Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_bank" value="" type="text" class="form-control" id="nama_bank" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Cabang Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="cabang_bank" value="" type="text" class="form-control" id="cabang_bank" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Pemegang Rekening</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_rek" value="" type="text" class="form-control" id="nama_rek" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">No. Rekening Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no.rek" value="" type="text" class="form-control" id="no_rek" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Buku Tabungan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_bt" value="" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3 float-right">Simpan</button>
                                <button class="btn btn-warning mt-3 mr-2 float-right"  type="button" onclick="history.back()">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">Tugas Akhir</a>, Beasiswa PHB</p>
    </div>
</div>
</div>
<!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('mahasiswa/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('mahasiswa/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('mahasiswa/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('mahasiswa/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('mahasiswa/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{asset('mahasiswa/plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('mahasiswa/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('mahasiswa/assets/js/scrollspyNav.js')}}"></script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/form_layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:15:17 GMT -->
</html>
