@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any() || session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            @if ($errors->has('type_error'))
                                <li>{{ $errors->first('type_error') }}</li>
                            @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                            @if (session('error'))
                                <li>{{ session('error') }}</li>
                            @endif
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Add Website Content Here</h4>
                            <a href="{{ url('website_content_list') }}" class="btn btn-danger">BACK</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_website_content_list') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="type">Website Content Type</label>
                                    <select
                                        class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}"
                                        name="type" required id="type">
                                        <option value="" disabled selected>Choose the Type</option>
                                        <option value="game">Games</option>
                                        <option value="download">Download</option>
                                        <option value="music">Music</option>
                                        <option value="video">Video</option>
                                        <option value="punjabi_reading">Punjabi Reading</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        required id="title" placeholder="Enter the Title">
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="textAreaExample1">Content Details</label>
                                <textarea placeholder="Please enter the Content Details"
                                    class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" required id="textAreaExample1"
                                    rows="4" name="content"></textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Website Content</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection