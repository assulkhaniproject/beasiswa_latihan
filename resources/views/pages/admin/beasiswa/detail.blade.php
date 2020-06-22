@extends('templates.admin')
<head>
    <title>BEASISWA PHB | Data Beasiswa</title>
</head>
@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h3 class="mb-5 text-center">Detail Data Beasiswa</h3>
                    </div>
                </div>
        <form method="post" action="{{route('mahasiswas.store')}}" enctype="multipart/form-data">
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Nomor Induk Mahasiswa</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="nim" value="{{$beasiswa->mahasiswa->nim}}" type="text" class="form-control" id="program_study" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Nama Mahasiswa</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="nama" value="{{$beasiswa->mahasiswa->nama}}"  type="text" class="form-control" id="nama" placeholder="Nama Mahasiswa">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Program Study</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="program_study" value="{{$beasiswa->mahasiswa->prodi->program_study}}"  type="text" class="form-control" id="program_study" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Angkatan</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="angkatan" value="{{$beasiswa->mahasiswa->angkatan}}"  type="text" class="form-control" id="program_study" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Tempat/Tanggal Lahir</label>
                <div class="col-xl-2 col-lg-9 col-sm-10">
                    <input name="" value="{{$beasiswa->mahasiswa->tempat_lahir}}" type="text" class="form-control" id="program_study" placeholder="">
                </div>
                <div class="col-xl-4 col-lg-9 col-sm-8">
                    <input name="" value="{{$beasiswa->mahasiswa->tanggal_lahir}}" type="date" class="form-control" id="program_study" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Jenis Kelamin</label>
                <div class="new-control new-radio radio-primary ml-3">
                    <input type="radio" class="new-control-input mt-2" name="custom-radio-1"
                        {{$beasiswa->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}}>
                    <span class="new-control-indicator"></span>Laki-Laki
                </div>
                <a class="new-control new-radio radio-primary ml-3">
                    <input type="radio" class="new-control-input mt-2" name="custom-radio-1"
                        {{$beasiswa->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}>
                    <span class="new-control-indicator"></span>Perempuan
                </a>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Agama</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="agama" value="{{$beasiswa->agama}}" type="text" class="form-control" id="agama" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Alamat</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <textarea name="alamat" value="" type="text" class="form-control" id="alamat" placeholder="Sesuai Dengan KTP">{{$beasiswa->alamat}}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Kode Pos</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="kode_pos" value="{{$beasiswa->kode_pos}}" type="text" class="form-control" id="kode_pos" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">IP Komulatif</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="ipk" value="{{$beasiswa->ipk}}" type="text" class="form-control"  id="ipk" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Scan KHS</label>
                <div class="col-xl-6">
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                        <a class="img-1" href="{{asset('uploads/khs/'.$beasiswa->scan_khs)}}" data-size="1600x1068" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{asset('uploads/khs/'.$beasiswa->scan_khs)}}" alt="image-gallery">
                        </a>
                    </div>
                    </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Scan KRS</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                        <a class="img-1" href="{{asset('uploads/krs/'.$beasiswa->scan_krs)}}" data-size="1600x1068" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{asset('uploads/krs/'.$beasiswa->scan_krs)}}" alt="image-gallery">
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Semester</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="semester" value="{{$beasiswa->semester}}" type="text" class="form-control" id="semester" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Email</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="email" value="{{$beasiswa->email}}" type="email" class="form-control" id="email" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">No. Hp Mahasiswa</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="no_hp" value="{{$beasiswa->no_hp}}" type="number" class="form-control" id="no_hp" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Foto Mahasiswa</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                        <a class="img-1" href="{{asset('uploads/foto/'.$beasiswa->foto)}}" data-size="1600x1068" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{asset('uploads/foto/'.$beasiswa->foto)}}" alt="image-gallery">
                        </a>
                    </div>
                </div>
            </div>

            {{--Data Orang Tua--}}
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5">
                    <h5></h5>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Nama Orang Tua</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="nama_ortu" value="{{$beasiswa->nama_ortu}}" type="text" class="form-control" id="nama_ortu" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Alamat</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <textarea name="alamat_ortu" value="" type="text" class="form-control" id="alamat_ortu" placeholder="">{{$beasiswa->alamat_ortu}}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Pekerjaan</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="pekerjaan_ortu" value="{{$beasiswa->pekerjaan_ortu}}" type="text" class="form-control" id="pekerjaan_ortu" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">No. Hp Orangtua</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="no_hp_ortu" value="{{$beasiswa->no_hp_ortu}}" type="text" class="form-control" id="no_hp_ortu" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Penghasilan</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="no_hp_ortu" value="{{$beasiswa->penghasilan_ortu}}" type="text" class="form-control" id="no_hp_ortu" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Scan Slip Gaji</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                        <a class="img-1" href="{{asset('uploads/penghasilan/'.$beasiswa->scan_penghasilan)}}" data-size="1600x1068" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{asset('uploads/penghasilan/'.$beasiswa->scan_penghasilan)}}" alt="image-gallery">
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Jumlah Tanggungan</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="tanggungan_ortu" value="{{$beasiswa->tanggungan_ortu}}" type="text" class="form-control" id="tanggungan_ortu" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Scan Kartu Keluarga</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                        <a class="img-1" href="{{asset('uploads/kk/'.$beasiswa->scan_kk)}}" data-size="1600x1068" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{asset('uploads/kk/'.$beasiswa->scan_kk)}}" alt="image-gallery">
                        </a>
                    </div>
                </div>
            </div>
            {{--Data Rekening Bank--}}
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12 mt-5">
                    <h5></h5>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Nama Lengkap Bank</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="nama_bank" value="{{$beasiswa->nama_bank}}" type="text" class="form-control" id="nama_bank" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Cabang Bank</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="cabang_bank" value="{{$beasiswa->cabang_bank}}" type="text" class="form-control" id="cabang_bank" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Nama Pemegang Rekening</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="nama_rek" value="{{$beasiswa->nama_rek}}" type="text" class="form-control" id="nama_rek" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">No. Rekening Bank</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <input name="no.rek" value="{{$beasiswa->no_rek}}" type="text" class="form-control" id="no_rek" placeholder="">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label ml-5">Scan Buku Tabungan</label>
                <div class="col-xl-6 col-lg-9 col-sm-10">
                    <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                        <a class="img-1" href="{{asset('uploads/bt/'.$beasiswa->scan_bt)}}" data-size="1600x1068" data-med="assets/img/lightbox-1.jpg" data-med-size="1024x683" data-author="Samuel Rohl">
                            <img src="{{asset('uploads/bt/'.$beasiswa->scan_bt)}}" alt="image-gallery">
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button class="btn btn-success px-5"  type="button" onclick="history.back()">OK</button>
                </div>
            </div>
        </form>
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                    <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). -->
                    <div class="pswp__bg"></div>

                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">
                        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
                        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>

                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                        <div class="pswp__ui pswp__ui--hidden">

                            <div class="pswp__top-bar">

                                <!--  Controls are self-explanatory. Order can be changed. -->
                                <div class="pswp__counter"></div>
                                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                                <button class="pswp__button pswp__button--share" title="Share"></button>
                                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                <!-- element will get class pswp__preloader--active when preloader is running -->
                                <div class="pswp__preloader">
                                    <div class="pswp__preloader__icn">
                                        <div class="pswp__preloader__cut">
                                            <div class="pswp__preloader__donut"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                <div class="pswp__share-tooltip"></div>
                            </div>
                            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                            </button>
                            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                            </button>
                            <div class="pswp__caption">
                                <div class="pswp__caption__center"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
