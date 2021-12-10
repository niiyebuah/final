<?php
// Include database connection file
require_once "db_connection.php";
include_once 'header.php';
// Define variables and initialize with empty values
$available = $quantity  = $category = $origin = "";
$available_err = $quantity_err = $category_err = $origin_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_available = trim($_POST["JewelleryAvailable"]);
    if(empty($input_available)){
        $available_err = "Please enter Jewellery Available.";
    } elseif(!filter_var($input_available, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $available_err = "Please enter a valid name.";
    } else{
        $available = $input_available;
    }
    
    // Validate Jewellery Quantity
    $input_quantity = trim($_POST["JewelleryQuantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter Jewellery Quantitys";     
    } else{ 
        $quantity = $input_quantity;
    }

    // Validate Jewellery Category
    $input_category = trim($_POST["JewelleryCategory"]);
    if(empty($input_category)){
        $category_err = "Please enter Jewellery Category.";     
    } else{
        $category = $input_category;
    }

    // Validate Jewellery Origin
    $input_origin = trim($_POST["Origin"]);
    if(empty($input_origin)){
        $origin_err = "Please enter the Jewellery Origin";     
    } else{
        $origin = $input_origin;
    }
    
    
    // Check input errors before inserting in database
    if(empty($available_err) && empty($quantity_err) && empty($category_err) && empty($origin_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO stock (JewelleryAvailable, JewelleryQuantity, JewelleryCategory, Origin) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_available, $param_quantity, $param_category, $param_origin);
            
            // Set parameters
            $param_available = $available;
            $param_quantity = $quantity;
            $param_category = $category;
	    $param_origin = $origin;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: home.php");
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to Stock record in the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Jewellery Available:</label>
                            <input type="text" name="JewelleryAvailable" class="form-control <?php echo (!empty($available_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $available; ?>">
                            <span class="invalid-feedback"><?php echo $available_err;?></span>
                        </div>  
                        <div class="form-group">
                            <label>Jewellery Quantity:</label>
                            <textarea name="JewelleryQuantity" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>"><?php echo $quantity; ?></textarea>
                            <span class="invalid-feedback"><?php echo $quantity_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Jewellery Category:</label>
                            <input type="text" name="JewelleryCategory" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                            <span class="invalid-feedback"><?php echo $category_err;?></span>
                        </div>
			<div class="form-group">
                            <label>Jewellery Origin:</label>
                            <input type="text" name="Origin" class="form-control <?php echo (!empty($origin_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $origin; ?>">
                            <span class="invalid-feedback"><?php echo $origin_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexDb.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


<?php
include_once 'footer.php';
?>