<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Games_Edit</title>
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
                                    <h4>Edit & Update
                                        <a href="{{ url('games_list') }}" class="btn btn-danger float-end">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update_games_list/' . $game->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-3">
                                                <label for="shopping_id">Select Game Category</label>
                                                <select class="form-control select2" name="gameCategoriesid" required
                                                    id="gameCategoriesid">
                                                    <option value="option_select">Choose a category</option>
                                                    @foreach ($gamecategories as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $game->gameCategoriesid) selected @endif>
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <!-- Adjust column size for medium screens -->
                                                <label for="validationCustom02">Image URL</label>
                                                <input type="file" class="form-control" required
                                                    id="validationCustom02" placeholder="Image URL"
                                                    value="{{ $game->thumbnail_image }}" name="thumbnail_image"
                                                    required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom03">Short Description</label>
                                                <input type="text" class="form-control" required
                                                    id="validationCustom03" value="{{ $game->short_description }}"
                                                    placeholder="Short Description" name="short_description" required>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="textAreaExample1">Details</label>
                                            <textarea class="form-control" required id="textAreaExample1" rows="4" name="details">{{ $game->details }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary">Update Game</button>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="file"]').change(function() {
                var file = this.files[0];
                var fileSize = (file.size / 1024).toFixed(2);

                if (file.type.startsWith('image/')) {

                } else {
                    $('input[type="file"]').val('');
                    alert('Please select an image file.');
                }

            });
        });
    </script>

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
