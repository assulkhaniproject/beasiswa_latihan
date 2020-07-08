@extends('templates.admin')

@section('content')
    <div class="row layout-top-spacing">
        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Data</h4>
                        </div>
                    </div>
                </div>
                <form class="simple-example" action="{{route('prodi.update',$datas->id)}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('patch')}}
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Nama</label>
                            <input name="nama" type="text"
                                   class="form-control {{$errors->has('nama')?'is-invalid':''}}"
                                   placeholder="Nama" value="{{$datas->nama}}" required>
                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">NIM</label>
                            <input name="nim" type="text"
                                   class="form-control {{$errors->has('nim')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->nim}}" required>
                            @if ($errors->has('nim'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nim') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Program Studi</label>
                            <input name="program_study" type="text"
                                   class="form-control {{$errors->has('program_study')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->prodi->program_study}}" required>
                            @if ($errors->has('program_study'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('program_study') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text"
                                   class="form-control {{$errors->has('tempat_lahir')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->tempat_lahir}}" required>
                            @if ($errors->has('tempat_lahir'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tempat_lahir') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date"
                                   class="form-control {{$errors->has('tanggal_lahir')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->tanggal_lahir}}" required>
                            @if ($errors->has('tanggal_lahir'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('tanggal_lahir') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Jenis Kelamin</label>
                            <input name="jenis_kelamin" type="text"
                                   class="form-control {{$errors->has('jenis_kelamin')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->jenis_kelamin}}" required>
                            @if ($errors->has('jenis_kelamin'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('jenis_kelamin') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Alamat</label>
                            <input name="alamat" type="text"
                                   class="form-control {{$errors->has('alamat')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->alamat}}" required>
                            @if ($errors->has('alamat'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('alamat') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Tahun Masuk</label>
                            <input name="angkatan" type="text"
                                   class="form-control {{$errors->has('angkatan')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->angkatan}}" required>
                            @if ($errors->has('angkatan'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('angkatan') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">No. Hp</label>
                            <input name="no_hp" type="text"
                                   class="form-control {{$errors->has('no_hp')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->no_hp}}" required>
                            @if ($errors->has('no_hp'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_hp') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Email</label>
                            <input name="email" type="text"
                                   class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->email}}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('email') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Jalur</label>
                            <input name="jalur" type="text"
                                   class="form-control {{$errors->has('jalur')?'is-invalid':''}}"
                                   placeholder="" value="{{$datas->jalur}}" required>
                            @if ($errors->has('jalur'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('jalur') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-primary submit-fn mt-2 float-right" type="submit">Update</button>
                    <button class="btn btn-warning submit-fn mt-2 mr-2 float-right" type="button"
                            onclick="history.back()">Cancel
                    </button>

                </form>

            </div>
        </div>
    </div>

@endsection
