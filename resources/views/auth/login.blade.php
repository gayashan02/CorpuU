<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from xvelopers.com/demos/html/paper-1.8.2/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 May 2022 08:30:29 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{asset('main_theme/assets/img/basic/favicon.ico')}}" type="image/x-icon" />
    <title>Private Club</title>
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

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-lg-4 mx-md-auto">
                            <div class="text-center">
                                <img src="{{asset('main_theme/assets/img/dummy/u5.png')}}" alt="" />
                                <h2>Welcome Back</h2>
                            </div>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group has-icon">
                                    <i class="icon-envelope-o"></i>
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="Email Address" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                <div role="alert" class="alert alert-danger"><strong>Alert!</strong> {{ $message }}
                                </div>
                                @enderror
                                <div class="form-group has-icon">
                                    <i class="icon-user-secret"></i>
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                <div role="alert" class="alert alert-danger"><strong>Alert!</strong> {{ $message }}
                                </div>
                                @enderror
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In" />
                            </form>
                            <br>
                            <a href="{{ route('register') }}"> <input type="button"
                                    class="btn btn-primary btn-lg btn-block" value="Sign Up" /></a>
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