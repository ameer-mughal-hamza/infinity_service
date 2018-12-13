@extends('admin.admin-layouts.admin-master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/default.css') }}">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="content">
                    <header>
                        <h2 class="page_title">Create new service</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{ route('subservice.store') }}" method="POST">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label class="sr-only">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           placeholder="Enter title here..." value="{{ old('title') }}">
                                    @if($errors->has('title'))
                                        <span class="help-block">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="sr-only">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                              placeholder="Enter Description here..."
                                              rows="10">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rs.</div>
                                        <input type="text" class="form-control" name="price" id="price"
                                               placeholder="Amount">
                                        <div class="input-group-addon">.00</div>
                                    </div>
                                    @if($errors->has('price'))
                                        <span class="help-block">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection