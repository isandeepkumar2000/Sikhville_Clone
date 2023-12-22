<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Games Categories</title>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4>Edit and Update Music Categories

                                    </h4>
                                    <a href="{{ url('add_music_categories_list') }}"
                                        class="btn btn-primary float-end">Add
                                        Music Categories</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Music Categories</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($musicCategories as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            <a href="{{ url('edit_music_categories_list/' . $item->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ url('delete_music_categories_list', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-outline-danger">Delete</button>
                                                            </form>
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
