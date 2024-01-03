<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Games</title>
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
                                    <h4>Edit and Update Games</h4>
                                    <a href="{{ url('add_games_list') }}" class="btn btn-primary float-end">
                                        <i class="fas fa-plus-circle me-1"></i>Add Games
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Thumbnail Image</th>
                                                    <th>Featured Image</th>
                                                    <th>Short Description</th>
                                                    <th>Details</th>
                                                    <th>Top Games</th>
                                                    <th>Featured Games</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
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
                                                                <img src="{{ url('skh/public/' . $item->thumbnail_image) }}"
                                                                    alt="Thumbnail Image" width="80px" height="80px">
                                                            @else
                                                                <p>No Thumbnail available</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!empty($item->featured_game_Image_Url))
                                                                <img src="{{ url('skh/public/' . $item->featured_game_Image_Url) }}"
                                                                    alt="Featured Image" width="80px" height="80px">
                                                            @else
                                                                <p>No featured image available</p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->short_description }}</td>
                                                        <td>{{ $item->details }}</td>
                                                        <td>
                                                            <a href="top_games/{{ $item->id }}"
                                                                class="btn btn-sm {{ $item->top_game ? 'btn-success' : 'btn-primary' }}">
                                                                <i class="fas fa-star"></i>
                                                                {{ $item->top_game ? 'Added' : 'Not Added' }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn btn-sm {{ $item->featured_game ? 'btn-success' : 'btn-primary' }} featured-games-btn"
                                                                data-toggle="modal"
                                                                data-target="#featuredGamesModal_{{ $item->id }}">
                                                                <i class="fas fa-heart"></i>
                                                                {{ $item->featured_game ? 'Added' : 'Not Added' }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('edit_games_list/' . $item->id) }}"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                                'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                                'deleteUrl' => url('delete_game_list', $item->id),
                                                            ])
                                                            @endcomponent
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteConfirmationModal_{{ $item->id }}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
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
                                                                            class="btn btn-primary">Add Featured Game
                                                                        </button>
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
