<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{ asset('/') }}style-file/images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ecommarce</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}style-file/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link href="{{ asset('/') }}style-file/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('/') }}style-file/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('/') }}style-file/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body style="font-size: 17px;">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a style="text-decoration: none;" href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call : +01 123455678990
                </span>
              </a>
              <a style="text-decoration: none;" href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : demo@gmail.com
                </span>
              </a>
            </div>
            <from class="search_form">
              <input type="text" class="form-control" placeholder="Search here...">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </from>
            <div class="user_option_box">
              <a style="text-decoration: none;"  href="" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  My Account
                </span>
               
              </a>
             
              @if($customar_id =  Session::get('customar_id'))
              
              <a style="text-decoration: none;"  href="" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                Logout
                </span>
              </a>
              <form action="{{ route('customar-logout')}}" method="POST" id="logoutform">
                @csrf
              </form>
              @else
              <a style="text-decoration: none;"  href="{{route('checkout')}}" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Login
                </span>
              
              </a>
              <a style="text-decoration: none;"  href="{{route('checkout')}}" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Signup
                </span>
               
              </a>
              @endif
              <a style="text-decoration: none;" href="{{route('show-cart')}}" class="cart-link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>
                  Cart
                  <span class="p-1 bg-secondary rounded-circle">
                  @if($grand_total = Session::get('grand_total'))
                  {{ $grand_total}}
                  @else
                  0
                  @endif
                  </span>
                </span>
              </a>
            </div>
          </div>

        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                E-BAJAR
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul style="float: right;" class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
              
             
               @foreach($categories as $key => $category)
               <li class="nav-item">
                  <a class="nav-link" href="{{route('category-product',['id'=> $category->id])}}">{{$category->name }}</a>
                </li>
               @endforeach
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->

   @yield('body')

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  Minics
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              Address
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              +01 1234567890
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              demo@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              Eligendi sunt, provident, debitis nemo, facilis cupiditate velit libero dolorum aperiam enim nulla iste maxime corrupti ad illo libero minus.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="{{route('/')}}">
                  Home
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="">my team</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{ asset('/') }}style-file/js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('/') }}style-file/js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="{{ asset('/') }}style-file/js/custom.js"></script>


</body>

</html>