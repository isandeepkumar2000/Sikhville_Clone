@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4 class="m-0">Add HomePage Slider</h4>
                        <a href="{{ url('homepage_imageslider_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_post_homepage_imageslider_list') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="youtube_banner_link" class="form-label">Youtube Url</label>
                                <input type="text" name="youtube_banner_link" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="banner_thumbnail_image" class="form-label">Upload Icons</label>
                                <input type="file" class="form-control-file" id="banner_thumbnail_image"
                                    name="banner_thumbnail_image" required>
                            </div>

                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
