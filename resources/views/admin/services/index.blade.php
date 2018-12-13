@extends('admin.admin-layouts.admin-master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/index.css') }}">
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="dashboard-con">
                    <div class="row">
                        <div class="col-md-12 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Services</h5>
                                    <a class="btn btn-xs btn-primary pull-right" href="{{ route('service.create') }}"
                                       role="button">Create new
                                        service</a>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Sub services</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->service_name }}</td>
                                            <td>
                                                @foreach($service->subservices as $key => $ss)
                                                    <label class="blank_label">{{ $ss->title }}</label>
                                                    @if($key == 1)
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if($service->subservices->count()-2 > 0)
                                                    <label class="label_bg plus">+{{ $service->subservices->count()-2 > 0 ? $service->subservices->count()-2 : '' }}</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#"
                                                   class="label label-default">{{ $service->status == 1 ? 'active' : 'pending' }}</a>
                                            </td>
                                            <td>{{ date('M j, Y', strtotime($service->created_at))}}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="javascript:void(0)"
                                                   role="button" onclick="getServiceDetail({{$service->id}});"
                                                   data-id="{{ $service->id }}">view</a>
                                                <a class="btn btn-xs btn-warning"
                                                   href="{{ route('edit_service', $service->id) }}"
                                                   role="button">edit</a>
                                                <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <a href="{{ route('all_services') }}" class="pull-right text-link">view all
                                        services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="admin-content-con clearfix">
                                <header class="clearfix">
                                    <h5 class="pull-left">Sub Service</h5>
                                    <a class="btn btn-xs btn-primary pull-right"
                                       href="{{ route('subservice.create') }}"
                                       role="button">Create new sub service</a>
                                </header>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sub_services as $key => $sub_service)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $sub_service->title }}</td>
                                            <td>{{ $sub_service->price }}</td>
                                            <td>{{ date('M j, Y', strtotime($sub_service->created_at))}}</td>
                                            <td>
                                                <form action="{{ route('subservice.destroy' , $sub_service->id)}}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <a href="" class="label btn-primary">view</a>
                                                    <a href="{{ route('subservice.destroy',['id' => $sub_service->id]) }}"
                                                       class="label label-danger">delete</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <a href="{{ route('view_all_subservices') }}" class="pull-right text-link">view all
                                        sub services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2018</div>
                        <div class="pull-right">infinity services</div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    @include('admin.services.detail')
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('a[id="view"]').click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/detail',
                    dataType: 'JSON',
                    data: {
                        'id': $(this).data('id')
                    },
                    success: function (data) {
                        var detail = JSON.stringify(data.service_name);
                        var labels = '';
                        $('.modal-title').text(data.service_name);
                        $('#modal-description').text(data.description);
                        for (var i = 0; i < data.subservices.length; i++) {
                            labels = labels + '<label class="blank_label">' + data.subservices[i].title + '</label>';
                        }
                        $('#modal-subservices').html(labels);
                    },
                    error: function (data) {
//                        alert('Error');
                    }
                });

                $('#myModal').modal('show');
            });
        });

        function getServiceDetail(id) {
            $('.modal-title').text("");
            $('#modal-description').text("");
            $('#modal-subservices').html("");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/detail',
                dataType: 'JSON',
                data: {
                    'id': id
                },
                success: function (data) {
                    var detail = JSON.stringify(data.service_name);
                    console.log(detail);
                    var labels = '';
                    $('.modal-title').text(data.service_name);
                    $('#modal-description').text(data.description);
                    for (var i = 0; i < data.subservices.length; i++) {
                        labels = labels + '<label class="blank_label">' + data.subservices[i].title + '</label>';
                    }
                    $('#modal-subservices').html(labels);
                },
                error: function (data) {
//                        alert('Error');
                }
            });

            $('#myModal').modal('show');
        }
    </script>
@endsection