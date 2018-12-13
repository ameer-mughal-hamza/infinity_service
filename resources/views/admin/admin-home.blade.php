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
                <div class="row">
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2015</div>
                        <div class="pull-right">admin system</div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--All scripts of this page will include in the master layout structure and then display--}}