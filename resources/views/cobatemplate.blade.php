@extends('templates.admin')

@section('content')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-12 layout-spacing">
                    <div class="widget widget-chart-one">

                        {{--main content--}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-4">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Sale</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{asset('superAdmin/assets/img/boy.png')}}">
                                            </div>
                                            <p class="align-self-center mb-0">Shaun</p>
                                        </div>
                                    </td>
                                    <td>10/08/2019</td>
                                    <td>320</td>
                                    <td class=" text-center"><svg> ... </svg></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{asset('admin')}}">
                                            </div>
                                            <p  class="align-self-center mb-0">Alma</p>
                                        </div>
                                    </td>
                                    <td>11/08/2019</td>
                                    <td>420</td>
                                    <td class="text-center"><svg> ... </svg></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{asset('superAdmin/assets/img/girl-2.png')}}">
                                            </div>
                                            <p  class="align-self-center mb-0">Kelly</p>
                                        </div>
                                    </td>
                                    <td>12/08/2019</td>
                                    <td>130</td>
                                    <td class="text-center"><svg> ... </svg></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                <img alt="avatar" class="img-fluid rounded-circle" src="{{asset('admin')}}">
                                            </div>
                                            <p  class="align-self-center mb-0">Vincent</p>
                                        </div>
                                    </td>
                                    <td>13/08/2019</td>
                                    <td>260</td>
                                    <td class="text-center"><svg> ... </svg></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{--end main-content--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
