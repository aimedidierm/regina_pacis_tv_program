<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Regina pacis TV program
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="/assets/css/dashboard.css" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('/assets/img/signup.jpg'); background-size: cover;">
                                <span class="mask  bg-gradient-info  opacity-6"></span>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    <p class="mb-0">Enter the following details to register</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="/register">
                                        @csrf
                                        @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>
                                        @endif
                                        <div class="input-group input-group-outline mb-3">
                                            <input placeholder="Name" type="text" name="names" class="form-control"
                                                required>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input placeholder="Telephone" type="text" name="phone"
                                                class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input placeholder="Address" type="text" name="address"
                                                class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input placeholder="Email" type="email" name="email" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input placeholder="Password" type="password" name="password"
                                                class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input placeholder="Confirm password" type="password" name="confirmPassword"
                                                class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="/" class="text-info text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
</body>

</html>