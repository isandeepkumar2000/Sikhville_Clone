<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ env('APP_URL') }}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ env('APP_URL') }}css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center min-vh-100 gradient-bg">
                <div class="col-lg-6">
                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center mb-4">
                                            <!-- Add your image or logo here -->
                                            <img src="https://64.media.tumblr.com/476eaa9d46fed40f2879c7eccab6f081/1d1221c8d128bce3-0f/s2048x3072_c0,0,100000,99913/7b3cc788ecd8e8f3198fcb22460f448788702f5e.jpg"
                                                alt="Logo" class="img-fluid" style="max-height: 200px;">
                                        </div>
                                        <form name="my-form" action="{{ route('SignUp') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        name="email" placeholder="Enter Email Address...">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-lock"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control form-control-user"
                                                        name="password" id="exampleInputPassword"
                                                        placeholder="Password">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                                            </button>

                                            @if ($errors->any())
                                                <div class="alert alert-danger mt-3">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ env('APP_URL') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ env('APP_URL') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ env('APP_URL') }}vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ env('APP_URL') }}js/sb-admin-2.min.js"></script>

</body>

</html>
