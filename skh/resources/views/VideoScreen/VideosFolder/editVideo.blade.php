@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-info text-white">
                    <h4 class="m-0">Welcome to Video Section</h4>
                    <a href="{{ url('video_list') }}" class="btn btn-danger">BACK</a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_video_list/' . $video->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="videoCategoriesid">Select Video Category</label>
                                <select class="form-control select2" name="videoCategoriesid" id="videoCategoriesid">
                                    <option value="option_select">Shoppings</option>
                                    @foreach ($videocategories as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $video->videoCategoriesid)
                                        selected @endif>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="thumbnail_image">Upload Image</label>
                                <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom03">Title</label>
                                <input type="text" class="form-control" id="validationCustom03" value="{{ $video->short_description }}" placeholder="Title" name="short_description">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom04">YouTube Video Url</label>
                                <input type="text" class="form-control" id="validationCustom04" placeholder="YouTube Video Url" value="{{ $video->youtube_video_url }}" name="youtube_video_url">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom06">Play Now Link</label>
                                <input type="text" class="form-control" id="validationCustom06" placeholder="Play Now Link" value="{{ $video->playnow_link }}" name="playnow_link">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom07">Start Easy Quiz Link</label>
                                <input type="text" class="form-control" id="validationCustom07" placeholder="Start Easy Quiz Link" value="{{ $video->startquiz_easy }}" name="startquiz_easy">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom08">Start Hard Quiz Link</label>
                                <input type="text" class="form-control" id="validationCustom08" placeholder="Start Hard Quiz Link" name="startquiz_hard" value="{{ $video->startquiz_hard }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom09">Download Pdf Link</label>
                                <input type="text" class="form-control" id="validationCustom09" placeholder="Download Pdf Link" name="downloadpdf_link" value="{{ $video->downloadpdf_link }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom10">Move of the Year Content</label>
                                <input type="text" class="form-control" id="validationCustom10" placeholder="Move of the Year Content" name="move_of_the_year_content" value="{{ $video->move_of_the_year_content }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom11">Video Release Type</label>
                                <input type="text" class="form-control" id="validationCustom11" placeholder="video_release_type" name="video_release_type" value="{{ $video->video_release_type }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom12">Film Certificate Rating </label>
                                <input type="text" class="form-control" id="validationCustom12" placeholder="film_certificate_ratings" name="film_certificate_ratings" value="{{ $video->film_certificate_ratings }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom13">Video Playback Singer </label>
                                <input type="text" class="form-control" id="validationCustom13" placeholder="video_playback_singer_by" name="video_playback_singer_by" value="{{ $video->video_playback_singer_by }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom14">Video Quality In </label>
                                <input type="text" class="form-control" id="validationCustom14" placeholder="video_quality_in" name="video_quality_in" value="{{ $video->video_quality_in }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom15">Video Genre By </label>
                                <input type="text" class="form-control" id="validationCustom15" placeholder="video_genre_by" name="video_genre_by" value="{{ $video->video_genre_by }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom16">Video Dimension Type </label>
                                <input type="text" class="form-control" id="validationCustom16" placeholder="video_dimension_type" name="video_dimension_type" value="{{ $video->video_dimension_type }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="highlighting_video_Image">Upload Highlighting Image</label>
                                <input type="file" class="form-control" id="highlighting_video_Image" name="highlighting_video_Image" value="{{ $video->highlighting_video_Image }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="highlighting_second_video_Image">Upload Highlighting Second Video Image
                                </label>
                                <input type="file" class="form-control" id="highlighting_second_video_Image" name="highlighting_second_video_Image" value="{{ $video->highlighting_second_video_Image }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="video_duration">Video Duration Timing</label>
                                <input type="text" class="form-control" id="video_duration" placeholder="Video Duration" name="video_duration" value="{{ $video->video_duration }}">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="textAreaExample1">Details</label>
                            <textarea class="form-control" id="textAreaExample1" rows="4" name="details">{{ $video->details }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-upload"></i> Update Download</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
