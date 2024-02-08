@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if ($errors->any() || session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-between align-items-center">
                            Edit & Update Website Content
                            <a href="{{ url('website_content_list') }}" class="btn btn-danger">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_website_content_list/' . $websiteContent->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Website Content Type</label>
                                    <select class="form-control select2" name="type" required id="type">
                                        <option value="" disabled>Choose the Type</option>
                                        <option value="game" @if ($websiteContent->type === 'game') selected @endif>Games
                                        </option>
                                        <option value="download" @if ($websiteContent->type === 'download') selected @endif>Download
                                        </option>
                                        <option value="music" @if ($websiteContent->type === 'music') selected @endif>Music
                                        </option>
                                        <option value="video" @if ($websiteContent->type === 'video') selected @endif>Video
                                        </option>
                                        <option value="punjabi_reading" @if ($websiteContent->type === 'punjabi_reading') selected @endif>
                                            Punjabi
                                            Reading</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" value="{{ $websiteContent->title }}"
                                        class="form-control"  placeholder="Enter the title">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="textAreaExample1" class="form-label">Content Details</label>
                                <textarea class="form-control"  id="textAreaExample1" rows="4" name="content"
                                    placeholder="Please enter the Content Details">{{ $websiteContent->content }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Website
                                    Content</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
