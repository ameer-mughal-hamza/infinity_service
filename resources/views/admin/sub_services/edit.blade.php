{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    {{--@include('partials.errors')--}}
    {{--<div class="container" style="padding-top: 100px;">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<form action="{{ route('blog.post.update') }}" method="post">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="title">Title</label>--}}
                        {{--<input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="content">Content</label>--}}
                        {{--<textarea id="content" name="content" value="{{$post->content}}" rows="6" cols="140"></textarea>--}}
                    {{--</div>--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<input type="hidden" name="id" value="{{$post->id}}" >--}}
                    {{--<button type="submit" class="btn btn-default">Submit</button>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

{{--@extends('layouts.master')--}}
{{--@section('content')--}}
{{--<div class="container" style="padding-top: 100px;">--}}
{{--@include('partials.errors')--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<form action="{{route('blog.post.create')}}" method="post" enctype="multipart/form-data">--}}
{{--<div class="form-group">--}}
{{--<label for="title">Title</label>--}}
{{--<input type="text" class="form-control" id="title" name="title" placeholder="Enter title here">--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="content">Content</label>--}}
{{--<textarea id="content" name="content" rows="6" cols="140"></textarea>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="upload-image">Upload Image</label>--}}
{{--<input type="file" name="upload-image" />--}}
{{--<!-- <textarea></textarea> -->--}}
{{--</div>--}}
{{--{{ csrf_field() }}--}}
{{--<button type="submit" class="btn btn-default">Submit</button>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('admin.admin-layouts.admin-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('chosen_v1.4.0/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('summernote-master/dist/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/new-article.css') }}">
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('admin.admin-partials.admin-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="content">
                    <header>
                        <h2 class="page_title">Create new article</h2>
                    </header>

                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{route('blog.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="sr-only">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Article</label>
                                    <textarea class="form-control summernote" placeholder="Article"
                                              name="content">{{$post->content}}</textarea>
                                </div>
                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Save">
                                </div>
                            </form>
                        </div>
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
@section('scripts')
    <script src="{{URL::to('chosen_v1.4.0/chosen.jquery.min.js') }}"></script>
    <script src="{{URL::to('summernote-master/dist/summernote.min.js') }}"></script>

    <script type="text/javascript">
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-result': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>

    <script type="text/javascript">
        $('.summernote').summernote({
            height: 200
        })
    </script>
@endsection
@endsection