@extends('admin.admin-layouts.admin-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/tags.css') }}">
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
            @include('admin.admin-partials.admin-header')
            <!-- main content area -->
                <div class="row">
                    <div class="col-md-4 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Medicine</h5>
                            </header>

                            <form action="{{ route('admin.tag.update') }}" method="POST">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label">Edit Tag...</label>
                                    <p>
                                        <input type="text" class="form-control" name="name"
                                               value="{{ $tag->name }}">
                                    </p>
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select class="form-control {{ Session::get('info') ? 'has-error' : '' }}"
                                                name="type">
                                            <option value="not-specified">Not Specified</option>
                                            <option value="tablet" {{ $medicine_name->medicine_type == "tablet" ? "selected" : '' }}>
                                                Tablet
                                            </option>
                                            <option value="syrup" {{ $medicine_name->medicine_type == "syrup" ? "selected" : '' }}>
                                                Syrup
                                            </option>
                                            <option value="injection" {{ $medicine_name->medicine_type == "injection" ? "selected" : '' }}>
                                                Injection
                                            </option>
                                            <option value="capsule" {{ $medicine_name->medicine_type == "capsule" ? "selected" : '' }}>
                                                Capsule
                                            </option>
                                        </select>
                                        <input type="hidden" value="{{$medicine_name->id}}" name="medicine_id">
                                        @if(Session::has('info'))
                                            <span class="help-block"
                                                  style="color: red;">{{ Session::get('info') }}</span>
                                        @endif
                                    </div>
                                    {{ csrf_field() }}
                                    <p>
                                        <input type="submit" class="btn btn-large btn-block btn-primary" value="Update">
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
