<!--Php syntax for including the header -->
<?php
include_once 'header.php';
?>    
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>ADOM JEWELRY CO.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="/path/to/parallax.js"></script>
</head>


<body>
<!-- Welcome -->

  <div class="container-fluid padding">
      <div class="row welcome text-center">
          <div class="col-12">
              <h2 class="display-4">ADOM JEWELRY & CO.</h2>
          </div>
      </div>
  </div>

<div class="container-lg">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>

  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="carousel/1.jpg" class="img-fluid" alt="thumbnail">
    </div>

    <div class="carousel-item">
      <img src="carousel/2.jpg" class="img-fluid" alt="thumbnail">
      <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
    </div>

    <div class="carousel-item">
      <img src="carousel/3.jpg" class="img-fluid" alt="Responsive image">
      <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
    </div>

    <div class="carousel-item">
      <img src="carousel/4.jpg" class="img-fluid" alt="Responsive image">
      <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
    </div>

    <div class="carousel-item">
      <img src="carousel/5.jpg" class="img-fluid" alt="Responsive image">
      <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
    </div>

    <div class="carousel-item">
      <img src="carousel/6.jpg" class="img-fluid" alt="Responsive image">
      <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
    </div>

    <div class="carousel-item">
      <img src="carousel/7.jpg" class="img-fluid" alt="Responsive image">
      <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>-->
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="hover" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>


  <div class="row padding">
    <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <img class="card-img-top" src="store/one.png">
                <p class="text-center">Rolex Watch</p>
                <p class="text-center">$2000</p>
                <div class="text-center">
                    <a class="btn btn-primary" href="purchase.php" role="button">Purchase</a> 
                </div>    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <img class="card-img-top" src="store/two.png">
                <p class="text-center">Rolex Watch</p>
                <p class="text-center">$2000</p>
                <div class="text-center">
                    <a class="btn btn-primary" href="purchase.php" role="button">Purchase</a> 
                </div>    
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <img class="card-img-top" src="store/three.png">
                <p class="text-center">Rolex Watch</p>
                <p class="text-center">$2000</p>
                <div class="text-center">
                    <a class="btn btn-primary" href="purchase.php" role="button">Purchase</a> 
                </div>    
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <img class="card-img-top" src="store/four.png">
                <p class="text-center">Rolex Watch</p>
                <p class="text-center">$2000</p>
                <div class="text-center">
                    <a class="btn btn-primary" href="purchase.php" role="button">Purchase</a> 
                </div>    
                </div>
            </div>
        </div>
</div>



<!--<div class= "container-fluid padding">
	<h2 class="text-center">ABOUT US</h2>
	<p class="text-center">ADOM JEWELLERY IS A WORLDWIDE ACCREDITED <br>JEWELRY COMPANY WHICH PROVIDES SERVICES WITH<BR> THEIR CUSTOMERS IN MIND ADOM JEWELLERY IS<br> ONE OF THE LARGEST DISTRIBUTORS OF AMBER <br>
	JEWELRY IN THE WORLD ADOM JEWELRY IS<br> YOUR ONE SOURCE FOR LUXURY AMBER PRODUCTS BROUGHT<br> TO YOU FROM MANUFACTURERS BASED ALL OVER THE WORLD</p>
</div>-->

    </body>
</html>    

<!--Php syntax for including the footer-->
<?php
  include_once 'footer.php';
?>