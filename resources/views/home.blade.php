@extends('layouts.app')

@section('content')

    <!-- slider section -->
    <section class="slider_section long_section">
      <div id="customCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box ">
                    <h1>
                      Blogαρεις;<br>
                      Εδω ειναι το μερος σου.
                    </h1>
                    <p>
                      Δημιούργησε το δικό σου blog, μοιράσου ιδέες και συνδέσου με ανθρώπους που σε καταλαβαίνουν.
                    </p>
                    <div class="btn-box">
                      <a href="{{route('newpost')}}" class="btn1">
                        Νέο Blog!
                      </a>
                      <a href="{{route('about')}}" class="btn2">
                        Σχετικά με εμάς
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="images/img1.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Το Blog Σου,<br>
                      Η Ιστορια Σου. 
                    </h1>
                    <p>
                      Κάθε ιστορία αξίζει να ακουστεί. Δημιούργησε το δικό σου blog και μοιράσου σκέψεις, εμπειρίες και όνειρα με τον κόσμο.
                    </p>
                    <div class="btn-box">
                      <a href="{{route('newpost')}}" class="btn1">
                        Νέο Blog!
                      </a>
                      <a href="{{route('about')}}" class="btn2" class="btn2">
                        Σχετικά με εμάς
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="images/img2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-5">
                  <div class="detail-box">
                    <h1>
                      Ιδεες<br>
                      που γινονται λεξεις.
                    </h1>
                    <p>
                      Δώσε μορφή στις σκέψεις σου. Ξεκίνα το blog σου και δες τις ιδέες σου να ζωντανεύουν μέσα από λέξεις.
                    </p>
                    <div class="btn-box">
                      <a href="{{route('newpost')}}" class="btn1">
                        Νέο Blog!
                      </a>
                      <a href="{{route('about')}}" class="btn2" class="btn2">
                        Σχετικά με εμάς
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-7">
                  <div class="img-box">
                    <img src="images/img3.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel" data-slide-to="1"></li>
          <li data-target="#customCarousel" data-slide-to="2"></li>
        </ol>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- about section -->

  <section class="about_section layout_padding long_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/img4.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Σχετικα με εμας
              </h2>
            </div>
            <p>
              Είμαστε μια πλατφόρμα για όλους όσους αγαπούν να γράφουν, να μοιράζονται και να εμπνέουν. Εδώ, κάθε φωνή έχει χώρο. Δημιούργησε το δικό σου blog, ανέβασε τις σκέψεις σου και συνδέσου με ανθρώπους που σε διαβάζουν πραγματικά.Το blog σου, η ιστορία σου. Εμείς σου δίνουμε το βήμα — εσύ δίνεις το νόημα.
            </p>
            <a href="{{route('about')}}" class="btn2" class="btn2">
              Περισσότερα
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- blog section -->

  <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>Latest Blog</h2>
      </div>
      <div class="row">
        @forelse ($latestPosts as $post)
          <div class="col-md-6 col-lg-4 mx-auto mb-4">
            <div class="box">
              <div class="img-box">
                @if($post->image)
                  <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="Εικόνα άρθρου" class="img-fluid">
                @else
                  <img src="{{ asset('images/b1.jpg') }}" alt="Προεπιλεγμένη εικόνα" class="img-fluid">
                @endif
              </div>
              
              <div class="detail-box">
                <h5>{{ $post->title }}</h5>
                <p style="
                  display: -webkit-box;
                  -webkit-line-clamp: 3;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  text-overflow: ellipsis;
                ">
                {!! strip_tags(Str::limit($post->body, 250)) !!}
                </p>
                <a href="{{ route('post', $post) }}">
                  Διαβάστε περισσότερα
                </a>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">Δεν υπάρχουν αναρτήσεις προς το παρόν.</p>
        @endforelse
      </div>
    </div>
  </section>


  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Κριτικες
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/human1.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Πέτρος
                      </h6>
                    </div>
                    <p>
                      ⭐️⭐️⭐️⭐️⭐️</br>
                      Η καλύτερη πλατφόρμα για να εκφραστώ!
                      Από την πρώτη στιγμή που δημιούργησα το blog μου, η εμπειρία ήταν απίστευτα απλή και φιλική. Το περιβάλλον είναι καθαρό, εύχρηστο και μου επιτρέπει να εστιάζω σε αυτό που αγαπώ: το γράψιμο. Μέσα σε λίγες μέρες είχα ήδη αναγνώστες που σχολίαζαν και μοιράζονταν τις ιστορίες μου. Νιώθω ότι ανήκω σε μια κοινότητα που με ακούει. Το προτείνω ανεπιφύλακτα σε κάθε νέο blogger!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/human2.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Κατερίνα
                      </h6>
                    </div>
                    <p>
                      ⭐️⭐️⭐️⭐️⭐️</br>
                      Επιτέλους, μια πλατφόρμα που κάνει τη συγγραφή απόλαυση!                  
                      Πάντα ήθελα να ξεκινήσω το δικό μου blog, αλλά οι περισσότερες πλατφόρμες με μπέρδευαν. Εδώ βρήκα ακριβώς αυτό που χρειαζόμουν: απλότητα, ταχύτητα και στήριξη. Μέσα σε λίγα λεπτά είχα δημοσιεύσει το πρώτο μου άρθρο και το feedback που πήρα ήταν ενθαρρυντικό. Είναι το μέρος που οι ιδέες μου παίρνουν ζωή. Συνεχίστε έτσι!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/human3.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                      <h6>
                        Αναστάσης
                      </h6>
                    </div>
                    <p>
                      ⭐️⭐️⭐️⭐️⭐️</br>
                      Αισθάνομαι σαν το blog μου να απέκτησε… σπίτι!
                      Δεν είχα εμπειρία με blogging, αλλά εδώ όλα ήταν τόσο εύκολα που ένιωσα αμέσως άνετα. Η κοινότητα είναι φιλική, το design κομψό και η πλατφόρμα λειτουργεί τέλεια σε κινητό και υπολογιστή. Το καλύτερο; Νιώθω ότι το blog μου αντικατοπτρίζει πραγματικά εμένα. Ένα μεγάλο μπράβο στην ομάδα!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->



  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>


@endsection