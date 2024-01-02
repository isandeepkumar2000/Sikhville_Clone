<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video_Create</title>
    <link href="{{ env('APP_FILE_URL') }}storage/admin/assets/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ env('APP_FILE_URL') }}storage/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles for icons and colors */
        .card-header {
            background-color: #007bff;
            color: white;
        }

        .card-header h4 {
            margin-bottom: 0;
        }

        .card-body label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('Layouts.SideBarLayout.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Layouts.NavbarLayout.navbar')

                {{-- write you code here --}}

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fas fa-video"></i> Add Video Category Here</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('add_post_video_list') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="videoCategoriesid">Select Video Category</label>
                                                <select class="form-control select2" name="videoCategoriesid"
                                                    id="videoCategoriesid">
                                                    <option value="option_select" disabled selected>Choose the name
                                                    </option>
                                                    @foreach ($video as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="thumbnail_image">Upload Image</label>
                                                <input type="file" class="form-control-file" id="thumbnail_image"
                                                    name="thumbnail_image">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="validationCustom03">Title</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" placeholder="Title" name="short_description"
                                                    required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom04">YouTube Video Url</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom04" placeholder="YouTube Video Url"
                                                    name="youtube_video_url" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom05">Donating Link</label>
                                                <input type="text" class="form-control" id="validationCustom05"
                                                    placeholder="Donating Link" name="donating_link">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="form-group mb-3">
                                                <label for="validationCustom06">Play Now Link</label>
                                                <input type="text" class="form-control" id="validationCustom06"
                                                    placeholder="Play Now Link" name="playnow_link">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom07">Start Easy Quiz Link</label>
                                                <input type="text" class="form-control" id="validationCustom07"
                                                    placeholder="Start Easy Quiz Link" name="startquiz_easy">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom08">Start Hard Quiz Link</label>
                                                <input type="text" class="form-control" id="validationCustom08"
                                                    placeholder="Start Hard Quiz Link" name="startquiz_hard">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="validationCustom09">Download Pdf Link</label>
                                                <input type="text" class="form-control" id="validationCustom09"
                                                    placeholder="Download Pdf Link" name="downloadpdf_link">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="highlighting_video_Image">Upload Hightlighting
                                                    Image</label>
                                                <input type="file" class="form-control-file"
                                                    id="highlighting_video_Image" name="highlighting_video_Image">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="video_duration">Video Duration</label>
                                                <input type="text" class="form-control" id="video_duration"
                                                    placeholder="Video Duration" name="video_duration" readonly>
                                            </div>

                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="textAreaExample1">Details</label>
                                            <textarea class="form-control" id="textAreaExample1" rows="4" name="details" placeholder="write Details"></textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i>
                                            Submit</button>
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



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

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
