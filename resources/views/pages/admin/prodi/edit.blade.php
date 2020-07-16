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
                    <form class="simple-example" action="{{route('prodi.update',$data->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        {{method_field('patch')}}
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="fullName">Nama</label>
                                <input name="nama" type="text"
                                       class="form-control {{$errors->has('nama')?'is-invalid':''}}"
                                       placeholder="Nama" value="{{$data->nama}}" required>
                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('nama') }}</b></p>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="fullName">Email</label>
                                <input name="email" type="email" class="form-control" value="{{$data->email}}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="fullName">No. Hp</label>
                                <input name="no_hp" type="text"
                                       class="form-control {{$errors->has('no_hp')?'is-invalid':''}}"
                                       placeholder="No. Hp" value="{{$data->no_hp}}" required>
                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('no_hp') }}</b></p>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="fullName">Password</label>
                                <input name="password" type="password"
                                       class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                       placeholder="Password" value="">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('password') }}</b></p>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="fullName">Program Study</label>
                                <input name="program_study" type="text"
                                       class="form-control {{$errors->has('program_study')?'is-invalid':''}}"
                                       placeholder="Program Study" value="{{$data->program_study}}" required>
                                @if ($errors->has('program_study'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('program_study') }}</b></p>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="fullName">Kuota Beasiswa</label>
                                <input name="kuota_beasiswa" type="text"
                                       class="form-control {{$errors->has('kuota_beasiswa')?'is-invalid':''}}"
                                       placeholder="Kuota Beasiswa" value="{{$data->kuota_beasiswa}}">
                                @if ($errors->has('kuota_beasiswa'))
                                    <span class="invalid-feedback" role="alert">
                                            <p><b>{{ $errors->first('kuota_beasiswa') }}</b></p>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="projectinput3">Foto</label>
                                <input type="hidden" value="{{$data->logo}}" name="old_logo">
                                <input class="form-control {{$errors->has('logo')?'is-invalid':''}}"
                                       type="file" name="logo" value="{{old('logo')}}"
                                       onchange="loadfile(event)" id="logo">
                                <br/>
                                <img id="output" class="img-fluid" height="100" width="100"
                                     src="{{asset('uploads/admin prodi/'.$data->logo)}}">
                                @if ($errors->has('logo'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('logo') }}</b></p>
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
    </div>
@endsection

@section('script')
    <script>
        var loadfile = function (event) {
            var logo = document.getElementById('logo');
            var output = document.getElementById('output');
            if (logo) {
                output.src = URL.createObjectURL(event.target.files[0]);
            }
        };
    </script>
@endsection
