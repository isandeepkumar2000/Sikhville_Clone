<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Website_Content</title>
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
                        <div class="col-md-10">
                            @if ($errors->any() || session('error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="d-flex justify-content-between align-items-center">
                                        Edit & Update Website Content
                                        <a href="{{ url('website_content_list') }}" class="btn btn-danger">BACK</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update_website_content_list/' . $websiteContent->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="type" class="form-label">Website Content Type</label>
                                                <select class="form-control select2" name="type" required
                                                    id="type">
                                                    <option value="" disabled>Choose the Type</option>
                                                    <option value="game"
                                                        @if ($websiteContent->type === 'game') selected @endif>Games</option>
                                                    <option value="download"
                                                        @if ($websiteContent->type === 'download') selected @endif>Download
                                                    </option>
                                                    <option value="music"
                                                        @if ($websiteContent->type === 'music') selected @endif>Music</option>
                                                    <option value="video"
                                                        @if ($websiteContent->type === 'video') selected @endif>Video</option>
                                                    <option value="punjabi_reading"
                                                        @if ($websiteContent->type === 'punjabi_reading') selected @endif>Punjabi
                                                        Reading</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" id="title" name="title"
                                                    value="{{ $websiteContent->title }}" class="form-control" required
                                                    placeholder="Enter the title">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="textAreaExample1" class="form-label">Content Details</label>
                                            <textarea class="form-control" required id="textAreaExample1" rows="4" name="content"
                                                placeholder="Please enter the Content Details">{{ $websiteContent->content }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Update Website
                                                Content</button>
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
