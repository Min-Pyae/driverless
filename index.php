<?php

    session_start();

    // CHECKING GET METHOD SEARCH VEHICLES
    if (isset($_GET['SearchBtn'])) {
        $_SESSION['VehicleNameSearch'] = $_GET['VehicleNameSearch'];
        header('Location:vehicle_display_page.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Home Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/fontawesome.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/css/aos.css?v=<?php echo time(); ?>">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>

    <!-- HEADER -->
    <?php include('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- BANNER -->
    <div class="header-text" id="main-banner">
        <div class="Modern-Slider">

            <!-- ITEM 1 -->
            <div class="item item-1">
                <div class="img-fill">
                    <div class="text-content">
                        <h5>Welcome to DRIVERLESS</h5>
                        <h4>Explore Your <br> Driverless Dream Car</h4>
                        <p>We're creating new modern world Driverless Technology. They’re safe, shared, and all-electric. Join us as we transform the future of transportation.</p>
                        <a class="btn filled-button" href="./vehicle_display_page.php" role="button">Explore More</a>
                    </div>
                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="item item-2">
                <div class="img-fill">
                    <div class="text-content">
                        <h5>Meet the DRIVERLESS vehicle system</h5>
                        <h4>AUTOMATED DRIVING</h4>
                        <p>Driverless's self-driving system is designed with a backbone of a camera-centric configuration building a robust system that can drive solely.</p>
                        <a class="btn filled-button" href="#about" role="button">About Us</a>
                    </div>
                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="item item-3">
                <div class="img-fill">
                    <div class="text-content">
                        <h5>Driving change in how we live</h5>
                        <h4>Most trusted Company</h4>
                        <p>Intelligent technologies are changing the way we choose cars, plan travels and perceive mobility. You can believe in our technolgy and don't miss special chances.</p>
                        <a class="btn filled-button" href="./contact_page.php" role="button">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END OF BANNER -->


    <!-- EVENT PROMOTION -->
    <?php if (isset($_SESSION['UserID'])): ?>
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

        </div>
    </div>
    <?php endif; ?>
    <!-- END OF EVENT PROMOTION -->


    <!-- PRODUCT RECOMMENDATIONS -->
    <div class="recommendations">
        <div class="container">

            <!-- SEARCH ENGINE OPTIMISATION -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <div class="d-flex m-3 m-lg-5 p-lg-5 p-3" data-aos="zoom-in">
                    <input class="form-control input me-1" name="VehicleNameSearch" type="search" placeholder="Search..." aria-label="Search">
                    <button name="SearchBtn" class="btn btn-search" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <!-- END OF SEARCH ENGINE OPTIMISATION -->


            <div class="row justify-content-center align-items-center p-5">
                <div class="col-md-12" data-aos="fade-up">
                    <div class="section-heading">
                        <h2>Recommended <em>Vehicles</em></h2>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-6 col-md-10 mb-4 recommendation-item" data-aos="fade-right">
                    <div class="card">
                        <img src="./VehicleImages/product-1.jpg" class="card-img" alt="BMW i Next image">
                        <div class="card-body">
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h5>Name:</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>BMW i Next</h5>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h5>Model:</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>i Next<h5>
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
                                                    echo "<del>$135,000</del> $114,750";
                                                } else {
                                                    echo "$135,000";
                                                }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <a href="./vehicle_display_page.php" class="btn filled-button">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-6 col-md-10 mb-4 recommendation-item" data-aos="fade-up">
                    <div class="card">
                        <img src="./VehicleImages/product-3.jpg" class="card-img" alt="Nio Eve image">
                        <div class="card-body">
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h5>Name:</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>Nio Eve</h5>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h5>Model:</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>Eve</h5>
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
                                                    echo "<del>$95,000</del> $80,750";
                                                } else {
                                                    echo "$95,000";
                                                }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <a href="./vehicle_display_page.php" class="btn filled-button">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-6 col-md-10 mb-4 recommendation-item" data-aos="fade-left">
                    <div class="card">
                        <img src="./VehicleImages/product-5.jpg" class="card-img" alt="Tesla Model X image">
                        <div class="card-body">
                            <div class="container">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h5>Name:</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>Tesla Model X</h5>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-4">
                                        <h5>Model:</h5>
                                    </div>
                                    <div class="col-8">
                                        <h5>Model X</h5>
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
                                                    echo "<del>$80,000</del> $68,000";
                                                } else {
                                                    echo "$80,000";
                                                }
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <a href="./vehicle_display_page.php" class="btn filled-button">View Details</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- END OF PRODUCT RECOMMENDATIONS -->


    <!-- EVENT COUNTDOWN -->
    <div class="event" data-aos="fade-down">
        <div class="event-countdown">
            <a href="https://logwork.com/countdown-qc3n" class="countdown-timer" data-style="circles" data-timezone="Europe/London" data-textcolor="#ffffff" data-date="2021-12-31 11:31" data-background="#ff0000" data-digitscolor="#ffffff" data-unitscolor="#ffffff">
                World Largest Year End Technology Conference
            </a>

            <div class="container my-5 text-center">
                <h1>31 December 2021</h1>
            </div>
        </div>
        <br>

        <p></p>
    </div>
    <!-- END OF EVENT COUNTDOWN -->


    <!-- ABOUT US -->
    <div id="about">
        <div class="container">
            <div class="row p-5">
                <div class="col-lg-6 mb-3" data-aos="fade-right">
                    <img src="assets/images/about-image-1.jpg" class="img-fluid" alt="company image">
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span>Who we are</span>
                    <h2>Get to know about <em>our company</em></h2>
                    <p>Driverless was launched in 1999 with the belief that vision-safety technology will make our roads safer, reduce traffic congestion and save lives. With a cutting edge team of more than 1,700 employees.</p>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 100px;">
            <div class="row p-5">
                <div class="col-lg-6" data-aos="fade-right"> 
                    <span>Moving lives in a new direction</span>
                    <h2>Get to know about <em>our technology</em></h2>
                    <p>We're designing autonomous technology, to give people a new kind of freedom – to go where they want, when they want, while making the frustrations and concerns with driving a thing of the past</p>
                </div>    
                <div class="col-lg-6" data-aos="fade-left">
                    <iframe width="100%" height="350" src="https://www.youtube.com/embed/tlThdr3O5Qo?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>                                
            </div>
        </div>

        <div class="container" style="margin-top: 140px;">
            <h2>How <em>Technology</em> works</h2>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="./assets/images/about-image-2.jpeg" height="350px" width="100%" alt="Driverless technology image">
                    <p class="mt-3">Highly-detailed 3D maps offer safety redundancy and street-level knowledge, like speed limits and the locations of traffic signs.Using sensor data, the Argo Self-Driving System predicts and plans the vehicle’s actions, factoring in the paths of other road users.</p>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <img src="./assets/images/about-image-3.jpg"  height="350px" width="100%" alt="Driverless technology image">
                    <p class="mt-3">A suite of lidar, radar, and camera sensors provide a detailed view of the vehicle’s surroundings more than 400 meters in all directions. AI technology directs the engine, braking, and steering so that the vehicle moves safely and naturally, like an experienced local driver.</p>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 50px;">
            <h2>What the <em>self-driving system</em> can see</h2>
            <div class="row">
                <div class="col" data-aos="fade-left">
                    <img src="./assets/images/self-driving-system.gif" width="100%" alt="self-driving system gif">
                </div>
            </div>
        </div>
    </div>
    <!-- END OF ABOUT US -->


    <!-- MORE INFO -->
    <div id="more-info">
        <div class="container">
            <div class="section-heading" data-aos="fade-right">
                <h2>Relevant <em>Newsfeeds</em></h2>
                <span>The latest news</span>
            </div>

            <div class="row p-5" id="tabs">
                <div class="col-lg-4 mb-5" data-aos="zoom-in">
                    <ul>
                        <li>
                            <a href='#tabs-1'>Addressing transit mobility gaps: What Waymo, Valley Metro and ASU learned from serving paratransit riders and seniors
                                <br>
                                <small>The Waymo Team &nbsp;|&nbsp; August 31, 2021</small></a>
                        </li>
                        <li>
                            <a href='#tabs-2'> Walmart to Test Self-Driving Delivery Service With Ford and Argo AI
                                <br>
                                <small>Forbes &nbsp;|&nbsp; September 15, 2021</small></a>
                        </li>
                        <li>
                            <a href='#tabs-3'>VW’s Self-Driving Partner Closing In on German Public Road Tests
                                <br>
                                <small>Bloomberg &nbsp;|&nbsp; September 5, 2021</small></a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="assets/images/blog-image-1.png" alt="blog-image-1">
                            <h4>Addressing transit mobility gaps: What DRIVERLESS, Waymo and ASU learned from serving paratransit riders and seniors</h4>
                            <p>In 2018, we shared our plans to work with Valley Metro, the Phoenix Metro area’s regional public transportation authority, to explore mobility solutions in a first-of-its-kind study that would use autonomous driving technology to complement the city’s existing transit network.</p>
                            <br>
                            <div class="text-start">
                                <a href="https://blog.waymo.com/2021/08/addressing-transit-mobility-gaps-what.html" class="btn filled-button">
                                    Read More
                                </a>
                            </div>
                            <br>
                        </article>

                        <article id='tabs-2'>
                            <img src="assets/images/blog-image-2.jpg" alt="blog-image-2">
                            <h4>Walmart to Test Self-Driving Delivery Service With Ford and Argo A</h4>
                            <p>Walmart Inc. is working with Ford Motor Co. and Argo AI to start testing an autonomous-vehicle delivery service in three U.S. cities as the big-box retailer’s consumers continue to favor deliveries within the same or next day.</p>
                            <br>
                            <div class="text-start">
                                <a href="https://www.wsj.com/articles/walmart-joins-ford-and-argo-ai-to-pilot-self-driving-delivery-service-11631710243" class="btn filled-button">
                                    Read More
                                </a>
                            </div>
                            <br>
                        </article>

                        <article id='tabs-3'>
                            <img src="assets/images/blog-image-3.jpg" alt="blog-image-3">
                            <h4>VW’s Self-Driving Partner Closing In on German Public Road Tests</h4>
                            <p>Volkswagen AG’s partner developing self-driving technology is just a few months away from starting to test autonomous vehicles on public roads in Germany.</p>
                            <br>
                            <div class="text-start">
                                <a href="https://www.bloomberg.com/news/articles/2021-09-05/vw-s-self-driving-partner-closing-in-on-german-public-road-tests?sref=XI3YXT2F" class="btn filled-button">
                                    Read More
                                </a>
                            </div>
                            <br>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF MORE-INFO -->


    <!-- FOOTER -->
    <?php include('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>