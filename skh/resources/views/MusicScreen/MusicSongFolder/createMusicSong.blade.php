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
                    <h4>Add Music Song Here</h4>
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
                                        <input type="text" name="song_name" class="form-control" required required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Song Size </label>
                                        <input type="text" name="song_size" class="form-control" required required readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="song_path">Song File</label>
                                        <input type="file" class="form-control-file" id="song_path" name="song_path" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Song Duration Link</label>
                                        <input type="text" name="song_duration" class="form-control" required required readonly>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="file"]').change(function() {
            var file = this.files[0];
            var fileSize = (file.size / 1024 / 1024).toFixed(2);
            if (file.type.startsWith('audio/')) {
                var audio = document.createElement('audio');
                audio.onloadedmetadata = function() {
                    var duration = audio.duration;
                    $('input[name="song_duration"]').val(duration + ' seconds');
                };
                audio.src = URL.createObjectURL(file);
            } else {
                $('input[type="file"]').val('');
                alert('Please select an audio file.');
                $('input[name="song_duration"]').val('NA');
                $('input[name="song_size"]').val('NA');
            }
            if (file.type.startsWith('audio/')) {
                $('input[name="song_size"]').val(fileSize + ' MB');
            } else {
                $('input[name="song_size"]').val('NA');
            }
        });
    });

</script>
