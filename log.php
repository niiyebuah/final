<?php
include_once 'header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SIGN UP</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>


  <body>
    <div class="container-sm">
        <div class="row">
            <div class="col-xsml-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-8 my-5">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-1  fw-blue fs-5">SIGN UP</h5>
                    <hr class=light></hr>
                    <form action="checkout.php" method="post">


                        <!-- Item Name-->
                       <div class="form-floating mb-3">
                            <label>Item Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>  

                         <!-- Quantity -->
                       <div class="form-floating mb-3">
                            <label>Quantity:</label>
                            <input type="text" name="quantity" class="form-control" required>
                        </div>

                         <!-- Select picture ofitem -->
                       <div class="form-floating mb-3">
                            <label>Picture:</label>
                            <input type="file" name="picture" class="form-control" required>
                        </div>

                        <div class="text-center">
                          <input type="submit" class="btn btn-primary" value="SUBMIT">
                          
                        </div>
                    </form>
                  </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>




<?php include_once 'footer.php';

?>
