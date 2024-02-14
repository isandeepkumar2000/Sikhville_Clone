@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class = "card">
            <div class = "card-header bg-primary text-white">
                    <h4>Add Music Here</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('add_post_music_list') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="musicCategoriesid" class="font-weight-bold">Music</label>
                                <select class="form-control select2" name="musicCategoriesid" required
                                    id="musicCategoriesid">
                                    <option value="option_select" disabled selected>Choose the Music</option>
                                    @foreach ($music as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title" class="font-weight-bold">Title</label>
                                <input type="text" class="form-control" required id="title" placeholder="Title"
                                    name="title">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="thumbnail_image" class="font-weight-bold">Upload Image:</label>
                                <input type="file" class="form-control-file" id="thumbnail_image" name="thumbnail_image"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="music_song_details_banner" class="font-weight-bold">Upload Music
                                    Song
                                    Banner</label>
                                <input type="file" class="form-control-file" id="music_song_details_banner"
                                    name="music_song_details_banner" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="recommended_album_image" class="font-weight-bold">Upload Recommended Music
                                    Song
                                </label>
                                <input type="file" class="form-control-file" id="recommended_album_image"
                                    name="recommended_album_image" required>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="short_description" class="font-weight-bold">Short Description</label>
                                <input type="text" class="form-control" required id="short_description"
                                    placeholder="Short Description" name="short_description">
                            </div>
                        </div>

                        {{-- <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="song_path" class="font-weight-bold">Song Path</label>
                                <input type="text" class="form-control" id="song_path" placeholder="Song Path"
                                    name="song_path">
                            </div>
                        </div> --}}

                        <div class="form-row">
                            <div class="col-md-6">
                                <a href="{{ url('music_list') }}" class="btn btn-danger">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
