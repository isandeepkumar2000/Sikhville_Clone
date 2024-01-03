@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Video
                            <a href="{{ url('video_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_video_list/' . $video->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="videoCategoriesid">Select Video Category</label>
                                    <select class="form-control select2" name="videoCategoriesid" id="videoCategoriesid">
                                        <option value="option_select">Shoppings</option>
                                        @foreach ($videocategories as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $video->videoCategoriesid) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="thumbnail_image">Upload Image</label>
                                    <input type="file" class="form-control-file" id="thumbnail_image"
                                        value="{{ $video->thumbnail_image }}" name="thumbnail_image">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom03">Short Description</label>
                                    <input type="text" class="form-control" required id="validationCustom03"
                                        value="{{ $video->short_description }}" placeholder="Short Description"
                                        name="short_description" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04">Youtube Video Url</label>
                                    <input type="text" class="form-control" required id="validationCustom04"
                                        value="{{ $video->youtube_video_url }}" placeholder="Youtube Video Url"
                                        name="youtube_video_url" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="validationCustom05">Donating Link</label>
                                    <input type="text" class="form-control" id="validationCustom05"
                                        value="{{ $video->donating_link }}" placeholder="Donating Link"
                                        name="donating_link">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom06">Play Now Link</label>
                                    <input type="text" class="form-control" id="validationCustom06"
                                        value="{{ $video->playnow_link }}" placeholder="Play Now Link" name="playnow_link"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom07">Start Easy Quiz Link</label>
                                    <input type="text" class="form-control" id="validationCustom07"
                                        value="{{ $video->startquiz_easy }}" placeholder="Start Easy Quiz Link"
                                        name="startquiz_easy">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="validationCustom08">Start Hard Quiz Link</label>
                                    <input type="text" class="form-control" id="validationCustom08"
                                        value="{{ $video->startquiz_hard }}" placeholder="Start Hard Quiz Link"
                                        name="startquiz_hard">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom09">Download Pdf Link</label>
                                    <input type="text" class="form-control" id="validationCustom09"
                                        value="{{ $video->downloadpdf_link }}" placeholder="Download Pdf Link"
                                        name="downloadpdf_link">
                                </div>

                                <div class="col-md-4">
                                    <label for="highlighting_video_Image">Upload Hightlighting
                                        Image</label>
                                    <input type="file" class="form-control-file"
                                        value="{{ $video->highlighting_video_Image }}" id="highlighting_video_Image"
                                        name="highlighting_video_Image">
                                </div>

                                <div class="col-md-4">
                                    <label for="video_duration">Video Durection</label>
                                    <input type="text" class="form-control" id="video_duration"
                                        value="{{ $video->video_duration }}" placeholder="Video Durection"
                                        name="video_duration">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="textAreaExample1">Details</label>
                                <textarea class="form-control" id="textAreaExample1" rows="4" name="details">{{ $video->details }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Download</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
