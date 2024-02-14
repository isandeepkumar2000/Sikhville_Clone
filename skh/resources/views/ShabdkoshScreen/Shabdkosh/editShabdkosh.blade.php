@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Shabdkosh
                            <a href="{{ url('shabdkosh_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update_shabdkosh_list/' . $shabdkosh->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Shabdkosh Title</label>
                                <input type="text" id="title" name="title" value="{{ $shabdkosh->title }}"
                                    class="form-control"  >
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail Image</label>
                                <input type="text" id="thumbnail" name="thumbnail_short_image"
                                    value="{{ $shabdkosh->thumbnail_short_image }}" class="form-control"  >
                            </div>

                            <div class="mb-3">
                                <label for="videoUrl" class="form-label">Shabdkosh Video Url</label>
                                <input type="text" id="videoUrl" name="shabdkosh_video_url"
                                    value="{{ $shabdkosh->shabdkosh_video_url }}" class="form-control"  >
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Short Description</label>
                                <input type="text" id="description" name="short_description"
                                    value="{{ $shabdkosh->short_description }}" class="form-control"  >
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
