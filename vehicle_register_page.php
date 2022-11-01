<?php 

    session_start();
    include('./config/connect.php');

    $vehicleName = $vehicleModel = $vehicleType = $year = $description = $unitPrice = $promotionPrice = '';
 
    // CHECKING POST METHOD VEHICLE REGISTER
    if (isset($_POST['RegisterBtn'])) {
        
        $vehicleName = mysqli_real_escape_string($Connect_DB, $_POST['VehicleName']);
        $vehicleModel = mysqli_real_escape_string($Connect_DB, $_POST['VehicleModel']);
        $vehicleType = mysqli_real_escape_string($Connect_DB, $_POST['VehicleType']);
        $year = mysqli_real_escape_string($Connect_DB, $_POST['VehicleYear']);
        $description = mysqli_real_escape_string($Connect_DB, $_POST['VehicleDescription']);
        $unitPrice = mysqli_real_escape_string($Connect_DB, $_POST['UnitPrice']);
        $promotionPrice = mysqli_real_escape_string($Connect_DB, $_POST['PromotionPrice']);

        // UPLOADING IMAGE 
        $vehicleImage = $_FILES['VehicleImage']['name'];
        $folder = 'VehicleImages/';
        if ($vehicleImage) {
            $fileName = $folder.$vehicleImage;
            $copied = copy($_FILES['VehicleImage']['tmp_name'], $fileName);
            if(!$copied) {
                exit("Cannot upload Image! Please Try Again!");
            }
        }

        // INSERT QUERY
        $queryInsert = "INSERT INTO vehicles(VehicleName, VehicleModel, VehicleType, Year, Description, UnitPrice, PromotionPrice, VehicleImage)
                        VALUES('$vehicleName', '$vehicleModel', '$vehicleType', '$year', '$description', '$unitPrice', $promotionPrice, '$fileName')";
        
        // INSERT QUERY RESULT
        $queryInsertResult = mysqli_query($Connect_DB, $queryInsert);

        if ($queryInsertResult) {
            echo "<script>window.alert('Vehicle Registration Success!');</script>";
            echo "<script>window.location='vehicle_display_page.php'</script>";
        } else {
            echo "<script>window.alert('Vehicle Registration Fails!');</script>";
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

    <title>DRIVERLESS Vehicles Registration Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>

    <!-- HEADER -->
    <?php include ('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- VEHICLE REGISTER FORM -->
    <div class="form-container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <h2 class="mb-5 mt-3 text-center">Vehicles Registration</h2>

            <div class="row">
                <div class="col mb-4">
                    <label for="VehicleName" class="mb-2">Vehicle Name:</label>
                    <input type="text" class="form-control" id="VehicleName" name="VehicleName" placeholder="Enter Vehicle Name" value="<?php echo htmlspecialchars($vehicleName); ?>" required>
                </div>

                <div class="col mb-4">
                    <label for="VehicleModel" class="mb-2">Model:</label>
                    <input type="text" class="form-control" id="VehicleModel" name="VehicleModel" placeholder="Enter Vehicle Model" value="<?php echo htmlspecialchars($vehicleModel); ?>" required> 
                </div>
            </div>

            <div class="row">
                <div class="col mb-4">
                    <label for="VehicleType" class="mb-2">Vehicle Type:</label>
                    <input type="text" class="form-control" id="VehicleType" name="VehicleType" placeholder="Enter Vehicle Type" value="<?php echo htmlspecialchars($vehicleType); ?>" required>
                </div>

                <div class="col mb-4">
                    <label for="VehicleYear" class="mb-2">Year:</label>
                    <input type="text" class="form-control" id="VehicleYear" name="VehicleYear" placeholder="Enter Year" value="<?php echo htmlspecialchars($year); ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="VehicleDescription" class="mb-2">Description:</label>
                <textarea class="form-control" id="VehicleDescription" name="VehicleDescription" placeholder="Enter Vehicle Description" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <div class="row">
                <div class="col mb-4">
                    <label for="UnitPrice" class="mb-2">Unit Price:</label>
                    <input type="text" class="form-control" id="UnitPrice" name="UnitPrice" placeholder="Enter Unit Price" value="<?php echo htmlspecialchars($unitPrice); ?>" required>
                </div>

                <div class="col mb-4">
                    <label for="PromotionPrice" class="mb-2">Promotion Price:</label>
                    <input type="text" class="form-control" id="PromotionPrice" name="PromotionPrice" placeholder="Enter Vehicle Promotion Price" value="<?php echo htmlspecialchars($promotionPrice); ?>" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="VehicleImage" class="mb-2">Vehicle Image:</label>
                <input type="file" class="form-control" id="VehicleImage" name="VehicleImage" placeholder="Upload Vehicle Image" required>
            </div>

            <button type="submit" name="RegisterBtn" class="btn btn-primary login-btn my-3">Register</button>
        </form>
    </div>
    <!-- END OF VEHICLE REGISTER FORM -->
        

    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>