<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Website_Content</title>
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

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Website Contant Here</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('add_post_website_content_list') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="type">Website Content Type</label>
                                                <select class="form-control select2" name="type" required
                                                    id="type">
                                                    <option value="type" disabled selected>Choose the Type
                                                    </option>
                                                    <option value="game">Games</option>
                                                    <option value="download">Download</option>
                                                    <option value="music">Music</option>
                                                    <option value="video">Video</option>
                                                    <option value="punjabi_reading">Punjabi Reading</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Title</label>
                                                <input type="text" name="title" class="form-control" required
                                                    id="title" placeholder="Enter the Title">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="textAreaExample1">Content Details</label>
                                            <textarea placeholder="Please enter the Content Details" class="form-control" required id="textAreaExample1"
                                                rows="4" name="content"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Save Website Content</button>
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
