<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corpu</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('dashboard_theme/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_theme/assets/vendors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_theme/assets/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_theme/assets/vendors/summernote/summernote-lite.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_theme/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href=" {{asset('dashboard_theme/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_theme/assets/vendors/toastify/toastify.css')}}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('dashboard_theme/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href=" {{asset('dashboard_theme/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href=" {{asset('dashboard_theme/assets/css/app.css')}}">
    <link rel="shortcut icon" href=" {{asset('dashboard_theme/assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href=""><img src="/" alt="" srcset="">Corpu</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <main class="">
                    <div class="sidebar-menu">
                        <ul class="menu">
                           <li class="sidebar-item">
                                <div class="card-body">
                                    <div class="badges">

                                        <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                        <hr>
                                        <span>Role:</span>
                                        @if (Auth::user()->role == 0)
                                        <span class="badge bg-success">Admin</span>
                                        @else 
                                        <span class="badge bg-success">User</span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li
                                class="sidebar-item">
                                <a href="/home" class='sidebar-link'>
                                <i class="bi bi-house"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            @if (Auth::user()->role == 0)
                            <li
                                class="sidebar-item @if(\Request::is('job_add'))) active @endif  @if(\Request::is('/'))) active @endif">
                                <a href="/job_add" class='sidebar-link'>
                                    <i class="bi bi-card-checklist"></i>
                                    <span>Add Jobs</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/jobs_view" class='sidebar-link'>
                                    <i class="bi bi-record-btn"></i>
                                    <span>View Jobs</span>
                                </a>
                            </li>
                            <li class="sidebar-item  @if(\Request::is('apply_job_view'))) active @endif ">
                                <a href="/apply_job_view" class='sidebar-link'>
                                <i class="bi bi-ui-radios"></i>
                                    <span>View Applications</span>
                                </a>
                            </li>
                            @endif
                            <li class="sidebar-item  @if(\Request::is('change_user_details'))) active @endif ">
                                <a href="/change_user_details" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                @if (Route::has('login'))
                                @auth
                                    <a button type="button" class="sidebar-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                        <span>Log Out</span></button></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></a>
                                @else
                                @endauth
                                @endif
                             </li>
                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Edit Profile</h3>
                        </div>
                    </div>
                </div>
            </div>
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <strong>{{ \Session::get('success') }}</strong>
            </div>
            @endif
            @if (\Session::has('delete'))
            <div class="alert alert-danger">
                <strong>{{ \Session::get('delete') }}</strong>
            </div>
            @endif
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Enter your Details</h4>
                </div>
                <div class="card-content">

                   <div class="card-body">
                    <form method="POST" action="/changename" class="md-float-material">
                        @csrf


                        <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                            name="name" value="{{Auth::user()->name}}" placeholder="Please enter your new name">
                            <div class="form-control-icon">
                            <i class="bi bi-person-circle"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Change User Name</button>
                    </form>
                    </div>

                    <div class="card-body">
                    <form method="POST" action="/changePassword" class="md-float-material">
                        @csrf


                        <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-lg @error('current_password') is-invalid @enderror"
                            name="current_password" value="{{ old('current_password') }}" placeholder="Please enter your current password">
                            <div class="form-control-icon">
                            <i class="bi bi-card-text"></i>
                            </div>



                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('new_password') is-invalid @enderror"
                            name="new_password" placeholder="Please enter a new password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>


                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-lg" name="new_confirm_password" placeholder="Please verify your new password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Change password</button>
                    </form>
                    </div>
                </div>
            </div>

        
        </div>

        </main>
        <footer>

    </div>
    </div>
    <script src="{{asset('dashboard_theme/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{asset('dashboard_theme/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/js/pages/form-editor.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/vendors/summernote/summernote-lite.min.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('dashboard_theme/assets/js/main.js')}}"></script>
</body>

</html>