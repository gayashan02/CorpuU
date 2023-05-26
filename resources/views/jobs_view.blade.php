<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="main_theme/assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Corpu</title>
    <link rel="stylesheet" href="main_theme/assets/css/app.css">
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
                            class="d-inline-block align-top" alt="" src="main_theme/assets/img/basic/logo.png"
                            style="height: 60px;"></a>
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
                    <h1>Job List</h1>
                </div>
            </div>
            <section class="topics">
                <div class="container">
                    <div class="row">
                    @foreach ($data as $key => $item)
                        <div class="col-xl-4 col-md-6">
                            <div class="topics-wrapper border-style">
                                <h3><a href="{{url('job_submit',[$item->id])}}"><span class="icon icon-circle-o text-blue"></span>{{$item->title }}</a></h3>
                                <ul class="topics-list">
                                    <li> <p style="font-size:20px;color:black">Location - {{$item->location }}</p> </li>
                                    <li> <p style="font-size:20px;color:black">faculty - {{$item->faculty }}</p></li>
                                    <li> <p style="color:red;font-weight: 500;font-size: 18px;"> Salary - {{$item->salary}}</p></li>
                                    <li>  <p style="color:red"> Application Deadline - {{$item->deadline }}</p></li>                                   
                                </ul>
                                <ul class="topics-meta">
                                <a href="{{url('job_submit',[$item->id])}}" class="btn btn-primary grey-blue">Read More</a>
                                </ul>
                            </div>
                        </div>   
                    @endforeach      
                    </div>
                </div>
                <div class="row col-12 mb-5 d-flex justify-content-center">
                    {{ $data->links() }}
                </div>
            </section>
        </div>
    </div>
    </div>
    <script src="main_theme/assets/js/app.js"></script>
</body>

</html>