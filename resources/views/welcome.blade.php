<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Smart University </title>



  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}" />
  <!-- progress barstle -->
  <link rel="stylesheet" href="css/css-circular-prog-bar.css">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" />




  <link rel="stylesheet" href="css/css-circular-prog-bar.css">


</head>

<body>
  <div class="top_container">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="../images/logo.png" alt="">
            <span>
              Smart University
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html"> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#about"> About </a>
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href=""> Paperwork</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href=""> PFE </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="">Events</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="">Admin</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
        </nav>
      </div>
    </header>
    <section class="hero_section ">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h3>
            Welcome to <br>

          </h3>
          <h1>
            Smart University
          </h1>
          <p>
            An easier way to access the University from
            everywhere . </p>
          <div class="hero_btn-continer">
            <a href="#contact" class="call_to-btn btn_white-border">
              <span>
                Contact
              </span>
              <img src="{{asset('assets/images/right-arrow.png')}}" alt="">
            </a>
          </div>
        </div>
        <div class="hero_img-container">
          <div>
            <img src="{{asset('assets/images/students.png')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end header section -->

  <!-- about section -->
  <section id="about" class="about_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
        About SMART UNIVERSITY
      </h2>
      <p class="text-center">
        An online platform for university students and teachers where they can exchange informations,documents and files
        from everywhere.
      </p>
      <div class="about_img-box ">
        <img src="{{asset('assets/images/docs.png')}}" alt="" class="img-fluid w-100">
      </div>
 
    </div>
  </section>


  <!-- about section -->

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container" id="contact">

      <h2 class="main-heading">
        Contact Now

      </h2>
      <p class="text-center">


      </p>
      <div class="">
        <div class="contact_section-container">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="contact-form">
                <form action="">
                  <div>
                    <input type="text" placeholder="Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email">
                  </div>
                  <div>
                    <input type="text" placeholder="Message" class="input_message">
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>


  <!-- end contact section -->


  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2022 All Rights Reserved By
      MSW
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <!-- end google map js -->
</body>

</html>