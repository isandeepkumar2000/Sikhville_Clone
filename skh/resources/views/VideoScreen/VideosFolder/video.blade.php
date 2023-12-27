<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Video</title>
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

                <div class="container-fluid">
                    <div class="column">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4>Edit and Update Video Data

                                    </h4>
                                    <a href="{{ url('add_video_list') }}" class="btn btn-primary float-end">Add Video
                                        Category</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Thumbnail Image Url</th>
                                                    <th>Featured Video Url</th>
                                                    <th>Title</th>
                                                    <th>Youtube Video Url </th>
                                                    <th>Donating Link </th>
                                                    <th>PlayNow Link </th>
                                                    <th>Start Quiz Easy Link </th>
                                                    <th>Start Quiz Hard Link </th>
                                                    <th>Download Pdf Link </th>
                                                    <th>Details</th>
                                                    <th>Top Video</th>
                                                    <th>Featured Video</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($video as $item)
                                                    <tr>
                                                        <td>
                                                            @if (!empty($item->videoCategoryDetails))
                                                                {{ $item->videoCategoryDetails->name }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!empty($item->thumbnail_image))
                                                                <img src="{{ asset($item->thumbnail_image) }}"
                                                                    alt="Featured Game Image" width="150px"
                                                                    height="150px">
                                                            @else
                                                                <p>No featured Video image available</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (!empty($item->featured_video_Image_Url))
                                                                <img src="{{ asset($item->featured_video_Image_Url) }}"
                                                                    alt="Featured Game Image" width="150px"
                                                                    height="150px">
                                                            @else
                                                                <p>No featured featured image available</p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->short_description }}</td>
                                                        <td>{{ $item->donating_link }}</td>
                                                        <td>{{ $item->playnow_link }}</td>
                                                        <td>{{ $item->youtube_video_url }}</td>
                                                        <td>{{ $item->startquiz_easy }}</td>
                                                        <td>{{ $item->startquiz_hard }}</td>
                                                        <td>{{ $item->downloadpdf_link }}</td>
                                                        <td>{{ $item->details }}</td>
                                                        <td>
                                                            <a href="top_video/{{ $item->id }}"
                                                                class="btn btn-sm btn-{{ $item->top_video ? 'success' : 'danger' }}">{{ $item->top_video ? 'Added' : 'Not Added' }}</a>
                                                        </td>
                                                        <td>
                                                            <button
                                                                class="btn btn-sm btn-{{ $item->featured_video ? 'success' : 'danger' }} featured-games-btn"
                                                                data-toggle="modal"
                                                                data-target="#featuredGamesModal_{{ $item->id }}">
                                                                {{ $item->featured_video ? 'Added' : 'Not Added' }}
                                                            </button>
                                                        </td>

                                                        <td>
                                                            <a href="{{ url('edit_video_list/' . $item->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('delete_video_list', $item->id) }}"
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
                                                                    action="{{ url('featured_video/' . $item->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="featuredGamesModalLabel">Add Featured
                                                                            Video</h5>
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
                                                                                name="featured_video_Image_Url"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Add Featured
                                                                            Video</button>
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
