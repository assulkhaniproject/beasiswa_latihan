<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:15:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BEASISWA PHB | Admin Login </title>
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/forms/switches.css')}}">
</head>
<body class="form">

<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
                    <a href="#" class="course">
                        {{--<img src="{{asset('page/images/logo.png')}}" height="100" width="100" alt="Image placeholder">--}}
                        <p class="text-primary">Ganti Password</p>
                    </a>
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        @if($errors->all())
                            <div class="alert alert-danger mt-2 mb-4" role="alert">
                                <strong>Warning!</strong> Gagal merubah password
                            </div>
                        @endif
                    </div>

                    <form class="text-left" method="POST" action="{{route('mahasiswa.updatepassword')}}">
                        @csrf
                        @method('PUT')
                        <div class="form">
                            <div id="username-field" class="field-wrapper input">
                                <label for="username">PASSWORD</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input name="old_password" type="password" class="form-control  {{$errors->has('old_password') ? 'is-invalid':''}}" placeholder="password"
                                       required>
                                @if ($errors->has('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                            <p class="text-danger"><b>{{ $errors->first('old_password') }}</b></p>
                                        </span>
                                @endif
                            </div>

                            <div id="password-field" class="field-wrapper input mb-1">
                                <div class="d-flex justify-content-between">
                                    <label for="password">PASSWORD BARU</label>
                                    {{--<a href="#" class="forgot-pass-link">Forgot Password?</a>--}}
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password"
                                       class="form-control {{$errors->has('password') ? 'is-invalid':''}}"
                                       placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                            <p class="text-danger"><b>{{ $errors->first('new_password') }}</b></p>
                                        </span>
                                @endif
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                            <div id="password-field" class="field-wrapper input mb-1">
                                <div class="d-flex justify-content-between">
                                    <label for="password">KONFIRMASI PASSWORD</label>
                                    {{--<a href="#" class="forgot-pass-link">Forgot Password?</a>--}}
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password_confirmation" type="password" class="form-control"
                                       placeholder="Password" required>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                            <div class="d-sm-flex justify-content-between mb-2">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Simpan</button>
                                    <button class="btn btn-warning submit-fn mt-2 " type="button"
                                            onclick="window.location='{{route("mahasiswa.dashboard")}}'">Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/assets/js/authentication/form-2.js')}}"></script>
</body>
<!-- Mirrored from designreset.com/cork/ltr/demo4/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:15:51 GMT -->
</html>
