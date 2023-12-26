<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Music_Edit</title>
    <link href="{{ env('APP_FILE_URL') }}storage/admin/assets/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ env('APP_FILE_URL') }}storage/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('Layouts.SideBarLayout.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Layouts.NavbarLayout.navbar')

                {{-- write you code here --}}

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit & Update Student
                                        <a href="{{ url('music_song_list') }}" class="btn btn-danger float-end">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update_music_song_list/' . $musicSong->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="musicid" class="form-label">Music Categories</label>
                                            <select class="form-control select2" name="musicid" required id="musicid">
                                                <option value="option_select">Choose a Music category</option>
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
                                            <button type="submit" class="btn btn-primary">Update Music</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('Layouts.FooterLayout.footer')
        </div>
    </div>


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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/jquery/jquery.min.js"></script>
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/js/demo/chart-area-demo.js"></script>
    <script src="{{ env('APP_FILE_URL') }}storage/admin/assets/js/demo/chart-pie-demo.js"></script>



</body>

</html>
