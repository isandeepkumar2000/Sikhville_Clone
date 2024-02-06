@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4><i class="fas fa-music mr-2"></i>Edit & Update Music Song</h4>
                        <a href="{{ url('music_song_list') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form action="{{ url('update_music_list/' . $music->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="musicCategoriesid">Music Category</label>
                                <select class="form-control select2" name="musicCategoriesid" required
                                    id="musicCategoriesid">
                                    <option value="option_select">Choose a Music Category</option>
                                    @foreach ($musiccategories as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $music->musicCategoriesid)
                                        selected @endif>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" value="{{ $music->title }}"
                                    placeholder="Title" name="title">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="thumbnail_image">Thumbnail Image</label>
                                <input type="file" class="form-control" id="thumbnail_image"
                                    value="{{ $music->thumbnail_image }}" name="thumbnail_image">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="music_song_details_banner" class="font-weight-bold">Upload Music
                                    Song
                                    Banner</label>
                                <input type="file" class="form-control-file" id="music_song_details_banner"
                                    name="music_song_details_banner" value="{{ $music->music_song_details_banner }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="recommended_album_image" class="font-weight-bold">Upload Recommended Music
                                    Song</label>
                                <input type="file" class="form-control-file" id="recommended_album_image"
                                    name="recommended_album_image" value="{{ $music->recommended_album_image }}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="short_description">Short Description</label>
                                <input type="text" class="form-control" id="short_description"
                                    value="{{ $music->short_description }}" placeholder="Short Description"
                                    name="short_description">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Music
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection