<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Blog Site</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />


  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="/css/responsive.css" rel="stylesheet" />
  <!-- adding nice font -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section long_section px-0">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="#">
          <span>
            Blog Site
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('posts')}}">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('todo')}}">Contact Us</a>
              </li>

              @guest
              <li class="nav-item last">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @if (Route::has('register'))
              <li class="nav-item last">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
          @else
              <li class="nav-item dropdown last">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->

    @yield('content')


    {{--Φορτωνω Εναν επεξεργαστη κειμενουν χρησιμοποιοντας το api του το οποιο περναω για ολους τους χρηστες με μονο μιας μεσα στο site μου--}}
    @stack('scripts') {{-- Αυτό είναι απαραίτητο για να φορτωθεί ο TinyMCE --}}



    <!-- Info Section -->
<section class="info_section long_section">
  <div class="container">
    <!-- Contact Navigation -->
    <div class="contact_nav">
      <a href="#">
        <i class="fa fa-phone" aria-hidden="true"></i>
        <span>Call : +30 239202191800</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <span>Email : info@blog.com</span>
      </a>
      <a href="#">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span>Location: World</span>
      </a>
    </div>

    <!-- Info Top -->
    <div class="info_top">
      <div class="row">
        <!-- Quick Links -->
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="info_links">
            <h4>QUICK LINKS</h4>
            <div class="info_links_menu">
              <a href="index.html">Home</a>
              <a href="about.html">About</a>
              <a href="furniture.html">Furniture</a>
              <a href="blog.html">Blog</a>
              <a href="contact.html">Contact Us</a>
            </div>
          </div>
        </div>
        
        <!-- Instagram Feeds -->
        <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
          <div class="info_post">
            <h5>INSTAGRAM FEEDS</h5>
            <div class="post_box">
              <div class="img-box"><img src="images/f1.png" alt=""></div>
              <div class="img-box"><img src="images/f2.png" alt=""></div>
              <div class="img-box"><img src="images/f3.png" alt=""></div>
              <div class="img-box"><img src="images/f4.png" alt=""></div>
              <div class="img-box"><img src="images/f5.png" alt=""></div>
              <div class="img-box"><img src="images/f6.png" alt=""></div>
            </div>
          </div>
        </div>
        
        <!-- Newsletter Signup -->
        <div class="col-md-4">
          <div class="info_form">
            <h4>SIGN UP TO OUR NEWSLETTER</h4>
            <form action="">
              <input type="email" placeholder="Enter Your Email" required />
              <button type="submit">Subscribe</button>
            </form>
            
            <!-- Social Media Icons -->
            <div class="social_box">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Info Section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->