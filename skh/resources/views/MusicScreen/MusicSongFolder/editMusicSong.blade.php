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
                    <form action="{{ url('update_music_song_list/' . $musicSong->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="musicid" class="form-label">Music Song</label>
                            <select class="form-control select2" name="musicid" id="musicid">
                                <option value="option_select">Choose a Music Song</option>
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
                                <input type="text" name="song_name" class="form-control" value="{{ $musicSong->song_name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_size">Song Size </label>
                                <input type="text" name="song_size" class="form-control" value="{{ $musicSong->song_size }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_path">Song Link</label>
                                <input type="text" name="song_path" class="form-control" value="{{ $musicSong->song_path }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_duration">Song Duration Link</label>
                                <input type="text" name="song_duration" class="form-control" value="{{ $musicSong->song_duration }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="song_duration">Music Composer Name</label>
                                <input type="text" name="music_composers_by" class="form-control" value="{{ $musicSong->music_composers_by }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="song_duration">Music Lyrics By</label>
                                <input type="text" name="music_lyrics_by" class="form-control" value="{{ $musicSong->music_lyrics_by }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="song_duration">Music Artist Name</label>
                                <input type="text" name="music_artists_name" class="form-control" value="{{ $musicSong->music_artists_name }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="music_song_details_image" class="font-weight-bold">Upload Music Song
                                    Image</label>
                                <input type="file" class="form-control-file" id="music_song_details_image" name="music_song_details_image">
                            </div>

                              <div class="form-group mb-3">
                                        <label for="sportify">Sportify</label>
                                        <input type="text" name="sportify" class="form-control"  value="{{ $musicSong->sportify }}">
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="wynk">Wynk</label>
                                        <input type="text" name="wynk" class="form-control" value="{{ $musicSong->wynk }}">
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="sound_cloud">Sound Cloud</label>
                                        <input type="text" name="sound_cloud" class="form-control" value="{{ $musicSong->sound_cloud }}">
                                    </div>

                                      <div class="form-group mb-3">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" name="youtube" class="form-control" value="{{ $musicSong->youtube }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="apple">Apple</label>
                                        <input type="text" name="apple" class="form-control" value="{{ $musicSong->apple }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="amazon">Amazon</label>
                                        <input type="text" name="amazon" class="form-control" value="{{ $musicSong->amazon }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="internal_music_link">Internal Music Link</label>
                                        <input type="text" name="internal_music_link" class="form-control" value="{{ $musicSong->internal_music_link }}">
                                    </div>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
