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
<body data-spy="scroll" data-target="#navSection" data-offset="100">
<div class="row layout-top-spacing">
    <div class="col-12 layout-spacing">
        <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            @if(!$kategori)
                                <div class="alert alert-warning mt-2 mb-4" role="alert">
                                    <strong>Warning!</strong> Tidak Bisa Mengajukan Beasiswa, Silakan Hubungi Admin !
                                </div>
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger mt-2 mb-4" role="alert">
                                    <strong>Warning!</strong> {{Session::get('error')}}
                                </div>
                            @elseif($errors->all())
                                <div class="alert alert-danger mt-2 mb-4" role="alert">
                                    <strong>Warning!</strong> {{$errors->first()}}
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h2 class="mt-3 mb-3 mr-5 text-center text-primary">
                                <b class="text-center">Formulir Pengajuan Beasiswa</b>
                            </h2>
                        </div>
                    </div>
                </div>
                {{--form pengajuan--}}
                <div class="widget-content widget-content-area">
                    <form method="post" action="{{route('mahasiswas.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Kategori/Tahun
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black float-right">Nomor
                                Induk
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nim" value="{{$user->nim}}" readonly type="text"
                                       class="form-control text-black"
                                       id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Nama
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama" value="{{$user->nama}}" readonly type="text"
                                       class="form-control text-black"
                                       id="nama" placeholder="Nama Mahasiswa">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Program
                                Studi</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->prodi->program_study}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Angkatan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="program_study" value="{{$user->angkatan}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Tempat/Tanggal
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Jenis
                                Kelamin</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="jenis_kelamin" value="{{$user->jenis_kelamin}}" readonly type="text"
                                       class="form-control text-black" id="program_study" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Agama</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="agama" value="{{$user->agama}}" readonly type="text"
                                       class="form-control text-black" id="agama" placeholder="">
                                @if ($errors->has('agama'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('agama') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Alamat</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <textarea name="alamat" value="" type="text"
                                          class="form-control text-black {{$errors->has('alamat') ? 'is-invalid':''}}"
                                          id="alamat"
                                          placeholder="" required>{{$user->alamat}}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('alamat') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Kode Pos</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="kode_pos" oninput="maxLengthCheck(this)" value="{{old('kode_pos')}}"
                                       type="number" maxlength="5"
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">IP
                                Komulatif</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="ipk" oninput="maxLengthCheck(this)" value="{{old('ipk')}}" type="tel"
                                       maxlength="4"
                                       class="form-control text-black {{$errors->has('ipk') ? 'is-invalid':''}}"
                                       id="ipk"
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan KHS</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_khs" value="" type="file"
                                       class="form-control text-black {{$errors->has('scan_khs') ? 'is-invalid':''}}"
                                       accept="image/png, image/jpeg"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                          <p id="message" class="text-danger"></p>
                                       </span>
                                @if ($errors->has('scan_khs'))
                                    <span class="invalid-feedback" role="alert">
                                            <p class="text-danger"><b>{{ $errors->first('scan_khs') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan KRS</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_krs" value="" type="file"
                                       class="form-control text-black"
                                       accept="image/*"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                    <p id="message" class="text-danger"></p>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Semester</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="semester" oninput="maxLengthCheck(this)" value="{{old('semester')}}"
                                       type="number"
                                       class="form-control text-black {{$errors->has('semester') ? 'is-invalid':''}}"
                                       id="semester"
                                       placeholder="" maxlength="1" required>
                                @if ($errors->has('semester'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('semester') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Email</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="email" value="{{$user->email}}" type="email"
                                       class="form-control text-black {{$errors->has('email') ? 'is-invalid':''}}"
                                       id="email"
                                       placeholder="" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('email') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">No. Hp
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_hp" oninput="maxLengthCheck(this)"
                                       value="{{$user->no_hp}}" type="number" maxlength="13"
                                       class="form-control text-black {{$errors->has('no_hp') ? 'is-invalid':''}}"
                                       id="check"
                                       required>
                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_hp') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan Kartu Tanda
                                Mahasiswa (KTM)</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_ktm" value="" type="file"
                                       class="form-control text-black"
                                       accept="image/*"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                    <p id="message" class="text-danger"></p>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan Kartu Tanda
                                Penduduk (KTP)</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_ktp" value="" type="file"
                                       class="form-control text-black"
                                       accept="image/*"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                    <p id="message" class="text-danger"></p>
                                 </span>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Foto
                                Mahasiswa</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="foto" value="" type="file"
                                       class="form-control text-black"
                                       accept="image/*"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                    <p id="message" class="text-danger"></p>
                                 </span>
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">
                        {{--Data Orang Tua--}}
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Nama Orang
                                Tua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_ortu" value="{{$user->nama_ortu}}" type="text" readonly
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Alamat</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <textarea name="alamat_ortu" value="" type="text"
                                          class="form-control text-black {{$errors->has('alamat_ortu') ? 'is-invalid':''}}"
                                          id="alamat_ortu"
                                          placeholder="" required>{{$user->alamat}}</textarea>
                                @if ($errors->has('alamat_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('alamat_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">No. Hp
                                Orangtua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_hp_ortu" oninput="maxLengthCheck(this)" value="{{old('no_hp_ortu')}}"
                                       type="number"
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Pekerjaan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <select name="pekerjaan_ortu" class="form-control basic">
                                    <option selected="selected">-Pilih-</option>
                                    <option>Belum/Tidak Bekerja</option>
                                    <option>Mengurus Rumah Tangga</option>
                                    <option>Pensiunan</option>
                                    <option>Pegawai Negeri Sipil</option>
                                    <option>Tentara Nasional Indonesia</option>
                                    <option>Kepolisian RI</option>
                                    <option>Pedagang</option>
                                    <option>Petani/Pekebun</option>
                                    <option>Peternak</option>
                                    <option>Nelayan/Perikanan</option>
                                    <option>Wiraswasta</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Karyawan BUMN</option>
                                    <option>Karyawan Honorer</option>
                                    <option>Buruh Harian Lepas</option>
                                    <option>Buruh Tani/Perkebunan</option>
                                    <option>Pembantu Rumah Tangga</option>
                                    <option>Tukan Cukur</option>
                                </select>
                                @if ($errors->has('pekerjaan_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('pekerjaan_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Penghasilan
                                Orangtua</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="penghasilan_ortu" value="{{old('penghasilan_ortu')}}" type="text"
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan Keterangan
                                Penghasilan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_penghasilan" value="" type="file"
                                       class="form-control text-black"
                                       accept="image/*" required>
                                <small id="emailHelp1" class="form-text text-muted">Slip Gaji/Surat Keterangan
                                    Penghasilan Dari Desa</small>
                                <span class="invalid-feedback" role="alert">
                                   <p id="message" class="text-danger"></p>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Jumlah
                                Tanggungan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="tanggungan_ortu" oninput="maxLengthCheck(this)"
                                       value="{{old('tanggungan_ortu')}}" type="number"
                                       class="form-control text-black {{$errors->has('tanggungan_ortu') ? 'is-invalid':''}}"
                                       id="tanggungan_ortu"
                                       placeholder="" maxlength="2" required>
                                <small id="emailHelp1" class="form-text text-muted">Sesuai Dengan Kartu Keluarga</small>
                                @if ($errors->has('tanggungan_ortu'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tanggungan_ortu') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan Kartu
                                Keluarga</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_kk" value="" type="file"
                                       class="form-control text-black"
                                       accept="image/*"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                  <p id="message" class="text-danger"></p>
                               </span>
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">
                        {{--Data Rekening Bank--}}
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Nama Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_bank" value="Bank Negara Indonesia (BNI)" type="text"
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Cabang Bank</label>
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
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Nama Pemegang
                                Rekening</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="nama_rek" value="{{$user->nama}}" type="text"
                                       class="form-control text-black {{$errors->has('nama_rek') ? 'is-invalid':''}}"
                                       id="nama_rek"
                                       placeholder="" required>
                                <small id="emailHelp1" class="form-text text-muted">Nama Sesuai Dengan Data
                                    Pemohon</small>
                                @if ($errors->has('nama_rek'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama_rek') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">No. Rekening
                                Bank</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="no_rek" value="{{old('no_rek')}}" type="text"
                                       class="form-control text-black {{$errors->has('no_rek') ? 'is-invalid':''}}"
                                       id="no_rek"
                                       placeholder="" required>
                                @if ($errors->has('no_rek'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_rek') }}</b></p>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-3 col-form-label ml-5 text-black">Scan Buku
                                Tabungan</label>
                            <div class="col-xl-6 col-lg-9 col-sm-10">
                                <input name="scan_bt" value="" type="file"
                                       class="form-control"
                                       accept="image/*"
                                       required>
                                <span class="invalid-feedback" role="alert">
                                  <p id="message" class="text-danger"></p>
                               </span>
                            </div>
                        </div>
                        {{--end form pengajuan--}}
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <a href="{{route('mahasiswa.dashboard')}}" class="btn btn-warning mt-3 mr-2 ml-5 px-5"
                                   type="button">Batal</a>
                                <button id="simpan" type="submit" class="btn btn-primary mt-3 px-5">Simpan</button>
                            </div>
                        </div>
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
<script type="text/javascript">
    const images = document.querySelectorAll('input[type="file"]');
    const simpan = document.querySelector('#simpan');
    const message = document.querySelectorAll('#message');
    const maxfilesize = 1024 * 1024;

    images.forEach((image, i) => {
        image.addEventListener('change', function () {
            const file = this.files[0];
            if (file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') {
                if (+file.size > maxfilesize) {
                    message[i].innerText = "Gambar yang anda masukan terlalu besar maksimal 1 MB";
                    simpan.disabled = true;
                    this.classList.add('is-invalid');
                } else {
                    message[i].innerText = '';
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    simpan.disabled = false;
                }
            } else {
                simpan.disabled = true;
                this.classList.add('is-invalid');
                message[i].innerText = "Gambar yang anda masukan harus JPG,JPEG atau PNG";
            }
        })
    });

    function maxLengthCheck(object) {
        if (object.value.length > object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }

</script>
</body>
</html>
