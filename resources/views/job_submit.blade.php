<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('main_theme/assets/img/basic/favicon.ico')}}" type="image/x-icon">
    <title>Corpu</title>
    <link rel="stylesheet" href="{{asset('main_theme/assets/css/app.css')}}">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #f5f8fa;
            z-index: 9998;
            text-align: center
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%
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
        <div class="page light">
            <nav class="mainnav navbar navbar-default justify-content-between">
                <div class="container relative"><a class="offcanvas dl-trigger paper-nav-toggle" type="button"
                        data-toggle="offcanvas" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"><i></i></a> <a class="navbar-brand" href="/"><img
                            class="d-inline-block align-top" alt=""
                            src="{{asset('main_theme/assets/img/basic/logo.png')}}" style="height: 60px;"></a>
                    <div class="paper_menu">
                        <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                            <ul class="dl-menu align-items-center">
                                @if (Route::has('login'))
                                @auth
                                <li> <a href="/home">Home</a></li>
                                @if (Auth::user()->role == 0)
                                <li> <a href="/job_add">Dashboard</a></li>
                                <li> <a href="/jobs_view">View Jobs</a></li>
                                <li> <a href="/change_user_details">Edit Profile</a></li>
                                @else
                                <li> <a href="/jobs_view">View Jobs</a></li>
                                <li> <a href="/change_user_details">Edit Profile</a></li>
                                @endif

                                <li> <a button type="button" class="btn btn-danger nav-btn" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                        Out</button></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></a>
                                </li>
                                @else
                                <li><a href="{{ route('login') }}" class="btn btn-primary nav-btn">Login</a></li>
                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="btn btn-primary nav-btn">Register</a></li>
                                @endif

                                @endauth
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>


            <div class="search-section gradient text-white">
                <div class="container">
                    <h1>Job Details</h1>
                </div>
            </div>

            <section class="section service-blocks white" style="margin-top: 0px;">
                <div class="container">
                    @if (\Session::has('success'))
                    <div role="alert" class="alert alert-success"><strong>{{ \Session::get('success') }}</strong></div>
                    @endif

                    @if (\Session::has('delete'))
                    <div role="alert" class="alert alert-danger"><strong>{{ \Session::get('delete') }}</strong></div>
                    @endif

                    @if(count($errors) > 0)

                    @foreach($errors->all() as $error)
                    <div role="alert" class="alert alert-danger"><strong>{{ $error }}</strong></div>
                    @endforeach

                    @endif
                    <div class="row">

                        <div class="col-lg-6 mx-lg-auto">
                            <header>
                                <h1 style="font-weight: 700;">{{$data->title }}</h1>
                            </header>
                        </div>
                    </div>
             
              
                    <div class="widget widget-address">
                        <h3>Details</h3>
                        <div style="font-size: 18px"class="p-t-b-20"><strong>description:</strong>
                            <p>{{$data->description }}</p> 
                        <strong>Faculty:</strong>
                            <p>{{$data->faculty }}</p> 
                        <strong>Salary:</strong>
                            <p  style="color:red;"> $ {{$data->salary }}</p> 
                        <strong>Application Deadline:</strong>
                            <p  style="color:red;">{{$data->deadline }}</p>
                        </div>
                    </div>


                    <div class="contact-us-info p-t-b-40">
                        <div class="row">
                            <div class="col-xl-12 col-xl-12 col-lg-12 col-12 ">
                                <div class="contactFormWrapper ">
                                    <H3 style="font-weight: 500;">Submit your CV</H3>
                                    <form action="{{ url('/apply_job',[$data->id]) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div  class="col-12"> <label  style="font-size: 18px" for="name" class="required">Name</label> <input
                                                    required class="form-control form-control-lg" type="text" placeholder="eg: John Smith"
                                                    name="name"></div>
                                            <div class="col-12"> <label  style="font-size: 18px" for="subject" class="required">Email</label>
                                                <input required class="form-control form-control-lg" type="email" placeholder="eg: john@email.com"
                                                    name="email"></div>
                                            <div class="col-12"> <label  style="font-size: 18px" for="company" class="required">Telephone Number
                                                    </label> <input class="form-control form-control-lg" type="text" placeholder="eg: 0412345678"
                                                    name="telephone"></div>
                                            <div class="col-12 "> <label  style="font-size: 18px" for="phone" class="required">Upload CV </label>
                                                <input required class="form-control form-control-lg" type="file"
                                                    name="link" id="phone"></div>
                                        </div>
                                        <div class="  p-t-20 col-sm-12 d-flex justify-content-end">
                                            <button  style="font-size: 18px" type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button  style="font-size: 18px" type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    </div>
    <script src="{{asset('main_theme/assets/js/app.js')}}"></script>
</body>

</html>