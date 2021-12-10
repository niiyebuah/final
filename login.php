
<?php
// Include database connection file
require_once "db_connection.php";
include_once 'header.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter Username";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $username_err = "Please enter a valid name.";
    } else{
        $username = $input_username;
    }
    
    //Validating password if empty
    $input_password = trim($_POST["personal_password"]);
    if(empty($input_password)){
        $password_err = "Password must be at least 5 characters in length and must contain at least one number, one upper case letter and one lower case letter";
    } else{ 
        $password = $input_password;
    }

  
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){
        // Prepare an insert statement
        $sql="SELECT * FROM `admin` WHERE username='$username' && personal_password='$password'";
    
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
    
                header("location:home.php");
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
                    <h5 class="card-title text-center mb-1  fw-blue fs-5">LOGIN</h5>
                    <hr class=light></hr>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                      <!-- Username -->
                        <div class="form-floating mb-3">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>  

                      <!-- Password -->
                        <div class="form-floating mb-3">
                            <label>Password:</label>
                            <input type="password" name="personal_password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="text-center">
                          <input type="submit" class="btn btn-primary" value="LOGIN">
                          <br>
                          <a href="signup.php">Don't have and account? Sign up</a>

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

