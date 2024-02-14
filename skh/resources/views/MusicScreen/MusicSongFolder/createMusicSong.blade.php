@extends('Layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">

                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4><i class="fas fa-music mr-2"></i>Create Music Song Here</h4>
                    <a href="{{ url('music_song_list') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ url('add_post_music_song_list') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="musicid">Music Song</label>
                                <select class="form-control select2" name="musicid" required id="musicid">
                                    <option value="option_select" disabled selected>Choose the Music Song</option>
                                    @foreach ($musicSong as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div>
                                    <div class="form-group mb-3">
                                        <label for="song_name">Song Name</label>
                                        <input type="text" name="song_name" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="song_size">Song Size</label>
                                        <input type="text" name="song_size" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="song_path">Song Link</label>
                                        <div class="input-group">
                                            <input type="text" name="song_path" class="form-control" required>
                                        </div>
                                    </div>
                                    <div   class = "form-group mb-3">
                                    <label for   = "song_duration">Song Timing</label>
                                    <input type  = "text" name = "song_duration" class = "form-control">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="music_song_details_image" class="font-weight-bold">Upload Music Song
                                            Image</label>
                                        <input type="file" class="form-control-file" id="music_song_details_image"
                                            name="music_song_details_image" required>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-check-circle mr-2"></i> Save Music Details Song
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
