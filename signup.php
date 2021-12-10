
<?php
// Include database connection file
require_once "db_connection.php";
include_once 'header.php';
 
// Define variables and initialize with empty values
$email = $fullname = $username = $password = "";
$email_err = $fullname_err =  $username_err = $password_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validating Email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your Email";     
    } else{ 
        $email = $input_email;
    }

    //Validating Full name
    $input_fullname = trim($_POST["fullname"]);
    if(empty($input_fullname)){
        $fullname_err = "Please enter your Fullname";     
    } else{ 
        $fullname = $input_fullname;
    }


    // Validate username
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

    //Validating password strength.
    $input_password = trim($_POST["personal_password"]);
    $number = trim('@[0-9]@', $password);
    $uppercase = trim('@[A-Z]@', $password);
    $lowercase = trim('@[a-z]@', $password);
    $specialChars = trim('@[^\w]@', $password);

       
    if(strlen($password) < 5 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $password_err = "Password must be at least 5 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character";
    } else {
        $password = $input_password;
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($fullname_err) && empty($username_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO customer (email, fullname, username, personal_password) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_email, $param_fullname, $param_username, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_fullname = $fullname;
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                header("location: login.php");
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
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>  

                         <!-- fullname -->
                       <div class="form-floating mb-3">
                            <label>Fullname</label>
                            <input type="text" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullname; ?>">
                            <span class="invalid-feedback"><?php echo $fullname_err;?></span>
                        </div>

                         <!-- username -->
                       <div class="form-floating mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>

                        <!-- password -->
                        <div class="form-floating mb-3">
                            <label>Password:</label>
                            <input type="password" name="personal_password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>
                        <div class="text-center">
                          <input type="submit" class="btn btn-primary" value="SIGN UP">
                          <br>
                          <br>
                          <a href="login.php">Already have and account? Login</a>

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

