<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BEASISWA PHB | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{asset('mahasiswa/assets/img/favicon.png')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('mahasiswa/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('mahasiswa/assets/css/main.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('mahasiswa/assets/css/pages/faq/faq.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>
<body>
<div class="fq-header-wrapper">
    <nav class="navbar navbar-expand">
        <div class="container">
            <h4 class="text-white"><b>B E A S I S W A P H B</b></h4>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    {{--<li class="nav-item btn-rotate dropdown user-profile-dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>
                                <span class="text-white mt-3">{{Auth::guard('mahasiswa')->user()->nama}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user-check text-white ml-1">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                            </p>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('mahasiswa.changepassword')}}">Ganti Password</a>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/">Logout</a>
                            </div>
                        </a>
                    </li>--}}
                    <ul class="navbar-item flex-row ml-md-auto">
                        <li class="nav-item dropdown user-profile-dropdown">
                            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="text-white">{{Auth::guard('mahasiswa')->user()->nama}}</span>
                                <img class="x" height="45" width="45" src="{{asset('admin/assets/img/boy.png')}}"
                                     alt="avatar">
                            </a>
                            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                                <div class="">
                                    <div class="dropdown-item">
                                        <a class="" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            Ganti Password</a>
                                    </div>
                                    <div class="dropdown-item">
                                        <a class="" href="/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            Logout
                                        </a>
                                        <form id="logout-admin-form" action="{{ route('mahasiswa.logout') }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal ganti password-->
    <div class="modal fade" id="exampleChangePassword" tabindex="-1" role="dialog"
         aria-labelledby="exampleChangePassword" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleChangePassword">Ganti Password</h5>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group row mr-lg-5">
                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm ">Password
                                    Lama</label>
                                <div class="col-sm-7">
                                    <input id="password_old" name="password_old" type="password" class="form-control"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mr-lg-5">
                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm ">Password
                                    Baru</label>
                                <div class="col-sm-7">
                                    <input id="password_new" name="password_new" type="password" class="form-control"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group row mr-lg-5">
                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm ">Konfirmasi
                                    Password</label>
                                <div class="col-sm-7">
                                    <input id="confirmed" name="confirmed" type="password" class="form-control"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-warning" data-dismiss="modal"><i
                                    class="flaticon-cancel-12"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--end modal ganti password--}}
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                        aria-hidden="true">×</span></button>
                <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-7 align-self-center order-md-0">
                <h3>
                    <b class="text-white">POLITEKNIK</b>
                    <b class="text-white">HARAPAN BERSAMA TEGAL</b>
                </h3>
                <p class="">THE TRUE VOCATIONAL CAMPUS</p>
                <a class="btn btn-outline-white center" href="{{route('mahasiswa.detail')}}">Pengajuan</a>
                <a class="btn btn-outline-white" href="{{route('mahasiswa.profile')}}">Data Anda</a>
            </div>
            <div class="col-md-5 order-md-0 order-0">
                <a target="_blank" class="banner-img">
                    <img src="{{asset('mahasiswa/assets/img/mindset.svg')}}" class="d-block" alt="image">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="faq container">
    <div class="faq-layouting layout-spacing">
        <div class="fq-comman-question-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h3>Installation Based Problems</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="">
                                <li class="list-unstyled">
                                    <div class="icon-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    How to Install CORK
                                </li>
                                <li class="list-unstyled">
                                    <div class="icon-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    Gulp not running
                                </li>
                                <li class="list-unstyled">
                                    <div class="icon-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    Browser Sync not working
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="">
                                <li class="list-unstyled">
                                    <div class="icon-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    File Strucutre
                                </li>
                                <li class="list-unstyled">
                                    <div class="icon-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    Demo Detail
                                </li>
                                <li class="list-unstyled">
                                    <div class="icon-svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-check">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    Build website and webapps
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fq-tab-section">
            <div class="row">
                <div class="col-md-12 mb-5 mt-5">

                    <h2 class="text-center">PEDOMAN PROGAM BEASISWA</h2>

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="fqheadingThow">
                                <div class="mb-0" data-toggle="collapse" role="navigation"
                                     data-target="#fqcollapseThree" aria-expanded="false"
                                     aria-controls="fqcollapseThree">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code">
                                        <polyline points="16 18 22 12 16 6"></polyline>
                                        <polyline points="8 6 2 12 8 18"></polyline>
                                    </svg>
                                    <span class="faq-q-title">KATA PENGANTAR</span>
                                </div>
                            </div>
                            <div id="fqcollapseThree" class="collapse" aria-labelledby="fqheadingThree"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <p align="justify">Pemerintah melalui Direktorat Jenderal Pendidikan Tinggi
                                        Kementerian Pendidikan
                                        Nasional berupaya mengalokasikan dana untuk memberikan bantuan biaya pendidikan
                                        kepada mahasiswa yang orang tuanya tidak mampu untuk membiayai pendidikannya,
                                        dan
                                        memberikan beasiswa kepada mahasiswa yang mempunyai prestasi tinggi, baik di
                                        bidang
                                        akademik dan atau non akademik. Agar program bantuan biaya pendidikan dan
                                        beasiswa
                                        dapat dilaksanakan sesuai dengan prinsip 3T, yaitu: Tepat Sasaran, Tepat Jumlah,
                                        dan
                                        Tepat Waktu, maka Direktorat Jenderal Pendidikan Tinggi menerbitkan pedoman.

                                        Penerbitan pedoman ini diharapkan dapat memudahkan bagi para pengelola agar
                                        penyelenggaraan program dapat terlaksana sesuai dengan harapan kita semua.
                                        Selain
                                        itu pedoman ini diharapkan juga dapat memudahkan bagi para mahasiswa yang akan
                                        mengusulkan sebagai calon penerima beasiswa, dan memudahkan bagi mahasiswa yang
                                        telah ditetapkan sebagai penerima beasiswa untuk menjalankan hak dan
                                        kewajibannya.

                                        Dengan terbitnya pedoman ini, proses penyaluran/ pemberian PPA (Peningkatan
                                        Prestasi
                                        Akademik) dan BBM (Bantuan Belajar Mahasiswa) kepada mahasiswa akan berjalan
                                        dengan
                                        lebih baik, dan mahasiswa dapat mengikuti studinya dengan lancar yang diharapkan
                                        mampu meningkatkan prestasinya yang akhirnya dapat ikut andil dalam meneruskan
                                        perjuangan bangsa menuju pembangunan Indonesia sejahtera.

                                        Kepada para pimpinan perguruan tinggi dan Kopertis Wilayah kami harapkan dapat
                                        melakukan sosialisasi, seleksi dan pengelolaan/penyaluran bantuan biaya
                                        pendidikan
                                        dan beasiswa mengacu kepada pedoman ini.

                                        Akhirnya kami mengucapkan penghargaan dan terima kasih kepada tim penyusun dan
                                        semua
                                        pihak yang telah membantu dalam mewujudkan buku pedoman ini.


                                        <br>
                                    <p align="center"> Jakarta, Agustus 2010</p>

                                    <p align="center">Direktur Jenderal Pendidikan Tinggi</p>


                                    <br><br><b><p align="center">Djoko Santoso</p></b>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="fqheadingFour">
                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseFour"
                                     aria-expanded="false" aria-controls="fqcollapseFour">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code">
                                        <polyline points="16 18 22 12 16 6"></polyline>
                                        <polyline points="8 6 2 12 8 18"></polyline>
                                    </svg>
                                    <span class="faq-q-title">A. PENDAHULUAN</span>
                                </div>
                            </div>
                            <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <p align="justify">A. LATAR BELAKANG

                                        Tiap-tiap warga negara berhak mendapatkan pengajaran. Hak setiap warga negara
                                        tersebut telah dicantumkan dalam Pasal 31 (1) Undang-Undang Dasar 1945.
                                        Berdasarkan pasal tersebut, maka Pemerintah dan pemerintah daerah wajib
                                        memberikan layanan dan kemudahan, serta menjamin terselenggaranya pendidikan
                                        yang bermutu bagi setiap warga negara tanpa diskriminasi, dan masyarakat
                                        berkewajiban memberikan dukungan sumber daya dalam penyelenggaraan pendidikan.
                                        Untuk menyelenggarakan pendidikan yang bermutu diperlukan biaya yang cukup
                                        besar. Oleh karena itu bagi setiap peserta didik pada setiap satuan pendidikan
                                        berhak mendapatkan biaya pendidikan bagi mereka yang orang tuanya tidak mampu
                                        membiayai pendidikannya, dan berhak mendapatkan beasiswa bagi mereka yang
                                        berprestasi.

                                        Undang-undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional, Bab V
                                        pasal 12 (1.c), menyebutkan bahwa setiap peserta didik pada setiap satuan
                                        pendidikan berhak mendapatkan beasiswa bagi yang berprestasi yang orang tuanya
                                        tidak mampu membiayai pendidikannya. Pasal 12 (1.d), menyebutkan bahwa setiap
                                        peserta didik pada setiap satuan pendidikan berhak mendapatkan biaya pendidikan
                                        bagi mereka yang orang tuanya tidak mampu membiayai pendidikannya.

                                        Peraturan Pemerintah Nomor 48 tahun 2008 tentang Pendanaan Pendidikan, Bagian
                                        Kelima, Pasal 27 ayat (1), menyebutkan bahwa Pemerintah dan pemerintah daerah
                                        sesuai kewenangannya memberi bantuan biaya pendidikan atau beasiswa kepada
                                        peserta didik yang orang tua atau walinya tidak mampu membiayai pendidikannya.
                                        Pasal 27 ayat (2), menyebutkan bahwa Pemerintah dan pemerintah daerah sesuai
                                        dengan kewenangannya dapat memberi beasiswa kepada peserta didik yang
                                        berprestasi.

                                        pada Undang-undang dan Peraturan Pemerintah tersebut, maka Pemerintah melalui
                                        Direktorat Jenderal Pendidikan Tinggi – Kementerian Pendidikan Nasional,
                                        mengupayakan pemberian bantuan biaya pendidikan bagi mahasiswa yang orang
                                        tua/walinya kurang mampu membiayai pendidikan, dalam bentuk Bantuan Biaya
                                        Mahasiswa (BBM) dan Beasiswa bagi mahasiswa berprestasi dalam bentuk Beasiswa
                                        Peningkatan Prestasi Akademik (PPA).</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="fqheadingFive">
                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseFive"
                                     aria-expanded="false" aria-controls="fqcollapseFive">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code">
                                        <polyline points="16 18 22 12 16 6"></polyline>
                                        <polyline points="8 6 2 12 8 18"></polyline>
                                    </svg>
                                    <span class="faq-q-title">Compilation Issue</span>
                                    <div class="like-faq">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-thumbs-up">
                                            <path
                                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                        </svg>
                                        <span class="faq-like-count">09</span></div>
                                </div>
                            </div>
                            <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="fqheadingSix">
                                <div class="mb-0" data-toggle="collapse" role="navigation" data-target="#fqcollapseSix"
                                     aria-expanded="false" aria-controls="fqcollapseSix">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-code">
                                        <polyline points="16 18 22 12 16 6"></polyline>
                                        <polyline points="8 6 2 12 8 18"></polyline>
                                    </svg>
                                    <span class="faq-q-title">Compilation Issue</span>
                                    <div class="like-faq">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-thumbs-up">
                                            <path
                                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                        </svg>
                                        <span class="faq-like-count">58</span></div>
                                </div>
                            </div>
                            <div id="fqcollapseSix" class="collapse" aria-labelledby="fqheadingSix"
                                 data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                        richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                        brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                        sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                        shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                        cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                        Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                        you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fq-article-section">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                    <div class="card">
                        <img src="{{asset('admin/assets/img/favicon.png')}}" class="card-img-top" alt="faq-video-tutorials">
                        <div class="card-body">
                            <h5 class="card-title text-center">Politeknik Harapan Bersama</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                    <div class="card">
                        <img src="{{asset('admin/assets/img/bg.png')}}" class="card-img-top " alt="faq-video-tutorials">
                        <div class="card-body">
                            <h5 class="card-title text-center">Kementrian Pendidikan Dan Kebudayaan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                    <div class="card">
                        <img src="{{asset('admin/assets/img/favicon.png')}}" class="card-img-top" alt="faq-video-tutorials">
                        <div class="card-body">
                            <h5 class="card-title text-center">Politeknik Harapan Bersama</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
                    <div class="card">
                        <img src="{{asset('admin/assets/img/bg.png')}}" class="card-img-top" alt="faq-video-tutorials">
                        <div class="card-body">
                            <h5 class="card-title text-center">Kementrian Pendidikan Dan Kebudayaan</h5>
                        </div>
                    </div>
                </div>
            </div>
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
                        <p class="mt-md-0 mt-4 mb-0">2020 &copy;
                            <a target="_blank" href="https://github.com/assulkhaniproject/">TUGAS AKHIR</a>.</p>
                    </div>
                    <div
                        class="col-xl-5 mx-auto col-lg-6 col-md-6 site-content-inner text-md-right text-center align-self-center">
                        <p class="mb-0">Politeknik Harapan Bersama Kota Tegal</p>
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
<script src="{{asset('mahasiswa/assets/js/pages/faq/faq.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
