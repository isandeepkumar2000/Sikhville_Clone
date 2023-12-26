<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Punjabi_Reading_Categories_Edit</title>
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
                        <div class="col-lg-8">
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="d-flex justify-content-between align-items-center">
                                        Edit & Update Punjabi Reading Categories
                                        <a href="{{ url('punjabi_reading_categories_list') }}"
                                            class="btn btn-danger">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <form
                                        action="{{ url('update_punjabi_reading_categories_list/' . $punjabireadingCategories->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Category Name</label>
                                            <input type="text" id="category_name" name="name"
                                                value="{{ $punjabireadingCategories->name }}" class="form-control"
                                                required placeholder="Enter Category Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="thumbnail_image" class="form-label">Thumbnail Image</label>
                                            <input type="text" id="thumbnail_image" name="thumbnail_ishort_image"
                                                value="{{ $punjabireadingCategories->thumbnail_ishort_image }}"
                                                class="form-control" required placeholder="Enter Thumbnail Image URL"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="reading_title" class="form-label">Reading Title</label>
                                            <input type="text" id="reading_title" name="reading_title"
                                                value="{{ $punjabireadingCategories->reading_title }}"
                                                class="form-control" required placeholder="Enter Reading Title"
                                                required>
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
