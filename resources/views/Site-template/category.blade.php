@extends('Site-template.master')
@section('body')

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

  <title>Minics</title>


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

</head>

<body class="sub_page">




  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Category Product
        </h2>
      </div>
      <div class="row">
      @foreach($products as $key =>$product)
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset($product->image)}}" alt="">
              <a href="{{ route( 'product-details', [ 'id' => $product->id])}}" class="add_cart_btn">
                <span>
                  Add To Cart
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
              {{ $product->Product_name}}
              </h5>
              <div class="product_info">
                <h5>
                  <span>$</span>{{ $product->Product_Price}}
                </h5>
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
        </div>
      </div>
      <div class="btn_box items-center">
        <a href="" class="view_more-link ">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end product section -->


 
 >

  <!-- jQery -->
  <script src="{{ asset('/') }}style-file/js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('/') }}style-file/js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="{{ asset('/') }}style-file/js/custom.js"></script>



@endsection