<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .navbar {
            background-color: #333;
        }
        .sidebar {
            background-color: #222;
            color: #fff;
            height: 100vh;
        }
        .sidebar-header {
            padding: 20px;
        }
        .sidebar-menu {
            list-style-type: none;
            padding: 0;
        }
        .sidebar-menu li {
            margin-bottom: 10px;
        }
        .sidebar-menu li a {
            color: #00ff00;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg topbar  static-top shadow navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
    
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ strtoupper(Auth::user()->name) }}</span>
                        <img class="img-profile rounded-circle" width="50px" src="assets/img/edit_picture.jpg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                            <i class="fa-solid fa-user-plus text-gray-400"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fa-solid fa-right-from-bracket text-gray-400"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-header">
                    <h5>Menu</h5>
                </div>
                <ul class="sidebar-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </nav>
            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="content">
                    <h2>Main Content</h2>
                    <p>Welcome to the dashboard. This is the main content area.</p>
                </div>
            </main>
        </div>
    </div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: white; color: green;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>
</div>


     <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

 
</body>
</html>
