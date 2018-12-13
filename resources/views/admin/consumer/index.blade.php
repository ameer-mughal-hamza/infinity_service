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
                                    <h5 class="pull-left">Consumer</h5>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Area</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($consumers as $consumer)
                                        <tr>
                                            <td>{{ $consumer->fullname }}</td>
                                            <td>{{ $consumer->mobile_number }}</td>
                                            <td>{{ $consumer->area }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                                <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                                <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{--<tr>
                                        <td>John Doe</td>
                                        <td>03216417307</td>
                                        <td>Lahore</td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                            <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                            <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ameer Hamza</td>
                                        <td>03216417307</td>
                                        <td>Gujranwala</td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                            <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                            <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Awais Saeed</td>
                                        <td>03216417307
                                        </td>
                                        <td>Karachi</td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                            <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                            <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Inam Bari</td>
                                        <td>03216417307
                                        </td>
                                        <td>Islamabad</td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                            <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                            <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Saad Arif</td>
                                        <td>03216417307
                                        </td>
                                        <td>Peshawar</td>
                                        <td>
                                            <a class="btn btn-xs btn-primary" href="" role="button">view</a>
                                            <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                            <a class="btn btn-xs btn-danger" href="" role="button">delete</a>
                                        </td>
                                    </tr>--}}
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
@endsection
@section('scripts')
@endsection