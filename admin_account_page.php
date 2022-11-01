<?php

    session_start();
    include('./config/connect.php');

    $adminID = $_SESSION['AdminID'];
    $adminName = $_SESSION['AdminName'];
    $email = $_SESSION['AdminEmail'];
    $phoneNumber =  $_SESSION['AdminPhoneNumber'];
        
    // CHECKING POST METHOD SAVE CHANGES 
    if (isset($_POST['SaveChangesBtn'])) {

        $userName = mysqli_real_escape_string($Connect_DB, $_POST['NewAdminName']);
        $email = mysqli_real_escape_string($Connect_DB, $_POST['NewEmail']);
        $phoneNumber = mysqli_real_escape_string($Connect_DB, $_POST['NewPhoneNumber']);

        // USERS SELECT QUERY
        $querySelect = "SELECT * FROM admins
                        WHERE AdminID = '$adminID'";

        // USERS SELECT QUERY RESULT
        $querySelectResult = mysqli_query($Connect_DB, $querySelect);

        $count = mysqli_num_rows($querySelectResult);

        if ($count > 0) {  
        
            // USERS INSERT QUERY
            $queryInsert = "UPDATE admins
                            SET AdminName = '$adminName',
                                Email = '$email',
                                PhoneNumber = '$phoneNumber',
                            WHERE AdminID = '$adminID'";
        
            // USERS INSERT QUERY RESULT
            $queryInsertResult = mysqli_query($Connect_DB, $queryInsert);
            
            if ($queryInsertResult) {
            
                echo "<script>window.alert('Changes\'ve done successfully!');</script>";
                
                $querySelect = "SELECT * FROM admins
                                WHERE AdminID = '$adminID'";
                $querySelectResult = mysqli_query($Connect_DB, $querySelect);
                $count = mysqli_num_rows($querySelectResult);
                $data = mysqli_fetch_array($querySelectResult);

                if ($count > 0) {  
                    $_SESSION['AdminName'] = $data['AdminName'];
                    $_SESSION['AdminEmail'] = $data['Email'];
                    $_SESSION['AdminPhoneNumber'] = $data['PhoneNumber'];
                }

            } else {
                echo "<script>window.alert('Changes Fails!');</script>";
            }  
        }
    } else {
        echo mysqli_error($Connect_DB);
    }

    // CHECKING POST METHOD SAVE PASSAWORD 
    if (isset($_POST['SavePasswordBtn'])) {

        $password = mysqli_real_escape_string($Connect_DB, $_POST['CurrentPassword']);
        $newpassword = mysqli_real_escape_string($Connect_DB, $_POST['NewPassword']);
        $confirmNewPassword = mysqli_real_escape_string($Connect_DB, $_POST['ConfirmNewPassword']);

        if ($newpassword == $confirmNewPassword) {
            // USERS SELECT QUERY
            $querySelect = "SELECT * FROM admins
                            WHERE AdminID = '$adminID'
                            AND Password = '$password'";

            // USERS SELECT QUERY RESULT
            $querySelectResult = mysqli_query($Connect_DB, $querySelect);

            $count = mysqli_num_rows($querySelectResult);

            if ($count > 0) {  
            
                // USERS INSERT QUERY
                $queryInsert = "UPDATE admins
                                SET Password = '$newpassword'
                                WHERE AdminID = '$adminID'";
            
                // USERS INSERT QUERY RESULT
                $queryInsertResult = mysqli_query($Connect_DB, $queryInsert);
                
                if ($queryInsertResult) { 
                    echo "<script>window.alert('Password\'ve changed successfully!');</script>";
                } else {
                    echo "<script>window.alert('Password Changes Fails!');</script>";
                }  

            }
        } else {
            echo "<script>window.alert('New Password and Confrim Password do not match. Please Try Again!');</script>";
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

    <title>DRIVERLESS Account Settings Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

    <!-- HEADER -->
    <?php include('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- ADMIN PROFILE -->
    <div class="container my-5 p-md-5 p-3 bg-light rounded-3">
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap">
            <div class="nav flex-column nav-pills me-3 col-md-4 p-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="text-center mb-5">
                    <img src="./assets/images/person_icon.png" alt="Person Icon">
                </div>

                <button class="nav-link active text-start p-md-3" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab">Profile</button>
                <button class="nav-link text-start p-md-3" id="edit-profile-tab" data-bs-toggle="pill" data-bs-target="#edit-profile" type="button" role="tab">Edit Profile</button>
                <button class="nav-link text-start p-md-3" id="change-password-tab" data-bs-toggle="pill" data-bs-target="#change-password" type="button" role="tab">Change Password</button>
                
                <a class="btn btn-login my-4" href="./logout.php" role="button">Logout</a>
            </div>

            <div class="tab-content col-md-8 p-md-5 p-3" id="v-pills-tabContent">
                <!-- PROFILE TAB -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="container" id="user-profile">
                        <h3 class="mb-5">Profile</h3>

                        <div class="row">
                            <div class="col-lg-4">
                                <h5 class="text-muted mb-2">Admin Name</h5>
                            </div>
                            <div class="col-lg-8">
                                <h5><?php echo htmlspecialchars($adminName); ?></h5>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <h5 class="text-muted mb-2">Email</h5>
                            </div>
                            <div class="col-lg-8">
                                <h5><?php echo htmlspecialchars($email); ?></h5>
                            </div>
                        </div>
                        <hr>

                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <h5 class="text-muted mb-2">Phone Number</h5>
                            </div>
                            <div class="col-lg-8">
                                <h5><?php echo htmlspecialchars($phoneNumber); ?></h5>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- END OF PROFILE TAB -->
                 
                <!-- EDIT PROFILE TAB -->
                <div class="tab-pane fade" id="edit-profile" role="tabpanel">
                    <h3 class="mb-5">Edit Profile</h3>
                    <form class="user-update-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="mb-5">
                            <label for="NewUserName" class="form-label">User Name:</label>
                            <input type="text" class="form-control" name="NewUserName" id="NewUserName" value="<?php echo htmlspecialchars($adminName); ?>" required>
                            
                        </div>

                        <div class="mb-5">
                            <label for="NewEmail" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" name="NewEmail" id="NewEmail" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>

                        <div class="mb-5">
                            <label for="NewPhoneNumber" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="NewPhoneNumber" id="NewPhoneNumber" value="<?php echo htmlspecialchars($phoneNumber); ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-register" name="SaveChangesBtn">Save Changes</button>
                    </form>
                </div>
                <!-- END OF EDIT PROFILE TAB -->

                <!-- CHANGE PASSWORD TAB -->
                <div class="tab-pane fade" id="change-password" role="tabpanel">
                    <h3 class="mb-5">Change Password</h3>
                    <form class="user-update-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="mb-5">
                            <label for="CurrentPassword" class="form-label">Current Password:</label>
                            <input type="password" class="form-control" id="CurrentPassword" name="CurrentPassword">
                            
                        </div>

                        <div class="mb-5">
                            <label for="NewPassword" class="form-label">New Password:</label>
                            <input type="password" class="form-control" id="NewPassword" name="NewPassword">
                        </div>

                        <div class="mb-5">
                            <label for="ConfirmNewPassword" class="form-label">Confirm New Password:</label>
                            <input type="password" class="form-control" id="ConfirmNewPassword" name="ConfirmNewPassword">
                        </div>
                        
                        <button type="submit" name="SavePasswordBtn" class="btn btn-register my-3">Save Password</button>
                    </form>
                </div>
                <!-- END OF CHANGE PASSWORD TAB -->
            </div>
        </div>
    </div>
    <!-- END OF ADMIN PROFILE -->


	<!-- FOOTER -->
    <?php include('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>