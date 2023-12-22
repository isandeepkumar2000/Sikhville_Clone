<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Games</title>
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

                <!-- Modal -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4>Edit and Update Games
                                    </h4>
                                    <a href="{{ url('add_games_list') }}" class="btn btn-primary float-end">Add games
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Thumbnail Image Url</th>
                                                    <th>Featured Image Url</th>
                                                    <th>Short Description</th>
                                                    <th>Details</th>
                                                    <th>Top Games </th>
                                                    <th>Featured Games </th>
                                                    <th>Edit </th>
                                                    <th>Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($game as $item)
                                                    <tr>
                                                        <td>
                                                            @if (!empty($item->gamesCategoryDetails))
                                                                {{ $item->gamesCategoryDetails->name }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!empty($item->thumbnail_image))
                                                                <img src="{{ asset($item->thumbnail_image) }}"
                                                                    alt="Featured Game Image" width="150px"
                                                                    height="150px">
                                                            @else
                                                                <p>No Thumbnail game image available</p>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if (!empty($item->featured_game_Image_Url))
                                                                <img src="{{ asset($item->featured_game_Image_Url) }}"
                                                                    alt="Featured Game Image" width="150px"
                                                                    height="150px">
                                                            @else
                                                                <p>No featured game image available</p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->short_description }}</td>
                                                        <td>{{ $item->details }}</td>
                                                        <td>
                                                            <a href="top_games/{{ $item->id }}"
                                                                class="btn btn-sm btn-{{ $item->top_game ? 'success' : 'danger' }}">{{ $item->top_game ? 'Added' : 'Not Added' }}</a>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn btn-sm btn-{{ $item->featured_game ? 'success' : 'danger' }} featured-games-btn"
                                                                data-toggle="modal"
                                                                data-target="#featuredGamesModal_{{ $item->id }}">
                                                                {{ $item->featured_game ? 'Added' : 'Not Added' }}
                                                            </button>
                                                        </td>

                                                        <td>
                                                            <a href="{{ url('edit_games_list/' . $item->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('delete_games_list', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="featuredGamesModal_{{ $item->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="featuredGamesModalLabel_{{ $item->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form id="featuredGamesForm"
                                                                    action="{{ url('featured_games/' . $item->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="featuredGamesModalLabel">Add Featured
                                                                            Game</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="featuredGameImage">Upload
                                                                                Image:</label>
                                                                            <input type="file"
                                                                                class="form-control-file"
                                                                                id="featuredGameImage"
                                                                                name="featured_game_Image_Url" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Add Featured
                                                                            Game</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
