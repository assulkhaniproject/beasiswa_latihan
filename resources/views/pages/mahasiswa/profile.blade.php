<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BEASISWA PHB | Profile </title>
    <link rel="icon" type="image/x-icon" href="{{asset('mahasiswa/assets/img/favicon.png')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('mahasiswa/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('mahasiswa/assets/css/main.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('mahasiswa/assets/css/pages/helpdesk.css')}}" rel="stylesheet" type="text/css"/>
    <!--  END CUSTOM STYLE FILE  -->
</head>

<body>
<div class="helpdesk container">
    <nav class="navbar navbar-expand navbar-light">
        <a class="navbar-brand" href="{{route('mahasiswa.dashboard')}}">B E A S I S W A P H B</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    {{--                    <a class="nav-link" href="pages_contact_us.html">Contact Us</a>--}}
                </li>
            </ul>
        </div>
    </nav>
    <div class="helpdesk layout-spacing">
        <div class="hd-header-wrapper">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="avatar avatar-xl">
                        <img alt="avatar" height="100" width="100" src="{{asset('mahasiswa/assets/img/favicon.png')}}"
                             class="rounded-circle"/>
                    </div>
                    <h4 class="">{{$user->nama}}</h4>
                    <h5 class="text-black">{{$user->prodi->program_study}}</h5>

                    <a href="#" class="text-center btn btn-primary">Lihat Selengkapnya</a>
                </div>
                {{--status--}}
                <div class="col-lg-12">
                @foreach($beasiswas as $beasiswa)
                    <div class="col-4 mt-3">
                        <div class="card component-card_4">
                            <div class="card-header bg-info">
                                <h5 class="text-white">{{$beasiswa->kategori}}</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Tahun Akademik : {{$beasiswa->tahun_akademik}}</h6>
                            </div>
                            <div class="card-footer">
                                @if($beasiswa->status === 1)
                                    <button type="button" class="btn btn-success btn-lg px-5">
                                        <span>Diterima</span>
                                    </button>
                                @elseif($beasiswa->status === 0)
                                    <button type="button" class="btn btn-danger btn-lg px-5">
                                        <span>Ditolak</span>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-warning btn-lg px-5">
                                        <span>Menunggu</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--end status--}}
                </div>
                <div class="col-md-12 mt-5">
                    <div class="pagination-custom_solid">
                        {{$beasiswas->links()}}
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="hd-contact-section">
            <div class="hd-slider">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active community-help">
                                    <div class="carousel-item-content">
                                        <h4 class="hd-slide-header">Get help by community.</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-edit">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path
                                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                    <div class="media-body">
                                                        <h5>CORK Forum</h5>
                                                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                            elit, sed do eiusmod tempor.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-terminal">
                                                        <polyline points="4 17 10 11 4 5"></polyline>
                                                        <line x1="12" y1="19" x2="20" y2="19"></line>
                                                    </svg>
                                                    <div class="media-body">
                                                        <h5>How to Code</h5>
                                                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                            elit, sed do eiusmod tempor.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item news-updates ">
                                    <div class="carousel-item-content">
                                        <h4 class="hd-slide-header">Latest news and updates</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="media">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-bookmark">
                                                        <path
                                                            d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                                    </svg>
                                                    <div class="media-body">
                                                        <h5>CORK Blog</h5>
                                                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                            elit, sed do eiusmod tempor incididunt ut labore et dolore
                                                            magna aliqua.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-left"><polyline
                                            points="15 18 9 12 15 6"></polyline></svg></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right"><polyline
                                            points="9 18 15 12 9 6"></polyline></svg></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>

    </div>
</div>

<div id="miniFooterWrapper" class="">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="position-relative">
                    <div class="arrow text-center">
                        <p class="">Up</p>
                    </div>
                </div>
                <div class="row">
                    <div
                        class="col-lg-5 mx-auto col-lg-6 col-md-6 site-content-inner text-md-left text-center copyright align-self-center">
                        <p class="mt-md-0 mt-4 mb-0">2020 &copy; <a target="_blank" href="">Tugas Akhir</a>.</p>
                    </div>
                    <div
                        class="col-xl-5 mx-auto col-lg-6 col-md-6 site-content-inner text-md-right text-center align-self-center">
                        <p class="mb-0">Politeknik Harapan Bersama, Kota Tegal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="{{asset('mahasiswa/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('mahasiswa/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('mahasiswa/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('mahasiswa/assets/js/pages/helpdesk.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/pages_helpdesk.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Apr 2020 04:15:43 GMT -->
</html>
