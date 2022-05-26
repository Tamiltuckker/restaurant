<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('frontend.dashboard') }}" class="nav-item nav-link active">Home</a>
                        <a href=" {{ route('about.us') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('service') }}" class="nav-item nav-link">Service</a>
                        <a href="{{ route('menu') }}" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('booking') }}" class="dropdown-item">Booking</a>
                                <a href=" {{ route('ourteam') }}" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }} </a>
                            <div class="dropdown-menu m-0">

                                <a href="{{ route('myprofile') }}" class="dropdown-item">My profile</a>
                                <a href="{{ route('changepassword.form') }}" class="dropdown-item">change
                                    password</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign
                                    Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @auth
                                @if (session('impersonated_by'))
                                <a href="{{ route('webadmin.users.leaveimpersonate') }}" class="dropdown-item">Leave Impersonation</a>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('booking') }}" class="btn btn-primary py-2 px-4">Book A
                        Table</a>&nbsp;&nbsp;&nbsp;

                    <!-- <button type="button" class="btn btn-primary py-2 px-4" data-toggle="dropdown"> -->
                    <a class="btn btn-primary py-2 px-4" data-toggle="dropdown" href="{{ route('cart.list') }}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                    <!-- </button> -->
                </div>
            </nav>