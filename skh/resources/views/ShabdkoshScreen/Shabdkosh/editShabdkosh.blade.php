<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shabdkosh_Edit</title>
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
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">

                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit & Update Shabdkosh Categories
                                        <a href="{{ url('shabdkosh_list') }}" class="btn btn-danger float-end">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <form action="{{ url('update_shabdkosh_list/' . $shabdkosh->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Shabdkosh Title</label>
                                            <input type="text" id="title" name="title"
                                                value="{{ $shabdkosh->title }}" class="form-control" required required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">Thumbnail Image</label>
                                            <input type="text" id="thumbnail" name="thumbnail_short_image"
                                                value="{{ $shabdkosh->thumbnail_short_image }}" class="form-control"
                                                required required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="videoUrl" class="form-label">Shabdkosh Video Url</label>
                                            <input type="text" id="videoUrl" name="shabdkosh_video_url"
                                                value="{{ $shabdkosh->shabdkosh_video_url }}" class="form-control"
                                                required required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Short Description</label>
                                            <input type="text" id="description" name="short_description"
                                                value="{{ $shabdkosh->short_description }}" class="form-control"
                                                required required>
                                        </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Update Categories</button>
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
