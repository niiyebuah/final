
<?php
// Include database connection file
require_once "db_connection.php";
include_once 'header.php';
 
// Define variables and initialize with empty values
$item = $quantity = $address  = "";
$item_err = $quantity_err =  $address_err  ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validating Item
    $input_item = trim($_POST["item_name"]);
    if(empty($input_item)){
        $item_err = "Please enter Item";     
    } else{ 
        $item = $input_item;
    }

    //Validating Full name
    $input_quantity = trim($_POST["item_quantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter Quantity";     
    } else{ 
        $quantity = $input_quantity;
    }

    //Validating Customer Address
    $input_address = trim($_POST["customer_address"]);
    if(empty($input_address)){
        $address_err = "Please enter Adress";     
    } else{ 
        $address = $input_address;
    }


    
    // Check input errors before inserting in database
    if(empty($item_err) && empty($quantity_err) && empty($address_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO item (item_name, item_quantity, customer_address) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_item, $param_quantity, $param_address);
            
            // Set parameters
            $param_item = $item;
            $param_quantity = $quantity;
            $param_address = $address;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                header("location: checkout.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container-sm">
        <div class="row">
            <div class="col-xsml-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-8 my-5">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-1  fw-blue fs-5">SIGN UP</h5>
                    <hr class=light></hr>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                        <!--email-->
                       <div class="form-floating mb-3">
                            <label>Item Name</label>
                            <input type="text" name="item_name" class="form-control <?php echo (!empty($item_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $item; ?>">
                            <span class="invalid-feedback"><?php echo $item_err;?></span>
                        </div>  

                         <!-- fullname -->
                       <div class="form-floating mb-3">
                            <label>Quantity</label>
                            <input type="text" name="item_quantity" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $quantity; ?>">
                            <span class="invalid-feedback"><?php echo $quantity_err;?></span>
                        </div>

                         <!-- username -->
                       <div class="form-floating mb-3">
                            <label>Address</label>
                            <input type="text" name="customer_address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                            <span class="invalid-feedback"><?php echo $adress_err;?></span>
                        </div>

                        
                        <div class="text-center">
                          <input type="submit" class="btn btn-primary" value="SUBMIT">
                          <br>
                          <br>

                        </div>
                    </form>
                  </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


<?php
include_once 'footer.php';
?>

