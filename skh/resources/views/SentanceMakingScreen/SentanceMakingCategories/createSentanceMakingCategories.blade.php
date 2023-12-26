<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sentance_Making_Categories_Create</title>
    <link href="{{ env('APP_FILE_URL') }}storage/admin/assets/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ env('APP_FILE_URL') }}storage/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SikhVille</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Games</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Games Components:</h6>
                        <a class="collapse-item" href="{{ route('gamesfolder') }}">Games</a>
                        <a class="collapse-item" href="{{ route('gamesCategories') }}">Games Categories</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                    aria-controls="collapseThree">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Video</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Video Components:</h6>
                        <a class="collapse-item" href="{{ route('videofolder') }}">Video</a>
                        <a class="collapse-item" href="{{ route('videoCategories') }}">Video Categories</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                    aria-controls="collapseFour">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Music</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Music Components:</h6>
                        <a class="collapse-item" href="{{ route('musicfolder') }}">Music</a>
                        <a class="collapse-item" href="{{ route('musicCategories') }}">Music Categories</a>
                        <a class="collapse-item" href="{{ route('musicSong') }}">Music Song</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Download</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Download Components:</h6>
                        <a class="collapse-item" href="{{ route('downloadfolder') }}">Download</a>
                        <a class="collapse-item" href="{{ route('downloadCategories') }}">Download Categories</a>
                    </div>
                </div>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link collapsed text-white " data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Learning</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-dark ">Learning Components</h6>

                        <a class="collapse-item text-dark" data-toggle="collapse" href="#musicComponents"
                            style="background-color: #f7d794; margin-bottom: 5px; font-weight: 700;">
                            Punjabi Reading Screen
                        </a>
                        <div class="collapse" id="musicComponents">
                            <a class="collapse-item  text-dark" href="{{ route('punjabireadingFolder') }}">Punjabi
                            </a>
                            <a class="collapse-item  text-dark"
                                href="{{ route('punjabireadingCategories') }}">Punjabi
                                Categories</a>
                        </div>

                        <a class="collapse-item text-dark " data-toggle="collapse" href="#folderOne"
                            style="background-color: #f3a683; margin-bottom: 5px; font-weight: 700;">
                            Sentence Making Screen
                        </a>
                        <div class="collapse" id="folderOne">
                            <a class="collapse-item  text-dark"
                                href="{{ route('sentancemakingFolder') }}">Sentence</a>
                            <a class="collapse-item  text-dark"
                                href="{{ route('sentancemakingCategories') }}">Sentence Categories</a>
                        </div>

                        <a class="collapse-item text-dark " data-toggle="collapse" href="#folderTwo"
                            style="background-color: #778beb; margin-bottom: 5px; font-weight: 700;">
                            Shabadkosh
                        </a>
                        <div class="collapse" id="folderTwo">
                            <a class="collapse-item  text-dark" href="{{ route('shabdkoshFolder') }}">Shabadkosh</a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none ">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav style="background-color: #4e73df"
                    class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" style="background-color: red">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                {{-- write you code here --}}

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
                                                    <h4>Add Santance Making Categories Here</h4>
                                                </div>
                                                <div class="card-body">

                                                    <form
                                                        action="{{ url('add_post_sentance_making_categories_list') }}"
                                                        method="POST">
                                                        @csrf

                                                        <div class="form-group mb-3">
                                                            <label for="">Sentance Making Categories
                                                                List</label>
                                                            <input type="text" name="name" class="form-control"
                                                                required>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <button type="submit" class="btn btn-primary">Save
                                                                Sentance Making
                                                                Categories</button>
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

            </div>
        </div>
    </div>


    <script src="{{ env('APP_URL') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ env('APP_URL') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ env('APP_URL') }}vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ env('APP_URL') }}js/sb-admin-2.min.js"></script>
    <script src="{{ env('APP_URL') }}vendor/chart.js/Chart.min.js"></script>
    <script src="{{ env('APP_URL') }}js/demo/chart-area-demo.js"></script>
    <script src="{{ env('APP_URL') }}js/demo/chart-pie-demo.js"></script>

</body>

</html>
