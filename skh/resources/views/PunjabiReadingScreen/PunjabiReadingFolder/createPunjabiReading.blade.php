<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Punjabi_Reading_Create</title>
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
                                    <h4>Add Punjabi Reading</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('add_post_punjabi_reading_list') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <select class="js-states form-control select2"
                                                name="punjabireadingCategoriesid" required id="shopping_id">
                                                <option value="option_select" disabled selected>Choose the name
                                                </option>
                                                @foreach ($punjabireading as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">

                                                <label for="thumbnail_big_image">Thumbnail Image</label>
                                                <input type="text" class="form-control" required
                                                    id="thumbnail_big_image" placeholder="Thumbnail Image"
                                                    name="thumbnail_big_image" required>
                                            </div>
                                            <div class="form-group col-md-6">

                                                <label for="reading_summary_pdf">Reading Summary Pdf</label>
                                                <input type="text" class="form-control" required
                                                    id="reading_summary_pdf" placeholder="Reading Summary"
                                                    name="reading_summary_pdf" required>
                                            </div>

                                            <div class="form-group col-md-6">

                                                <label for="reading_video_url">Reading Video Url</label>
                                                <input type="text" class="form-control" required
                                                    id="reading_video_url" placeholder="Reading Video"
                                                    name="reading_video_url" required>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Submit</button>
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
