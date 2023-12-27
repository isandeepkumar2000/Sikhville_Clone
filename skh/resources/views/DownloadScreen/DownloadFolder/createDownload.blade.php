<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Download</title>
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
                        <div class="col-lg-8"> <!-- Adjusted column size for larger screens -->
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Download Here</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('add_post_download_list') }}" method="POST">
                                        @csrf
                                        <div class="row"> <!-- Using rows and columns for better responsiveness -->
                                            <div class="col-md-6 mb-3">
                                                <label for="categoryid">Music</label>
                                                <select class="form-control select2" name="categoryid" required
                                                    id="categoryid">
                                                    <option value="option_select" disabled selected>Choose the Download
                                                    </option>
                                                    @foreach ($download as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03" class="form-label">Title</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" placeholder="Title" name="short_title">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03" class="form-label">Download PDF
                                                    Link</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" placeholder="Paste Link"
                                                    name="downloadpdf_url">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03" class="form-label">Thumbnail
                                                    Image</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" placeholder="Thumbnail Image"
                                                    name="thumbnail_image">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <button style="margin-top: 10px" class="btn btn-primary"
                                                    type="submit">Submit Download</button>
                                            </div>
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
