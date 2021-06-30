<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Halaman Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body background="img/bg.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5 bg-body rounded">
                    <div class="card-body p-0 bg-transparent text-dark">
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>APLIKASI PENGGAJIAN CV SIMPATI</b></h1>
                                        <h3 class="h4 text-gray-900 mb-4">Login</h3>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="fa fa-book ml-2"> EMAIL </label>
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Masukan Email .." name="email">
                                            @error('email')
                                            <span class="text-danger ml-2"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="fa fa-lock ml-2"> PASSWORD </label>
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                            @error('password')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <hr>
                                        <button class="btn btn-success btn-user btn-block"> LOGIN </button>
                                        <a href="/register" class="btn btn-info btn-user btn-block"> Belum Punya Akun ?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>