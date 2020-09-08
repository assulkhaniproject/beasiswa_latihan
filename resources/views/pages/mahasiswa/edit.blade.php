<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BEASISWA PHB | Detail Data </title>
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{asset('admin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body data-spy="scroll" data-target="#navSection" data-offsadmin>
<div class="row layout-top-spacing">
    <div class="col-12 layout-spacing">
        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 col-sm-6 col-6">
                            <h3 class="mt-5 mb-5 mr-5 text-center text-primary"><b class="text-center">Edit Data Beasiswa</b>
                            </h3>
                        </div>
                        {{--alert--}}
                        {{--<div class="col-xl-6 col-md-3 col-sm-6 col-6 mt-2">
                            @if(!$kategori)
                                <div class="alert alert-warning mb-4" role="alert">
                                    <strong>Warning!</strong> Tidak Bisa Mengajukan Beasiswa, Silakan Hubungi Admin !
                                </div>
                            @endif
                        </div>--}}
                        {{--end alert--}}
                    </div>
                </div>
                {{--form pengajuan--}}
                <div class="widget-content widget-content-area">
                    <form method="post" action="{{route('mahasiswas.store')}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('patch')}}
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Kategori/Tahun
                                Akademik*</label>
                            <div class="col-xl-4 col-lg-9 col-sm-10">
                                <input name="kategori" value="{{$kategori ? $kategori->kategori : ''}}" readonly
                                       type="text"
                                       class="form-control text-black {{$errors->has('kategori') ? 'is-invalid':''}}"
                                       id="kategori" placeholder="" required>
                                @if ($errors->has('kategori'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('kategori') }}</b></p>
                                        </span>
                                @endif
                            </div>
                            <div class="col-xl-2 col-lg-9 col-sm-8">
                                <input name="tahun_akademik" value="{{$kategori ? $kategori->tahun_akademik : ''}}"
                                       readonly type="text"
                                       class="form-control text-black {{$errors->has('tahun_akademik') ? 'is-invalid':''}}"
                                       id="tahun_akademik" placeholder="" required>
                                @if ($errors->has('tahun_akademik'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tahun_akademik') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nomor Induk
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nim" value="{{$user->nim}}" readonly type="text"
                                       class="form-control text-black"
                                       id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama" value="{{$user->nama}}" readonly type="text" class="form-control text-black"
                                       id="nama" placeholder="Nama Mahasiswa">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Program
                                Studi</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->prodi->program_study}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Angkatan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->angkatan}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Tempat/Tanggal
                                Lahir</label>
                            <div class="col-xl-3 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->tempat_lahir}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-9 col-sm-8">
                                <input name="program_study" value="{{$user->tanggal_lahir}}" readonly type="date"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Jenis
                                Kelamin</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="jenis_kelamin" value="{{$user->jenis_kelamin}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>

                      <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Agama</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="agama" value="{{$user->agama}}" readonly type="text"
                                       class="form-control text-black" id="agama" placeholder="">
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('agama') }}</b></p>
                                        </span>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Alamat</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <textarea name="alamat" value="" type="text"
                                          class="form-control text-black {{$errors->has('alamat') ? 'is-invalid':''}}" id="alamat"
                                          placeholder="" required>{{$user->alamat}}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('alamat') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group row mb-4">
                             <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Kode Pos</label>
                             <div class="col-xl-6 col-lg-9 col-sm-10">
                                 <input name="kode_pos" value="" type="number" maxlength="5"
                                        class="form-control text-black {{$errors->has('kode_pos')?'is-invalid':''}}"
                                        id="kode_pos" placeholder="" required>
                                 @if ($errors->has('kode_pos'))
                                     <span class="invalid-feedback" role="alert">
                                             <p><b>{{ $errors->first('kode_pos') }}</b></p>
                                         </span>
                                 @endif
                             </div>
                         </div>

                        <div class="form-group row mb-4">
                             <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">IP
                                 Komulatif</label>
                             <div class="col-xl-6 col-lg-9 col-sm-10">
                                 <input name="ipk" value="{{old('ipk')}}" type="float"
                                        class="form-control text-black {{$errors->has('ipk') ? 'is-invalid':''}}" id="ipk"
                                        placeholder=""
                                        required>
                                 @if ($errors->has('ipk'))
                                     <span class="invalid-feedback" role="alert">
                                             <p><b>{{ $errors->first('ipk') }}</b></p>
                                         </span>
                                 @endif
                             </div>
                         </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Scan KHS</label>
                            <div class="col-xl-7">
                                <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                                    <a class="img-1" href=""
                                       data-size="683x1024" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683"
                                       data-author="Samuel Rohl">
                                        <img src="" alt="image-gallery">
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{--<div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan KRS</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_krs" value="" type="file"
                                       class="form-control text-black {{$errors->has('scan_krs') ? 'is-invalid':''}}"
                                       accept="image/*"
                                       required>
                                @if ($errors->has('scan_krs'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('scan_krs') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Semester</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="semester" value="{{old('semester')}}" type="number"
                                       class="form-control text-black {{$errors->has('semester') ? 'is-invalid':''}}" id="semester"
                                       placeholder="" required>
                                @if ($errors->has('semester'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('semester') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Email</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="email" value="{{old('email')}}" type="email"
                                       class="form-control text-black {{$errors->has('email') ? 'is-invalid':''}}" id="email"
                                       placeholder="" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('email') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">No. Hp
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_hp" value="{{old('no_hp')}}" type="number" maxlength="13"
                                       class="form-control text-black {{$errors->has('no_hp') ? 'is-invalid':''}}" id="no_hp"
                                       required>
                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_hp') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Kartu Tanda
                                Mahasiswa (KTM)</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_ktm" value="" type="file"
                                       class="form-control text-black {{$errors->has('scan_ktm') ? 'is-invalid':''}}"
                                       accept="image/*"
                                       required>
                                @if ($errors->has('scan_ktm'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('scan_ktm') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Kartu Tanda
                                Penduduk (KTP)</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_ktp" value="" type="file"
                                       class="form-control text-black {{$errors->has('scan_ktp') ? 'is-invalid':''}}"
                                       accept="image/*"
                                       required>
                                @if ($errors->has('scan_ktp'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('scan_ktp') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Foto
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="foto" value="" type="file"
                                       class="form-control text-black {{$errors->has('foto') ? 'is-invalid':''}}" accept="image/*"
                                       required>
                                <small id="emailHelp1" class="form-text text-muted">Foto Resmi Beralmamater | size max :
                                    2 MB </small>
                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('foto') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">
                        --}}{{--Data Orang Tua--}}{{--
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Orang
                                Tua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_ortu" value="{{old('nama_ortu')}}" type="text"
                                       class="form-control text-black {{$errors->has('nama_ortu') ? 'is-invalid':''}}"
                                       id="nama_ortu"
                                       placeholder="" required>
                                @if ($errors->has('nama_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Alamat</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <textarea name="alamat_ortu" value="" type="text"
                                          class="form-control text-black {{$errors->has('alamat_ortu') ? 'is-invalid':''}}"
                                          id="alamat_ortu"
                                          placeholder="" required>{{old('alamat_ortu')}}</textarea>
                                @if ($errors->has('alamat_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('alamat_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Pekerjaan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="pekerjaan_ortu" value="{{old('pekerjaan_ortu')}}" type="text"
                                       class="form-control text-black {{$errors->has('pekerjaan_ortu') ? 'is-invalid':''}}"
                                       id="pekerjaan_ortu" placeholder="" required>
                                @if ($errors->has('pekerjaan_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('pekerjaan_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">No. Hp
                                Orangtua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_hp_ortu" value="{{$user->no_hp_ortu}}" type="number"
                                       class="form-control text-black {{$errors->has('no_hp_ortu') ? 'is-invalid':''}}"
                                       maxlength="13"
                                       id="defaultconfig" placeholder="" required>
                                @if ($errors->has('no_hp_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_hp_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Penghasilan
                                Orangtua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="penghasilan_ortu" value="" type="text"
                                       class="form-control text-black {{$errors->has('penghasilan_ortu') ? 'is-invalid':''}}"
                                       id="penghasilan_ortu" placeholder="" required>
                                @if ($errors->has('penghasilan_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('penghasilan_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Slip
                                Gaji</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_penghasilan" value="" type="file"
                                       class="form-control text-black {{$errors->has('scan_penghasilan') ? 'is-invalid':''}}"
                                       accept="image/*" required>
                                @if ($errors->has('scan_penghasilan'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('scan_penghasilan') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Jumlah
                                Tanggungan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="tanggungan_ortu" value="{{old('tanggungan_ortu')}}" type="number"
                                       class="form-control text-black {{$errors->has('tanggungan_ortu') ? 'is-invalid':''}}"
                                       id="tanggungan_ortu"
                                       placeholder="" required>
                                <small id="emailHelp1" class="form-text text-muted">Sesuai Dengan Kartu Keluarga</small>
                                @if ($errors->has('tanggungan_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tanggungan_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Kartu
                                Keluarga</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_kk" value="" type="file"
                                       class="form-control text-black {{$errors->has('scan_kk') ? 'is-invalid':''}}"
                                       accept="image/*"
                                       required>
                                @if ($errors->has('scan_kk'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('scan_kk') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">
                        --}}{{--Data Rekening Bank--}}{{--
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_bank" value="{{old('nama_bank')}}" type="text"
                                       class="form-control text-black {{$errors->has('nama_bank') ? 'is-invalid':''}}"
                                       id="nama_bank"
                                       placeholder="" required>
                                <small id="emailHelp1" class="form-text text-muted">tuliskan Dengan Lengkap</small>
                                @if ($errors->has('nama_bank'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama_bank') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Cabang Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="cabang_bank" value="{{old('cabang_bank')}}" type="text"
                                       class="form-control text-black {{$errors->has('cabang_bank') ? 'is-invalid':''}}"
                                       id="cabang_bank"
                                       placeholder="" required>
                                @if ($errors->has('cabang_bank'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('cabang_bank') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Nama Pemegang
                                Rekening</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_rek" value="{{old('nama_rek')}}" type="text"
                                       class="form-control text-black {{$errors->has('nama_rek') ? 'is-invalid':''}}" id="nama_rek"
                                       placeholder="" required>
                                @if ($errors->has('nama_rek'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama_rek') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">No. Rekening
                                Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_rek" value="{{old('no_rek')}}" type="text"
                                       class="form-control text-black {{$errors->has('no_rek') ? 'is-invalid':''}}" id="no_rek"
                                       placeholder="" required>
                                @if ($errors->has('no_rek'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_rek') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5 text-black">Scan Buku
                                Tabungan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_bt" value="" type="file"
                                       class="form-control {{$errors->has('scan_bt') ? 'is-invalid':''}}"
                                       accept="image/*"
                                       required>
                                @if ($errors->has('scan_bt'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('scan_bt') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        --}}{{--end form pengajuan--}}{{--
--}}
                      {{--  <div class="form-group row">
                            <div class="col-sm-10">
                                <button class="btn btn-warning mt-3 mr-2 ml-5 px-5" type="button"
                                        onclick="history.back()">Batal
                                    <button type="submit" class="btn btn-primary mt-3 px-5">Simpan</button>
                                </button>
                            </div>
                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">Tugas Akhir</a>,
                    Beasiswa PHB</p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{asset('admin/plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('admin/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/assets/js/scrollspyNav.js')}}"></script>
</body>
</html>
