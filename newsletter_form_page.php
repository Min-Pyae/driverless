<?php 

    session_start();
    include('./config/connect.php');
	
    // CHECKING POST METHOD USER REGISTER 
    if (isset($_POST['SignUpBtn'])) {  
        echo "<script>window.alert('You\'ve signed up successfully!');</script>";
        echo "<script>window.location='https://www.autonomousvehicleinternational.com/'</script>";
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Newsletter Sign Up Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>
     
    <!-- HEADER -->
    <?php include ('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- USER REGISTER FORM -->
    <div class="form-container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h2 class="mb-5 text-center">Newsletter Sign Up</h2>
    
            <div class="mb-4">
                <label for="UserName" class="mb-2">Username:</label>
                <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter your Full Name" required>
            </div>

            <div class="col-md mb-4">
                <label for="Email" class="mb-2">Email address:</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your Email" required> 
            </div>

            <div class="col-md mb-4">
                <label for="Password" class="mb-2">Password:</label>
                <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter your Password" required>
            </div>
           
            <button type="submit"  name="SignUpBtn" class="btn btn-primary login-btn my-3">Sign Up</button>
        </form>
    </div>
    <!-- END OF USER REGISTER FORM -->
        
    
    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>