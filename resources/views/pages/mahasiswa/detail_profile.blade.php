<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/user_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:13:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BEASISWA PHB | Detail Profile </title>
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('admin/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css"/>
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body data-spy="scroll" data-target="#navSection" data-offset="100">
<div class="row layout-top-spacing">
    <div class="col-12 layout-spacing">
        <div id="Form" class="col-lg-12 layout-spacing">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="detail_profile" class="section general-info">
                            <div class="info">
                                <h6 class="">General Information</h6>
                                <div class="col-lg-11 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                            <div class="upload mt-4 pr-md-4">
                                                <div class="dropify-wrapper has-preview">
                                                        <div class="avatar avatar-xl">
                                                            <img alt="avatar" src="{{asset('uploads/foto/'.Auth::guard('mahasiswa')->user()->foto)}}" class="rounded-circle" />
                                                        </div>
                                                    <ul></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label for="fullName">Nama</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="Full Name" value="{{$user->nama}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="fullName">Nomor Induk Mahasiswa</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="Full Name" value="{{$user->nim}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label for="program_study">Program Studi</label>
                                                            <input type="text" class="form-control mb-4 text-black" id=""
                                                                   placeholder="" value="{{$user->prodi->program_study}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label for="semester">Jalur</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="" value="{{$user->jalur}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="" value="{{$user->tempat_lahir}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="" value="{{$user->tanggal_lahir}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="fullName">Jenis Kelamin</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="Full Name" value="{{$user->jenis_kelamin}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="fullName">No. Hp</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="" value="{{$user->no_hp}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="fullName">Email</label>
                                                            <input type="text" class="form-control mb-4 text-black" id="fullName"
                                                                   placeholder="" value="{{$user->email}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="fullName">Alamat</label>
                                                            <textarea type="text" class="form-control mb-4 text-black" id="fullName"
                                                                      placeholder="" value="" readonly>{{$user->alamat}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <a href="{{route('mahasiswa.profile',$user->id)}}" class="text-center btn btn-primary mt-3 px-5">OK</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
<script src="{{asset('admin/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/plugins/dropify/dropify.min.js')}}"></script>
<script src="{{asset('admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
<!-- <script src="plugins/tagInput/tags-input.js"></script> -->
<script src="{{asset('admin/assets/js/users/account-settings.js')}}"></script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/user_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:13:40 GMT -->
</html>
