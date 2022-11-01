<?php 

    session_start();
    include('./config/connect.php');

    $username = $email = $password = $dateOfBirth = $address = $postCode = $error = '';
	
    // CHECKING POST METHOD USER REGISTER 
    if (isset($_POST['RegisterBtn'])) {
        
        $username = mysqli_real_escape_string($Connect_DB, $_POST['UserName']);
        $email = mysqli_real_escape_string($Connect_DB, $_POST['Email']);

        // HASHING PASSWORDS
        $password = $_POST['Password'];
        $hashPassword = mysqli_real_escape_string($Connect_DB, password_hash($password, PASSWORD_BCRYPT));
        
        $dateOfBirth = mysqli_real_escape_string($Connect_DB, $_POST['DateOfBirth']);
        $address = mysqli_real_escape_string($Connect_DB, $_POST['Address']);
        $postCode = mysqli_real_escape_string($Connect_DB, $_POST['PostCode']);

        // USERS SELECT QUERY
        $querySelect = "SELECT * FROM users
                        WHERE UserName = '$username'
                        OR Email = '$email'
                        OR Password = '$hashPassword'";

        // USERS SELECT QUERY RESULT
        $querySelectResult = mysqli_query($Connect_DB, $querySelect);

        $count = mysqli_num_rows($querySelectResult);

        if ($count > 0) {  
            echo "<script>window.alert('Account already exists!');</script>";
            $error = 'Account already exists!';
		} else {
            // USERS INSERT QUERY
            $queryInsert = "INSERT INTO users(UserName, Email, Password, DateOfBirth, Address, PostCode)
                            VALUES ('$username', '$email', '$hashPassword', '$dateOfBirth', '$address', '$postCode')";
        
            // USERS INSERT QUERY RESULT
            $queryInsertResult = mysqli_query($Connect_DB, $queryInsert);
            
            if ($queryInsertResult) {
                echo "<script>window.alert('User Registration Success!');</script>";
                echo "<script>window.location='user_login_page.php';</script>";
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

    <title>DRIVERLESS User Registration Page</title>

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
            <h2 class="mb-5 text-center">User Registration</h2>

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
                <label for="UserName" class="mb-2">Username:</label>
                <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter your Full Name" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>

            <div class="row">
                <div class="col-md mb-4">
                    <label for="Email" class="mb-2">Email address:</label>
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter your Email" value="<?php echo htmlspecialchars($email); ?>" required> 
                </div>

                <div class="col-md mb-4">
                    <label for="Password" class="mb-2">Password:</label>
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter your Password" value="<?php echo htmlspecialchars($password); ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="DateOfBirth" class="mb-2">Date of Birth:</label>
                <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" placeholder="Enter your Date of Birth" value="<?php echo htmlspecialchars($dateOfBirth); ?>" required>
            </div>

            <div class="mb-4">
                <label for="Address" class="mb-2">Address:</label>
                <textarea class="form-control" id="Address" name="Address" placeholder="Enter your Address" required><?php echo htmlspecialchars($address); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="PostCode" class="mb-2">Post Code:</label>
                <input type="text" class="form-control" id="PostCode" name="PostCode" placeholder="Enter your Post Code" value="<?php echo htmlspecialchars($postCode); ?>" required>
            </div>

            <button type="submit"  name="RegisterBtn" class="btn btn-primary login-btn my-3">Register</button>
            <div class="text-center">Already have account? <a class="link-text" href="user_login_page.php">Log in</a></div>
        </form>
    </div>
    <!-- END OF USER REGISTER FORM -->
        
    
    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>