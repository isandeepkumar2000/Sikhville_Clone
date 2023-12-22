<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Video_Edit</title>
    <link href="{{ env('APP_URL') }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ env('APP_URL') }}css/sb-admin-2.min.css" rel="stylesheet">
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
                                    <h4>Edit & Update Video
                                        <a href="{{ url('video_list') }}" class="btn btn-danger float-end">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update_video_list/' . $video->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-3">
                                                <label for="videoCategoriesid">Select Video Category</label>
                                                <select class="form-control select2" name="videoCategoriesid" required
                                                    id="videoCategoriesid">
                                                    <option value="option_select">Shoppings</option>
                                                    @foreach ($videocategories as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $video->videoCategoriesid) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="validationCustom02">Image Url</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom02" value="{{ $video->thumbnail_image }}"
                                                    placeholder="Image Url" name="thumbnail_image" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom03">Short Description</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" value="{{ $video->short_description }}"
                                                    placeholder="Short Description" name="short_description" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom04">Youtube Video Url</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom04" value="{{ $video->youtube_video_url }}"
                                                    placeholder="Youtube Video Url" name="youtube_video_url" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="validationCustom05">Donating Link</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom05" value="{{ $video->donating_link }}"
                                                    placeholder="Donating Link" name="donating_link" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom06">Play Now Link</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom06" value="{{ $video->playnow_link }}"
                                                    placeholder="Play Now Link" name="playnow_link" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom07">Start Easy Quiz Link</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom07" value="{{ $video->startquiz_easy }}"
                                                    placeholder="Start Easy Quiz Link" name="startquiz_easy" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="validationCustom08">Start Hard Quiz Link</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom08" value="{{ $video->startquiz_hard }}"
                                                    placeholder="Start Hard Quiz Link" name="startquiz_hard" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom09">Download Pdf Link</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom09" value="{{ $video->downloadpdf_link }}"
                                                    placeholder="Download Pdf Link" name="downloadpdf_link" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="textAreaExample1">Details</label>
                                            <textarea class="form-control" required id="textAreaExample1" rows="4" name="details">{{ $video->details }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Download</button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ env('APP_URL') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ env('APP_URL') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ env('APP_URL') }}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ env('APP_URL') }}js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ env('APP_URL') }}vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ env('APP_URL') }}js/demo/chart-area-demo.js"></script>
    <script src="{{ env('APP_URL') }}js/demo/chart-pie-demo.js"></script>

</body>

</html>
