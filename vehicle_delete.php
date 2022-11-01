<?php 

    session_start();
    include('./config/connect.php');

    if(isset($_REQUEST['VehicleID'])) {
        $vehicleID = $_REQUEST['VehicleID'];

        // VEHICLE DELETE QUERY
        $queryVehicleDelete =  "DELETE FROM vehicles 
                                WHERE VehicleID = '$vehicleID'";

        // VEHICLE DELETE QUERY RESULT
        $queryVehicleDeleteResult = mysqli_query($Connect_DB, $queryVehicleDelete);

        if($queryVehicleDeleteResult) {
            echo "<script>window.alert('Deleted successfully!');</script>";
            echo "<script>window.location='vehicle_display_page.php';</script>";
        }
    }

?>