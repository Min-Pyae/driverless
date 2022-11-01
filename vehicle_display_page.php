<?php 

    session_start();
    include('./config/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Vehicles Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/aos.css?v=<?php echo time(); ?>">
    
</head>

<body>

    <!-- HEADER -->
    <?php include('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- EVENT PROMOTION -->
    <?php if (isset($_SESSION['UserID'])): ?>
    <div class="alert alert-dismissible fade show" role="alert">
        <div class="event-promotion">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center event-heading">
                        <h4>Promotion Event 15% Off</h4>
                        <span>Time Left on Sale</span>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div id="event-timer" class="d-flex justify-content-center">
                            <div class="d-flex me-3 align-items-center">
                                <div>
                                    <span class="days"></span> Days
                                </div>
                            </div>
                            <div class="d-flex me-3">
                            <div>
                                    <span class="hours"></span> Hours
                                </div>
                            </div>
                            <div class="d-flex me-3">
                                <div>
                                    <span class="minutes"></span> Minutes
                                </div>
                            </div>
                            <div class="d-flex me-3">
                                <div>
                                    <span class="seconds"></span> Seconds
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- END OF EVENT PROMOTION -->


    <!-- VEHICLES DISPLAY -->
    <div class="container">
        <div class="section-heading mt-5" data-aos="fade-up">
            <h2>Explore your <em>Vehicles</em></h2>
        </div>

        <!-- SEARCH ENGINE OPTIMISATION -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <div class="d-flex m-5 px-5" data-aos="zoom-in">    
                <input class="form-control input me-1" name="VehicleNameSearch" type="search" placeholder="Search...">
                <button name="SearchBtn" class="btn btn-search" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <!-- END OF SEARCH ENGINE OPTIMISATION -->

        <div class="row justify-content-center align-items-center">
            <?php 
                //CHECKING GET METHOD SEARCH BUTTON
                if (isset($_GET['SearchBtn']) || isset($_SESSION['VehicleNameSearch'])):
                
                    if (isset($_SESSION['VehicleNameSearch'])) {
                        $vehicleName = $_SESSION['VehicleNameSearch'];
                        unset($_SESSION['VehicleNameSearch']);
                    } else {
                        $vehicleName = $_GET['VehicleNameSearch'];
                    }

                    $querySelect = "SELECT *
                                    FROM vehicles
                                    WHERE VehicleName LIKE '%$vehicleName%'
                                    ORDER BY VehicleName";

                    $querySelectResult = mysqli_query($Connect_DB, $querySelect);
                    $count = mysqli_num_rows($querySelectResult);
                    if ($count > 0):
                        $vehicleArr = mysqli_fetch_all($querySelectResult, MYSQLI_ASSOC); 
                        foreach($vehicleArr as $vehicle): 
            ?>
            <div class="col-xl-6 col-lg-8 col-12 mb-4" data-aos="flip-up">
                <div class="card">
                    <img src="<?php echo "./" . htmlspecialchars($vehicle['VehicleImage']) ?>" class="card-img-top" alt="<?php echo htmlspecialchars($vehicle['VehicleName']); ?>">
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Name:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['VehicleName']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Model:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['VehicleModel']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Type:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['VehicleType']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Year:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['Year']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Description:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['Description']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Price:</h5>
                                </div>
                                <div class="col-8">
                                    <h5>
                                        <?php 
                                            if (isset($_SESSION['UserID']) || isset($_SESSION['AdminID'])) {
                                                echo "<del>" . htmlspecialchars($vehicle['UnitPrice']) . "</del> " . htmlspecialchars($vehicle['PromotionPrice']);
                                            } else {
                                                echo htmlspecialchars($vehicle['UnitPrice']);
                                            }
                                        ?>
                                    </h5>
                                </div>
                            </div>

                            <?php if (isset($_SESSION['AdminID'])): ?>
                            <div class="row mt-5">
                                <div class="col">
                                    <a class="btn btn-login me-1" href="./vehicle_update_page.php?VID=<?php echo htmlspecialchars($vehicle['VehicleID']); ?>" role="button">Update</a>
                                    <a class="btn btn-register" href="./vehicle_delete.php?VID=<?php echo htmlspecialchars($vehicle['VehicleID']); ?>" role="button">Delete</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php           
                        endforeach;
                    else: 
            ?>
            <div class="mx-5 p-5">
                <div class="alert alert-dark" role="alert">
                    Search Not Found!
                </div>
            </div>

            <?php   
                    endif;
                else:
                    $querySelect = "SELECT * 
                                    FROM vehicles
                                    ORDER BY VehicleName";
                    $querySelectResult = mysqli_query($Connect_DB, $querySelect);
                    
                    $vehicleArr = mysqli_fetch_all($querySelectResult, MYSQLI_ASSOC); 
                    foreach($vehicleArr as $vehicle): 
            ?>
            <div class="col-xl-6 col-lg-8 col-12 mb-4" data-aos="flip-up">
                <div class="card">
                    <img src="<?php echo "./" . htmlspecialchars($vehicle['VehicleImage']) ?>" class="card-img-top" alt="<?php echo htmlspecialchars($vehicle['VehicleName']); ?>">
                    <div class="card-body">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Name:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['VehicleName']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Model:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['VehicleModel']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Type:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['VehicleType']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Year:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['Year']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Description:</h5>
                                </div>
                                <div class="col-8">
                                    <h5><?php echo htmlspecialchars($vehicle['Description']); ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <h5>Price:</h5>
                                </div>
                                <div class="col-8">
                                    <h5>
                                        <?php 
                                            if (isset($_SESSION['UserID']) || isset($_SESSION['AdminID'])) {
                                                echo "<del>" . htmlspecialchars($vehicle['UnitPrice']) . "</del> " . htmlspecialchars($vehicle['PromotionPrice']);
                                            } else {
                                                echo htmlspecialchars($vehicle['UnitPrice']);
                                            }
                                        ?>
                                    </h5>
                                </div>
                            </div>

                            <?php if (isset($_SESSION['AdminID'])): ?>
                            <div class="row mt-5">
                                <div class="col">
                                    <a class="btn btn-login me-1" href="./vehicle_update_page.php?VID=<?php echo htmlspecialchars($vehicle['VehicleID']); ?>" role="button">Update</a>
                                    <a class="btn btn-register" href="./vehicle_delete.php?VID=<?php echo htmlspecialchars($vehicle['VehicleID']); ?>" role="button">Delete</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>   
                    </div>
                </div>
            </div>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>
    <!-- END OF VEHICLES DISPLAY -->


    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>