<!doctype html>
<html lang="en">
<head>
    <title>BEASISWA PHB | Prodi</title>
    @include('templates.partials.prodi._head')
</head>

<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

{{-- start navbar--}}
@include('templates.partials.prodi._navbar')
{{-- end navbar--}}


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    {{--sidebar--}}
    @include('templates.partials.prodi._sidebar')
    {{--endsidebar--}}

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            {{--start main--}}
            @yield('content')
            {{--end main--}}
        </div>
    </div>


    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com/">Tugas Akhir</a>, Beasiswa PHB.</p>
        </div>
    </div>
</div>
{{--END BEGIN MAIN CONTAINER --}}

{{-- start javascript--}}
@include('templates.partials.prodi._script')
{{--end javascript--}}

</body>
</html>
