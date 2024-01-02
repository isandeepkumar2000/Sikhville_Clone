@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Music Song
                            <a href="{{ url('music_song_list') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update_music_song_list/' . $musicSong->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="musicid" class="form-label">Music Song</label>
                                <select class="form-control select2" name="musicid" required id="musicid">
                                    <option value="option_select">Choose a Music Song</option>
                                    @foreach ($music as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == $musicSong->musicid) selected @endif>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>




                            <div>
                                <div class="form-group mb-3">
                                    <label for="">Song Name </label>
                                    <input type="text" name="song_name" class="form-control"
                                        value="{{ $musicSong->song_name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Song Size </label>
                                    <input type="text" name="song_size" class="form-control"
                                        value="{{ $musicSong->song_size }}" required readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="song_path">Song File</label>
                                    <input type="file" class="form-control-file" id="song_path"
                                        name="song_path" required value="{{ $musicSong->song_path }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Song Duration Link</label>
                                    <input type="text" name="song_duration" class="form-control"
                                        value="{{ $musicSong->song_duration }}" required readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Music Song</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection