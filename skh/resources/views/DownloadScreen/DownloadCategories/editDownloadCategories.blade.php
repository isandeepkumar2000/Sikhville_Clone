<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Download_Categories_Edit</title>
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
                        <div class="col-md-12">

                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit & Update Downlord Categories
                                        <a href="{{ url('download_categories_list') }}"
                                            class="btn btn-danger float-end">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <form
                                        action="{{ url('update_download_categories_list/' . $downlordCategories->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group mb-3">
                                            <label for="">Categories Name</label>
                                            <input type="text" name="name" value="{{ $downlordCategories->name }}"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="">Icons</label>
                                            <input type="text" name="downlord_categories_icons"
                                                value="{{ $downlordCategories->downlord_categories_icons }}"
                                                class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary">Update Downlord
                                                Categories</button>
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
