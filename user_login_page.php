<?php 

    session_start();
    include('./config/connect.php');

    $username = $password = $error = '';

    // CHECKING POST METHOD USER LOGIN 
    if (isset($_POST['LoginBtn'])) {

        // CHECKING LOGIN ATTEMPTS
        if (!isset($_SESSION['LoginAttempt'])) {
            $_SESSION['LoginAttempt'] = 3;
        } 

        $username = mysqli_real_escape_string($Connect_DB, $_POST['Username']);
        $password = mysqli_real_escape_string($Connect_DB, $_POST['Password']);
        
        // QUERY FOR SELECTING DATA
        $querySelect = "SELECT * FROM users
                        WHERE UserName = '$username'";
        $querySelectResult = mysqli_query($Connect_DB, $querySelect);
        $count = mysqli_num_rows($querySelectResult);
        $data = mysqli_fetch_array($querySelectResult);

        if ($count > 0) {  

            // CHECKING PASSWORD HASH
            if (password_verify($password, $data['Password'])) {

                $_SESSION['UserID'] = $data['UserID'];
                $_SESSION['UserName'] = $data['UserName'];
                $_SESSION['UserEmail'] = $data['Email'];
                $_SESSION['UserDateOfBirth'] = $data['DateOfBirth'];
                $_SESSION['UserAddress'] = $data['Address'];
                $_SESSION['UserPostCode'] = $data['PostCode'];

                unset($_SESSION['LoginAttempt']);

                echo "<script>window.alert('You\'ve logged in successfully!');</script>";
                echo "<script>window.location='index.php'</script>";

            } else{
                $_SESSION['LoginAttempt']--;
                if($_SESSION ['LoginAttempt'] >= 1) {
                    $error = 'Email address and password does not match! ';
                    echo "<script>window.alert('Email address and password does not match! ". $_SESSION['LoginAttempt'] . " attempt remaining.');</script>";
                } else {
                    $username = $password = '';
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
                $username = $password = '';
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

    <title>DRIVERLESS User Login Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>
     
    <!-- HEADER -->
    <?php include ('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- USER LOGIN FORM -->
    <div class="form-container" style="height: 100vh;">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h2 class="mb-5 text-center">User Login</h2>

            <div class="mb-5">
                <label for="Username" class="mb-2">Username:</label>
                <input type="text" class="form-control" id="Username" name="Username" placeholder="Enter your Username"  value="<?php echo htmlspecialchars($username); ?>" required> 
                
            </div>

            <div class="mb-5">
                <label for="Password" class="mb-2">Password:</label>
                <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter Password" value="<?php echo htmlspecialchars($password); ?>" required>
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

            <div class="text-center">New to DRIVERLESS? <a class="link-text" href="user_register_page.php">Sign Up</a></div>
        </form>
    </div>
    <!-- END OF USER LOGIN FORM -->


    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>