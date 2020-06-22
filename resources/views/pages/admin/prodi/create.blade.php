@extends('templates.admin')

@section('content')

<div class="row layout-top-spacing">

    <div id="basic" class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Tambah Data</h4>
                    </div>
                </div>
            </div>
                <form class="simple-example" action="{{route('prodi.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Nama</label>
                            <input name="nama" type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}"
                                   placeholder="Nama" value="" required>
                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama') }}</b></p>
                                        </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Email</label>
                            <input name="email" type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                   placeholder="Email" value="" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('email') }}</b></p>
                                        </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="fullName">No. Hp</label>
                            <input name="no_hp" type="tel" class="form-control {{$errors->has('no_hp')?'is-invalid':''}}"
                                   placeholder="No. Hp" value="" required>
                            @if ($errors->has('no_hp'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_hp') }}</b></p>
                                        </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Password</label>
                            <input name="password" type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                   placeholder="Password" value="" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('password') }}</b></p>
                                        </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Program Study</label>
                            <input name="program_study" type="text" class="form-control {{$errors->has('program_study')?'is-invalid':''}}"
                                   placeholder="Program Study" value="" required>
                            @if ($errors->has('program_study'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('program_Study') }}</b></p>
                                        </span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="fullName">Foto</label>
                            <input name="logo" type="file" class="form-control {{$errors->has('logo')?'is-invalid':''}}"
                                   placeholder="Logo" value="" required>
                            @if ($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('logo') }}</b></p>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-primary submit-fn mt-2 float-right"  type="submit">Save</button>
                    <button class="btn btn-warning submit-fn mt-2 mr-2 float-right"  type="button" onclick="history.back()">Cancel</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
