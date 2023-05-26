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
                            <h3>Add Jobs</h3>
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
                    <h4 class="card-title">Add Job Details</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="{{ url('/submit_job') }}" class="form form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Job Title</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" class="form-control" name="title" placeholder="eg: Software Engineer">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Faculty</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" class="form-control" name="faculty" placeholder="eg: Technology Faculty">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Job Description</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea required type="text" class="form-control" rows="4" name="description"
                                            placeholder="eg: Description"> </textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Location</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" class="form-control" name="location"
                                            placeholder="eg: Melbourne">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Salary</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input required type="text" class="form-control" name="salary"
                                            placeholder="eg: $2000">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Application Deadline</label>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <input required type="date" class="form-control" name="deadline"
                                            placeholder="eg: 30/05/2023">
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Job Details</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Dalary</th>
                                    <th>Deadline</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{$item->title }}</td>
                                    <td class="name">{{$item->location }}</td>
                                    <td class="name">{{$item->salary }}</td>
                                    <td class="name">{{$item->deadline }}</td>
                                    <td class="text-center">
                                        <a href="{{url('delete_job',[$item->id])}}"
                                            onclick="return confirm('Are you sure?')"><span class="badge bg-danger"><i
                                                    class="bi bi-trash"></i></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
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