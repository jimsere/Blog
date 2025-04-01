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
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
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
<section class="info_section py-5 text-white" style="background-color: #212529;">
  <div class="container">
    <div class="row justify-content-between">

      <!-- Contact Navigation -->
      <div class="col-md-4 mb-4">
        <h5 class="mb-3">Επικοινωνία</h5>
        <ul class="list-unstyled">
          <li class="mb-2">
            <i class="fa fa-phone me-2"></i> Call: <a href="tel:+302392021918" class="text-decoration-none text-light">+30 23920 2191800</a>
          </li>
          <li class="mb-2">
            <i class="fa fa-envelope me-2"></i> Email: <a href="mailto:info@blog.com" class="text-decoration-none text-light">info@blog.com</a>
          </li>
          <li>
            <i class="fa fa-map-marker me-2"></i> Location: World
          </li>
        </ul>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2 mb-4">
        <h5 class="mb-3">Γρήγοροι Σύνδεσμοι</h5>
        <ul class="list-unstyled">
          <li><a href="/" class="text-decoration-none text-light">🏠 Home</a></li>
          <li><a href="/About" class="text-decoration-none text-light">ℹ️ About</a></li>
          <li><a href="/posts" class="text-decoration-none text-light">📝 Blog</a></li>
          <li><a href="/contact" class="text-decoration-none text-light">📬 Contact</a></li>
        </ul>
      </div>

        <!-- Calendar Section -->
        <div class="col-md-3 mb-4">
          <h5 class="mb-3">Ημερολόγιο</h5>
          <div id="calendar" class="bg-dark rounded p-3 text-white small" style="font-family: monospace;">
            <div id="calendar-header" class="text-center fw-bold mb-2"></div>
            <div id="calendar-days" class="d-grid calendar-grid text-center"></div>
          </div>
        </div>



      <!-- Newsletter -->
      <div class="col-md-3 mb-4">
        <h5 class="mb-3">Εγγραφή στο Newsletter</h5>
        <form action="#">
          <div class="mb-2">
            <input type="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <button type="submit" class="btn btn-outline-light w-100">Subscribe</button>
        </form>

        <!-- Social Icons -->
        <div class="social_box mt-3 d-flex justify-content-center gap-3">
          <a href="#" class="text-light fs-4"><i class="fa fa-facebook"></i></a>
          <a href="#" class="text-light fs-4"><i class="fa fa-twitter"></i></a>
          <a href="#" class="text-light fs-4"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="text-light fs-4"><i class="fa fa-instagram"></i></a>
        </div>
        
      </div>
    </div>
  </div>
</section>

<!-- Footer Bottom -->
<footer class="footer_section py-3 text-center text-white" style="background-color: #111;">
  <div class="container">
    <p class="mb-0">
      &copy; <span id="displayYear">{{ date('Y') }}</span> All Rights Reserved by
      <a href="https://html.design/" class="text-decoration-none text-light fw-bold">Free Html Templates</a>
    </p>
  </div>
</footer>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    const daysContainer = document.getElementById("calendar-days");
    const header = document.getElementById("calendar-header");

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth();
    const today = now.getDate();

    const monthNames = [
      "Ιανουάριος", "Φεβρουάριος", "Μάρτιος", "Απρίλιος", "Μάιος", "Ιούνιος",
      "Ιούλιος", "Αύγουστος", "Σεπτέμβριος", "Οκτώβριος", "Νοέμβριος", "Δεκέμβριος"
    ];

    header.textContent = `${monthNames[month]} ${year}`;

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const dayNames = ['Κ', 'Δ', 'Τ', 'Τ', 'Π', 'Π', 'Σ'];
    dayNames.forEach(d => {
      const el = document.createElement('div');
      el.textContent = d;
      el.className = "day-label";
      daysContainer.appendChild(el);
    });

    for (let i = 0; i < firstDay; i++) {
      daysContainer.appendChild(document.createElement('div'));
    }

    for (let day = 1; day <= daysInMonth; day++) {
      const el = document.createElement('div');
      el.textContent = day;
      if (day === today) {
        el.className = "today";
      }
      daysContainer.appendChild(el);
    }
  });
</script>

  