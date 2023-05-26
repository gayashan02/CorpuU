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
        <div class="nav-absolute nav-sticky nav-light" data-nav-sticky-classes="rgba-black-strong"
            data-nav-sticky-logo="main_theme/assets/img/basic/logo-white.png">
            <nav class="mainnav navbar navbar-default justify-content-between">
                <div class="container relative"><a class="offcanvas dl-trigger paper-nav-toggle" type="button"
                        data-toggle="offcanvas" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"><i></i></a> <a class="navbar-brand" href="/"><img
                            class="d-inline-block align-top" alt="" src="main_theme/assets/img/basic/logo.png" style="height: 60px;"> </a>
                    <div class="paper_menu">
                        <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                            <ul class="dl-menu align-items-center">
                                @if (Route::has('login'))       
                                @auth

                                     <li> <a href="/home" >Home</a></li>
                                    @if (Auth::user()->role == 0)
                                        <li> <a href="/job_add" >Dashboard</a></li>
                                        <li> <a href="/jobs_view" >View Jobs</a></li>
                                        <li> <a href="/change_user_details" >Edit Profile</a></li>
                                    @else 
                                        <li> <a href="/jobs_view" >View Jobs</a></li>
                                        <li> <a href="/change_user_details" >Edit Profile</a></li>
                                    @endif
                                        <li> <a button type="button" class="btn btn-danger nav-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</button></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form></a></li> 
                                @else
                                        <li><a href="{{ route('login') }}" class="btn btn-primary nav-btn" >Login</a></li>
                                        @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}" class="btn btn-primary nav-btn" >Register</a></li>  
                                        @endif
                                        
                                @endauth       
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <main class="overflow-hide">
            <section class="hero-header text-white" style="background: url('main_theme/assets/img/demo/team.jpg')">
                <div class="container">
                    <div class="table">
                        <div class="header-text">
                            <div class="row">
                                <div class="col-md-12 text-center p-t-40">
                                    <h1 class="cd-headline letters type big-heading rotate-2"> <span>Get the change for your
                                    </span> <span class="cd-words-wrapper waiting"><b
                                                class="is-visible strawberry">Existence</b> <b
                                                class="sunfollower">Talent</b> <b class="mint">Expertise</b><b
                                                class="gradient">Potential</span></h1>
                                    <div class="p-t-b-100"><a href="/jobs_view" class="btn-primary btn-big r-30"><i
                                                class="icon icon-arrow-right"></i>View Jobs!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
          
        </main>
       
    </div>
    <script src="main_theme/assets/js/app.js"></script>
</body>
</html>