@extends('Layouts.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8"> <!-- Adjust the column width based on your preference -->

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <h4 class="m-0">Edit & Update Home Page Slider</h4>
                        <a href="{{ url('homepage_imageslider_list') }}" class="btn btn-danger">BACK</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update_homepage_imageslider_list/' . $homepageImage->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="youtube_banner_link" class="form-label">Youtube Link</label>
                                <input type="text" name="youtube_banner_link" value="{{ $homepageImage->youtube_banner_link }}"
                                    class="form-control" >
                            </div>


                            <div class="form-group col-md-6">
                                <label for="banner_thumbnail_image">Upload
                                    Icons:</label>
                                <input type="file" class="form-control-file" id="banner_thumbnail_image"
                                    name="banner_thumbnail_image"
                                    value="{{ $homepageImage->banner_thumbnail_image }}">
                            </div>


                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update HomePage Slider</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
