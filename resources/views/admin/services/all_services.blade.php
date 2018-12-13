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
                                            <td>{{ date('M j, Y', strtotime($service->created_at))}}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="JavaScript:Void(0);" role="button" id="view"
                                                   data-id="{{ $service->id }}">view</a>
                                                <a class="btn btn-xs btn-warning" role="button"
                                                   href="{{ route('edit_service', $service->id) }}">edit</a>
                                                <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
    </script>
@endsection