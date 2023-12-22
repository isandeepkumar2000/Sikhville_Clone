<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Punjabi_Reading_Edit</title>
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
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit & Update Punjabi Reading
                                        <a href="{{ url('punjabi_reading_list') }}"
                                            class="btn btn-danger float-end">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update_punjabi_reading_list/' . $punjabireading->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-3">
                                                <label for="shopping_id">Select Punjab Reading</label>
                                                <select class="form-control select2" name="punjabireadingCategoriesid"
                                                    required id="punjabireadingCategoriesid">
                                                    <option value="option_select">Choose a category</option>
                                                    @foreach ($punjabireadingcategories as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $punjabireading->punjabireadingCategoriesid) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="validationCustom02">Thumbnail Big Image</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom02"
                                                    value="{{ $punjabireading->thumbnail_big_image }}"
                                                    placeholder="Image Url" name="thumbnail_big_image" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03">Reading Summary Pdf</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03"
                                                    value="{{ $punjabireading->reading_summary_pdf }}"
                                                    placeholder="Short Description" name="reading_summary_pdf" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom03">Reading Video Url</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03"
                                                    value="{{ $punjabireading->reading_video_url }}"
                                                    placeholder="Short Description" name="reading_video_url" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary">Update Punjabi
                                                Reading</button>
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
