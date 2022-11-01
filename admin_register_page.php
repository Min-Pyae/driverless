<?php 

    session_start();
    include('./config/connect.php');

    $adminname = $email = $password = $phoneNumber = $error = '';

    // CHECKING POST METHOD ADMIN REGISTER
    if (isset($_POST['RegisterBtn'])) {

        // HASHING PASSWORDS
        $password = $_POST['Password'];
        $hashPassword = mysqli_real_escape_string($Connect_DB, password_hash($password, PASSWORD_BCRYPT));

        $adminname = mysqli_real_escape_string($Connect_DB, $_POST['AdminName']);
        $email = mysqli_real_escape_string($Connect_DB, $_POST['Email']);
        $phoneNumber = mysqli_real_escape_string($Connect_DB, $_POST['PhoneNumber']);

        // ADMIN SELECT QUERY
        $querySelect = "SELECT * FROM admins
                        WHERE AdminName = '$adminname'
                        OR Email = '$email'
                        OR Password = '$hashPassword'";

        // ADMIN SELECT QUERY RESULT
        $querySelectResult = mysqli_query($Connect_DB, $querySelect);

        $count = mysqli_num_rows($querySelectResult);

        if ($count > 0) {  
            echo "<script>window.alert('Account already exists!');</script>";
            $error = 'Account already exists!';
		} else {
            // ADMIN INSERT QUERY
			$queryInsert = "INSERT INTO admins(AdminName, Email, Password, PhoneNumber)
                            VALUES ('$adminname', '$email', '$hashPassword', '$phoneNumber')";

            // ADMIN INSERT QUERY RESULT           
            $queryInsertResult = mysqli_query($Connect_DB, $queryInsert);

            if ($queryInsertResult) {
                echo "<script>window.alert('Admin Registration Success!');</script>";
                echo "<script>window.location='admin_login_page.php';</script>";
            } else {
                echo "<script>window.alert('Registration Fails!');</script>";
            }  
		}
    } else {
        echo mysqli_error($Connect_DB);
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Admin Registration Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <!-- HEADER -->
    <?php include ('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- ADMIN REGISTER FORM -->
    <div class="form-container" style="height: 110vh;">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h2 class="mb-5 text-center">Admin Register</h2>

            <!-- ALREADY EXISTED ACCOUNT -->
            <div class="mt-2 mb-3">
            <?php 
                if (!empty($error)):
            ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?php echo htmlspecialchars($error)?>
            </div>
            
            <?php else: ?>    
                <?php echo htmlspecialchars($error)?>
            <?php endif; ?>
            </div>
            <!-- END OF ALREADY EXISTED ACCOUNT -->

            <div class="mb-4">
                <label for="AdminName" class="mb-2">Admin Name:</label>
                <input type="text" class="form-control" id="AdminName" name="AdminName"placeholder="Enter your Name" value="<?php echo htmlspecialchars($adminname); ?>" required>
            </div>

            <div class="mb-4">
                <label for="Email" class="mb-2">Email address:</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your Email" value="<?php echo htmlspecialchars($email); ?>" required> 
            </div>

            <div class="mb-4">
                <label for="Password" class="mb-2">Password:</label>
                <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="<?php echo htmlspecialchars($password); ?>" required>
            </div>

            <div class="mb-4">
                <label for="PhoneNumber" class="mb-2">Phone Number:</label>
                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="Enter your Phone Number" value="<?php echo htmlspecialchars($phoneNumber); ?>" required>
            </div>

            <button type="submit"  name="RegisterBtn" class="btn btn-primary login-btn my-3">Register</button>
            <div class="text-center">Already have account? <a class="link-text" href="admin_login_page.php">Log in</a></div>
        </form>
    </div>
    <!-- END OF ADMIN REGISTER FORM -->
    

    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>