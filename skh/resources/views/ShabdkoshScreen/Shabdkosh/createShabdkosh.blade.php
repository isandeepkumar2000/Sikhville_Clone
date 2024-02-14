@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Add Shabdkosh Here</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('add_post_shabdkosh_list_list') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Shabdkosh Title</label>
                                <input type="text" id="title" name="title" class="form-control" required required>
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail Image</label>
                                <input type="text" id="thumbnail" name="thumbnail_short_image" class="form-control"
                                    required required>
                            </div>

                            <div class="mb-3">
                                <label for="videoUrl" class="form-label">Shabdkosh Video Url</label>
                                <input type="text" id="videoUrl" name="shabdkosh_video_url" class="form-control"
                                    required required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Short Description</label>
                                <input type="text" id="description" name="short_description" class="form-control"
                                    required required>
                            </div>

                            <div    class = "mb-3">
                            <button type  = "submit" class = "btn btn-primary">Save
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
