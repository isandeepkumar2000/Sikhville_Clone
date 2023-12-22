<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sentance_Making_Create</title>
    <link href="{{ env('APP_URL') }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
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
                        <div class="col-md-6">
                            @if (session('status'))
                                <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <h4>Add Sentance making categories Here</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('add_post_sentance_making_list') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="sentancemakingCategoriesid">Music </label>
                                                <select class="form-control select2" name="sentancemakingCategoriesid"
                                                    required id="sentancemakingCategoriesid">
                                                    <option value="option_select" disabled selected>Choose the Music
                                                    </option>
                                                    @foreach ($sentancemaking as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="short_description">Video Game Play</label>
                                                <input type="text" class="form-control" required id="video_game_play"
                                                    placeholder="Video Game Play" name="video_game_play" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="thumbnail_image">thumbnail Image URL</label>
                                                <input type="text" class="form-control" required id="thumbnail_image"
                                                    placeholder="Image URL" name="thumbnail_image" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="sentance_making_vismaad_title">Sentance Making Title
                                                </label>
                                                <input type="text" class="form-control" required
                                                    id="sentance_making_vismaad_title" placeholder="Short Description"
                                                    name="sentance_making_vismaad_title" required>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="short_description">Short Description
                                                </label>
                                                <input type="text" class="form-control" required
                                                    id="short_description" placeholder="Short Description"
                                                    name="short_description" required>
                                            </div>
                                        </div>
                                        <button style="margin-top: 10px" class="btn btn-primary"
                                            type="submit">Submit</button>
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
