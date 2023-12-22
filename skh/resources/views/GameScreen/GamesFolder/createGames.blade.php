<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Games_Create</title>
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
                                    <h4>Add Download Categories Here</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('add_post_games_list') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <select class="js-states form-control select2" name="gameCategoriesid"
                                                required id="shopping_id">
                                                <option value="option_select" disabled selected>Choose the name
                                                </option>
                                                @foreach ($game as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="featuredGameImage">Upload
                                                    Image:</label>
                                                <input type="file" class="form-control-file" id="thumbnail_image"
                                                    name="thumbnail_image" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <!-- Adjust column size for medium screens -->
                                                <label for="validationCustom03">Short Description</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" placeholder="Short Description"
                                                    name="short_description" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textAreaExample1">Details</label>
                                            <textarea class="form-control" required id="textAreaExample1" rows="4" name="details"></textarea>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="file"]').change(function() {
                var file = this.files[0];
                var fileSize = (file.size / 1024).toFixed(2); // File size in KB


                // File size is within the allowed range (246 to 260 KB)
                if (file.type.startsWith('image/')) {
                    // You can proceed with handling the image upload
                    // This is where you might implement further logic or actions
                } else {
                    $('input[type="file"]').val('');
                    alert('Please select an image file.');
                }

            });
        });
    </script>


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
