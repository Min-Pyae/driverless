<?php 

    session_start();

    $userName = '';
    if (isset($_SESSION['UserName'])) {
        $userName = $_SESSION['UserName'];
    }
	
    // CHECKING POST METHOD SEND MESSAGE
    if (isset($_POST['SendBtn'])) {

        $_SESSION['ContactEmail'] = $_POST['Email'];
        $_SESSION['ContactSubject'] = $_POST['Subject'];
        $_SESSION['ContactMessage'] = $_POST['Message'];
        
        header('Location:faq_page.php');
    } 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Contact Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/fontawesome.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/aos.css">
    
</head>

<body>

    <!-- HEADER -->
    <?php include('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- CONTACT PAGE HEADING -->
    <div class="contact-page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                    <h2>Thanks for your interest in DRIVERLESS!</h2>
                    <span>Have questions? Visit our <a href="./faq_page.php">FAQs</a>. If can't find, Feel free to send us a message!</span>
                    <span>If you've sent message before, You can look your questions and our reply <a href="./contact_history_page.php">Here</a>.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CONTACT PAGE HEADING -->


    <!-- CONTACT INFORMATION -->
    <div class="contact-information">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="flip-up">
                    <div class="contact-item">
                        <i class="fa fa-phone"></i>
                        <h4>Phone</h4>
                        <a href="#">+1 656 8080 5566</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="flip-up">
                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <h4>Email</h4>
                        <a href="#">driverless@gmail.com</a>
                    </div>
                </div>

                <div class="col-md-4" data-aos="flip-up">
                    <div class="contact-item">
                        <i class="fa fa-map-marker"></i>
                        <h4>Location</h4>
                        <a href="#">East 117th Street, New York, USA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CONTACT INFORMATION -->


    <!-- CONTACT FORM -->
    <div class="callback-form contact-us" style="margin-top: 140px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-right">
                    <div class="section-heading">
                    <h2>Send us a <em>message</em></h2>
                    <span>If you've sent message before, You can look your questions and our reply <a href="./contact_history_page.php">Here</a>.</span>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="contact-form">
                        <form id="contact" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <label class="d-flex mb-2" for="FullName">Username:</label>
                                    <input name="FullName" type="text" class="form-control" id="FullName" value="<?php echo htmlspecialchars($userName); ?>" placeholder="Full Name" required>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <label class="d-flex mb-2" for="Email">Email:</label>
                                    <input name="Email" type="text" class="form-control" id="Email" placeholder="Enter your Email Address" required>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <label class="d-flex mb-2" for="Subject">Subject:</label>
                                    <input name="Subject" type="text" class="form-control" id="Subject" placeholder="Enter Subject" required>    
                                </div>

                                <div class="col-lg-12">
                                    <label class="d-flex mb-2" for="FullName">Message:</label>
                                    <textarea name="Message" rows="6" class="form-control" id="Message" placeholder="Enter your Message" required></textarea> 
                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" name="SendBtn" id="form-submit" class="filled-button">Send Message</button>   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CONTACT FORM -->


    <!-- GOOGLE MAP -->
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3020.3781089386425!2d-73.93947818525923!3d40.79768424030723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2f6087f148d4d%3A0x5a3264cfebe8f3cc!2sE%20117th%20St%2C%20New%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2smm!4v1634739835969!5m2!1sen!2smm" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!-- END OF GOOGLE MAP -->


    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>