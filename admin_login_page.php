<?php 

    session_start();
    include('./config/connect.php');

    $adminname = $password = $error = '';

    // CHECKING POST METHOD ADMIN LOGIN
    if (isset($_POST['LoginBtn'])) {

        // CHECKING LOGIN ATTEMPTS
        if (!isset($_SESSION['LoginAttempt'])) {
            $_SESSION['LoginAttempt'] = 3;
        } 

        $adminname = mysqli_real_escape_string($Connect_DB, $_POST['AdminName']);
        $password = mysqli_real_escape_string($Connect_DB, $_POST['Password']);
        
        // ADMIN SELECT QUERY
        $querySelect = "SELECT * FROM admins
                        WHERE AdminName = '$adminname'";

        // ADMIN SELECT QUERY RESULT
        $querySelectResult = mysqli_query($Connect_DB, $querySelect);

        $data = mysqli_fetch_array($querySelectResult);
        $count = mysqli_num_rows($querySelectResult);

        if ($count > 0) {  

            // CHECKING PASSWORD HASH
            if (password_verify($password, $data['Password'])) {

                $_SESSION['AdminID'] = $data['AdminID'];
                $_SESSION['AdminName'] = $data['AdminName'];
                $_SESSION['AdminEmail'] = $data['Email'];
                $_SESSION['AdminPhoneNumber'] = $data['PhoneNumber'];
                unset($_SESSION['LoginAttempt']);

                echo "<script>window.alert('You\'ve logged in successfully!');</script>";
                echo "<script>window.location='contact_question_page.php'</script>";

            } else{

                $_SESSION['LoginAttempt']--;
                if($_SESSION ['LoginAttempt'] >= 1) {
                    $error = 'Email address and password does not match! ';
                    echo "<script>window.alert('Email address and password does not match! ". $_SESSION['LoginAttempt'] . " attempt remaining.');</script>";
                } else {
                    $error = "Too many failed login attempts. Please Try Again in ";
                    echo "<script> window.alert ('Too many failed login attempts. Please Try Again in 10 Minutes.')</script>";  
                }
                
            }
		} else {

            $_SESSION['LoginAttempt']--;
            if($_SESSION ['LoginAttempt'] >= 1) {
                $error = 'Email address and password does not match! ';
                echo "<script>window.alert('Email address and password does not match! ". $_SESSION['LoginAttempt'] . " attempt remaining.');</script>";
            } else {
                $adminname = $password = '';
                $error = "Too many failed login attempts. Please Try Again in ";
                echo "<script> window.alert ('Too many failed login attempts. Please Try Again in 10 Minutes.')</script>";  
            }

		}
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Admin Login Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>
     
    <!-- HEADER -->
    <?php include ('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- ADMIN LOGIN FORM -->
    <div class="form-container" style="height: 100vh;">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h2 class="mb-5 text-center">Admin Login</h2>

            <div class="mb-5">
                <label for="AdminName" class="mb-2">Admin Name:</label>
                <input type="type" class="form-control" id="AdminName" name="AdminName" placeholder="Enter your Name"  value="<?php echo htmlspecialchars($adminname); ?>" required> 
            </div>

            <div class="mb-5">
                <label for="Password" class="mb-2">Password:</label>
                <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="<?php echo htmlspecialchars($password); ?>" required>
            </div>

            <div>
                <?php if (isset($_SESSION['LoginAttempt']) && $_SESSION['LoginAttempt'] < 1): ?>
                <div id='login-warning' class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?php echo "<strong>" . htmlspecialchars($error) . "<span id='timer'>10: 00</span></strong>"; ?>
                </div>
                <button name='LoginBtn' type='submit' id='login-btn' class='btn btn-primary login-btn mt-2 mb-3' disabled>Login</button>
                
                <?php 
                    $_SESSION['LoginAttempt'] = 3;
                    elseif ($error == "Email address and password does not match! "): 
                ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?php echo htmlspecialchars($error) . $_SESSION['LoginAttempt'] . " attempt remaining."; ?>
                </div>
                <button name='LoginBtn' type='submit' id='login-btn' class='btn btn-primary login-btn mt-1 mb-3'>Login</button>
                
                <?php else: ?>    
                <button name='LoginBtn' type='submit' id='login-btn' class='btn btn-primary login-btn mt-1 mb-3'>Login</button>
                <?php endif; ?>
            </div>
            
            <div class="text-center mt-2">If you're admin but doesn't have account, please <a class="link-text" href="admin_register_page.php">Sign Up.</a></div>
        </form>
    </div>
    <!-- END OF ADMIN LOGIN FORM -->


    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>