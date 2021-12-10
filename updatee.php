<?php

include_once 'header.php';
// Include database connection file
require_once "db_connection.php";
 
// Define variables and initialize with empty values
$available = $quantity  = $category = $origin = "";
$available_err = $quantity_err = $category_err = $origin_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["JewelleryID"]) && !empty($_POST["JewelleryID"])){
    // Get hidden input value
    $id = $_POST["JewelleryID"];
    
    // Validate Jewellery Available
    $input_available = trim($_POST["JewelleryAvailable"]);
    if(empty($input_available)){
        $available_err = "Please enter Jewellery Available";
    } elseif(!filter_var($input_available, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $available_err = "Please enter a valid name.";
    } else{
        $available = $input_available;
    }
    
    // Validate Jewellery Quantity
    $input_quantity = trim($_POST["JewelleryQuantity"]);
    if(empty($input_quantity)){
        $quantity_err = "Please enter Jewellery Quantity";     
    } else{
        $quantity = $input_quantity;
    }

    // Validate Jewellery Category
    $input_category = trim($_POST["Category"]);
    if(empty($input_category)){
        $category_err = "Please enter the Jewellery Category";     
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
        // Prepare an update statement
 	$sql = "UPDATE stock SET JewelleryAvailble=?, JewelleryQuantity=?, JewelleryCategory=?, Origin=? WHERE JewelleryID=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_available, $param_quantity, $param_category, $param_origin ,$param_id);
            
            // Set parameters
            $param_available = $available;
            $param_quantity = $quantity;
            $param_category = $category;
	    $param_origin = $origin;
	    $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: indexDb.php");
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

} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["JewelleryID"]) && !empty(trim($_GET["JewelleryID"]))){
        // Get URL parameter
        $id =  trim($_GET["JewelleryID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM stock WHERE JewelleryID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $available = $row["JewelleryAvailable"];
                    $quantity = $row["JewelleryQuantity"];
                    $category = $row["JewelleryCategory"];
		    $origin = $row["Origin"];
		    $id = $row["JewelleryID"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the information and submit to update the Stock record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Jewellery Available</label>
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
                        <input type="hidden" name="JewelleryID" value="<?php echo $id; ?>"/>
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
include_once 'footer.php'
?>