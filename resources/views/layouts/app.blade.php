
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jandel's Porfolio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link id="favicon" href="{{asset("assets/img/edit_picture.jpg")}}" rel="icon">
    {{-- <link href={{asset("assets/img/edit_picture.jpg")}} rel="icon"> --}}

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href={{asset("assets/lib/owlcarousel/assets/owl.carousel.min.css")}} rel="stylesheet">
    <link href={{asset("assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css")}} rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href={{asset("assets/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href={{asset("assets/css/styleone.css")}} rel="stylesheet">
   
    
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Ja~Lo</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if((Auth::user()->role_name == 'Spectator'))
                            <img class="rounded-circle" src={{asset("assets/img/default_profile.png")}} alt="" style="width: 40px; height: 40px;">
            
                        @elseif((Auth::user()->role_name == 'Admin'))
                            <img class="rounded-circle" src={{asset("assets/img/edit_picture.jpg")}} alt="" style="width: 40px; height: 40px;">
                        @endif
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <span>{{ (Auth::user()->role_name) }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    @if(Auth::user()->role_name == 'Admin')
                    <a href="{{route('dashboard')}}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('blog')}}" class="nav-item nav-link"><i class="bi bi-file-text me-2"></i>Blog</a>
                    <a href="{{route('certificate')}}" class="nav-item nav-link"><i class="bi bi-card-text me-2"></i>Certificates</a>
                    <a href="{{route('portfolio')}}" class="nav-item nav-link"><i class="bi bi-folder-fill me-2"></i>Portfolio</a>
                    <a href="{{route('testimonial')}}" class="nav-item nav-link"><i class="bi bi-person-lines-fill me-2"></i>Testimonials</a>
                    <a href="{{route('users')}}" class="nav-item nav-link"><i class="bi bi-people-fill me-2"></i>Users</a>
                    @elseif(Auth::user()->role_name == 'Spectator')\
                    <a href="{{route('testimonial')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Testimonials</a>
                    @endif
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if((Auth::user()->role_name == 'Spectator'))
                            <img class="rounded-circle" src={{asset("assets/img/default_profile.png")}} alt="" style="width: 40px; height: 40px;">
            
                        @elseif((Auth::user()->role_name == 'Admin'))
                            <img class="rounded-circle" src={{asset("assets/img/edit_picture.jpg")}} alt="" style="width: 40px; height: 40px;">
                        @endif
                            <span class="d-none d-lg-inline-flex">{{ strtoupper(Auth::user()->name) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#profileModal">Profile</a>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <main class="py-4">
                @yield('content')
            </main>

            


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start ">
                            &copy; <a href="#">Jandel's Profile</a>, All Right Reserved. 
                        </div>
                        {{-- <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: #191C24; color: green;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-outline-success" type="button" data-dismiss="modal">Cancel</button>
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-success" type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>
</div>


  <!-- Profile Modal-->
  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color: #191C24; color: green;">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
             <center>
             <div>
                @if(Auth::user()->role_name == 'Admin')
                <img class="rounded-circle" src="assets/img/edit_picture.jpg" alt="" style="width: 100px; height: 100px;" alt="Profile Image">
                @elseif(Auth::user()->role_name == 'Spectator')
                <img class="rounded-circle" src="assets/img/default_profile.png" alt="" style="width: 100px; height: 100px;" alt="Profile Image">
                @endif
            </div>
             <br>
             <div><p>{{Auth::user()->name}} </p></div>
             <div><p>{{Auth::user()->email}} </p></div>
             <div><p>{{Auth::user()->role_name}} </p></div>
             {{-- <a class="btn btn-sm btn-secondary" href="{{ route('editprofile',Auth::user()->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit Profile?</a>
             &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="{{ route('changepassword',Auth::user()->id)}}"><i class="fa-solid fa-pen-to-square"></i> Change Password?</a> --}}
             <a class="btn btn-sm btn-secondary" href="{{ route('editprofile',Auth::user()->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit Profile?</a>
             &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href=""><i class="fa-solid fa-pen-to-square"></i> Change Password?</a>
            </center>
         </div>
          <div class="modal-footer">
              <button class="btn btn-outline-success" type="button" data-dismiss="modal">Back</button>
             
          </div>
      </div>
  </div>
</div>
 {{-- end of profile modal --}}



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{asset("assets/lib/chart/chart.min.js")}}></script>
    <script src={{asset("assets/lib/easing/easing.min.js")}}></script>
    <script src={{asset("assets/lib/waypoints/waypoints.min.js")}}></script>
    <script src={{asset("assets/lib/owlcarousel/owl.carousel.min.js")}}></script>
    <script src={{asset("assets/lib/tempusdominus/js/moment.min.js")}}></script>
    <script src={{asset("assets/lib/tempusdominus/js/moment-timezone.min.js")}}></script>
    <script src={{asset("assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js")}}></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src={{asset("assets/js/maindashboard.js")}}></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
 
        // Function to change the favicon
        function changeFavicon(iconPath) {
            var favicon = document.getElementById('favicon');
            favicon.href = iconPath;
        }

        // Example: Change favicon on page load
        window.addEventListener('load', function() {
            var newFavicon = '{{asset("assets/img/new_icon.jpg")}}'; // Change this to the path of your new favicon
            changeFavicon(newFavicon);
        });


function backtoportfolio(){
    window.location.href = "portfolio";
  }

function addnewportfolio(){
    window.location.href = "addnewportfolio";
  }

function addnewtestimonial(){
    window.location.href = "addnewtestimonial";
  }

  function backtotestimonail(){
    window.location.href = "testimonial";
  }

    document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            // Prevent default behavior of anchor tags
            // event.preventDefault();

            // Remove active class from all links
            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Add active class to the clicked link
            this.classList.add('active');

            // Change background color
            document.body.style.backgroundColor = getComputedStyle(this).getPropertyValue('background-color');
        });

        // Check if the href matches the current URL
        if (link.getAttribute('href') === window.location.href) {
            link.classList.add('active');
            document.body.style.backgroundColor = getComputedStyle(link).getPropertyValue('background-color');
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
        // Function to show SweetAlert for unauthorized access
        function showUnauthorizedAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Unauthorized Access',
                text: message,
                confirmButtonColor: '#d33',
            });
        }

        // Check for flashed unauthorized message
        @if(session('unauthorized'))
            showUnauthorizedAlert('{{ session('unauthorized') }}');
        @endif
    });

    </script>
 

</body>

</html>