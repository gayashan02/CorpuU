<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{asset('main_theme/assets/img/basic/favicon.ico')}}" type="image/x-icon" />
    <title>Corpu</title>
    <link rel="stylesheet" href="{{asset('main_theme/assets/css/app.css')}}" />
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #f5f8fa;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>

<body>
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="l-s-2 blink">LOADING</div>
        </div>
    </div>
    <div id="app" class="paper-loading">
        <main>
            <div id="primary" class=" height-full">

            <section class="no-m blue3 text-white p-t-b-80">
                    <div class="container">
                        <header>
                            <h1 class="s-128 bolder p-t-b-20">Corpu 
                            <!-- <small class="text-blue">bars</small> -->
                           </h1>
                            <p>Find your career path.</p>
                        </header>
                    </div>
           </section>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mx-md-auto">
                            <div class="light p-t-b-40">
                                <div class="p-40">
                                    <h5 class="p-b-20">
                                        <div class="text-center">
                                            <img src="{{asset('admin/assets/img/dummy/u5.png')}}" alt="" />
                                            <h2>Welcome Back</h2>
                                            Create New User Account
                                        </div>
                                    </h5>
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="form-group has-icon">
                                            <i class="icon-user-circle"></i>
                                            <input type="text"  name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                placeholder="Your Name" />
                                        </div>
                                    @error('name')
                                    <div role="alert" class="alert alert-danger"><strong>Alert!</strong> {{ $message }}</div>
                                    @enderror
                                        <div class="form-group has-icon">
                                            <i class="icon-envelope-o"></i>
                                            <input type="text" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                placeholder="Email Address" />
                                        </div>
                                    @error('email')
                                    <div role="alert" class="alert alert-danger"><strong>Alert!</strong> {{ $message }}</div>
                                    @enderror
                                        <div class="form-group has-icon">
                                            <i class="icon-user-secret"></i>
                                            <input type="password"  name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                placeholder="Password" />
                                        </div>
                                    @error('password')
                                    <div role="alert" class="alert alert-danger"><strong>Alert!</strong> {{ $message }}</div>
                                    @enderror
                                        <div class="form-group has-icon">
                                            <i class="icon-repeat"></i>
                                            <input type="password"  name="password_confirmation" class="form-control form-control-lg"
                                                placeholder="Confirm Password" />
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-lg btn-block"
                                            value="Sign Up Now" />
                                    </form>
                                    <br>
                                    <a href="{{ route('login') }}"> <input type="submit" class="btn btn-success btn-lg btn-block" value="Login" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    </main>

    </div>

    <script src="{{asset('main_theme/assets/js/app.js')}}"></script>
</body>

</html>