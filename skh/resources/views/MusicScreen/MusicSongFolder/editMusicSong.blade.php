@extends('Layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4> <i style="margin-right: 10px;" class="fas fa-music"></i>Edit & Update Music Song</h4>
                    <a href="{{ url('music_song_list') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ url('update_music_song_list/' . $musicSong->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div    class = "mb-3">
                        <label  for   = "musicid" class             = "form-label">Music Song</label>
                        <select class = "form-control select2" name = "musicid"  id = "musicid">
                        <option value = "option_select">Choose a Music Song</option>
                                @foreach ($music as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $musicSong->musicid) selected @endif>
                                    {{ $item->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <div class="form-group mb-3">
                                <label for="song_name">Song Name </label>
                                <input type="text" name="song_name" class="form-control"
                                    value="{{ $musicSong->song_name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_size">Song Size </label>
                                <input type="text" name="song_size" class="form-control"
                                    value="{{ $musicSong->song_size }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_path">Song Link</label>
                                <input type="text" name="song_path" class="form-control"
                                    value="{{ $musicSong->song_path }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_duration">Song Duration Link</label>
                                <input type="text" name="song_duration" class="form-control"
                                    value="{{ $musicSong->song_duration }}">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="music_song_details_image" class="font-weight-bold">Upload Music Song
                                    Image</label>
                                <input type="file" class="form-control-file" id="music_song_details_image"
                                    name="music_song_details_image">
                            </div>


                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update Music Song
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
