<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Download</title>
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
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Edit and Update Download Data</h4>
                            <a href="{{ url('add_download_list') }}" class="btn btn-primary float-end">Add Download
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Thumbnail Image Url</th>
                                            <th>Short Description</th>
                                            <th>Download Pdf Url</th>
                                            <th>Featured</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($download as $item)
                                            <tr>
                                                <td>
                                                    @if (!empty($item->downloadcategoryDetails))
                                                        {{ $item->downloadcategoryDetails->name }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->thumbnail_image }}</td>
                                                <td>{{ $item->short_title }}</td>
                                                <td>{{ $item->downloadpdf_url }}</td>
                                                <td>
                                                    <a href="featured_download_list/{{ $item->id }}"
                                                        class="btn btn-sm btn-{{ $item->featured_download ? 'success' : 'danger' }}">
                                                        {{ $item->featured_download ? 'Added' : 'Not Added' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <a href="{{ url('edit_download_list/' . $item->id) }}"
                                                            class="btn btn-primary btn-sm me-2">Edit</a>

                                                    </div>
                                                </td>
                                                <td>
                                                    @component('Layouts.DeleteLayout.DeleteConfirmationModal', [
                                                        'modalId' => 'deleteConfirmationModal_' . $item->id,
                                                        'deleteUrl' => url('delete_download_list', $item->id),
                                                    ])
                                                    @endcomponent
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-toggle="modal"
                                                        data-target="#deleteConfirmationModal_{{ $item->id }}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
