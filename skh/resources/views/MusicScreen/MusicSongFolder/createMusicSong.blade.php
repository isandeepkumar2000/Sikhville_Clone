@extends('Layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Create Music Song Here</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add_post_music_song_list') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="musicid">Music Song</label>
                                    <select class="form-control select2" name="musicid" required id="musicid">
                                        <option value="option_select" disabled selected>Choose the Music
                                            Song
                                        </option>
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
                                            <label for="">Song Name </label>
                                            <input type="text" name="song_name" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Song Size </label>
                                            <input type="text" name="song_size" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Song Link</label>
                                            <input type="text" name="song_path" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Song Duration Link</label>
                                            <input type="text" name="song_duration" class="form-control">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button style="margin-top: 10px" class="btn btn-primary" type="submit">Submit
                                Music Song</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
