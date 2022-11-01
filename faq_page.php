<?php

    session_start();
    include('./config/connect.php');
    
    // CHECKING POST METHOD SEND MESSAGE
    if (isset($_POST['SendBtn'])) {

        $userID = mysqli_real_escape_string($Connect_DB, $_SESSION['UserID']);
        $contactEmail = mysqli_real_escape_string($Connect_DB, $_SESSION['ContactEmail']);
        $contactSubject = mysqli_real_escape_string($Connect_DB, $_SESSION['ContactSubject']);
        $contactMessage = mysqli_real_escape_string($Connect_DB, $_SESSION['ContactMessage']);

        // CONTACT INSERT QUERY
        $queryInsert = "INSERT INTO contact(UserID, Email, Subject, Message)
                        VALUES ('$userID', '$contactEmail', '$contactSubject', '$contactMessage')";

        // CONTACT INSERT QUERY RESULT
        $queryInsertResult = mysqli_query($Connect_DB, $queryInsert);

        if ($queryInsertResult) {
            echo "<script>window.alert('Message has successfully sent!');</script>";
            echo "<script>window.location='contact_history_page.php';</script>";
            unset($_SESSION['ContactSubject']);
            unset($_SESSION['ContactMessage']);
        } else {
            echo "<script>window.alert('You need to login first!');</script>";
            echo "<script>window.location='user_login_page.php';</script>";
            unset($_SESSION['ContactSubject']);
            unset($_SESSION['ContactMessage']);
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

    <title>DRIVERLESS FAQ Page</title>

    <!-- BOOTSTRAP CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- HEADER -->
    <?php include('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- FAQ -->
    <div class="container p-5">
        <?php if (isset($_SESSION['ContactSubject'])): ?>
        <div class="text-start text-danger my-4">Before you final submission, you can look for here:</div>
        <?php endif; ?>

        <h1 class="text-start my-4">FREQUENTLY ASKED QUESTIONS</h1>

        <div class="accordion" id="FAQ-Accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        What is Driverless?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#FAQ-Accordion">
                    <div class="accordion-body py-4">
                        Driverless was founded in 2018, to develop self-driving technology that will make getting around cities safe, easy, and enjoyable for all. To achieve that goal, we partner with the world’s leading automakers to build self-driving vehicles for deployment in ride hailing and goods delivery services.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What are we developing?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#FAQ-Accordion">
                    <div class="accordion-body py-4">
                        We put safety first in the development of a production-quality self-driving system — which is the software, hardware (sensors and compute), maps, and cloud support infrastructure that powers self-driving vehicles. Working together with leading automakers, we integrate our self-driving system into their vehicles so that they can be manufactured at scale.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        What do you mean by “self-driving vehicles”?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#FAQ-Accordion">
                    <div class="accordion-body py-4">
                        When we say “self-driving vehicles,” we mean vehicles intended to operate by themselves, without human driver intervention, within a given set of parameters, such as geographical boundaries and environmental conditions. This is otherwise known by the Society of Automotive Engineers (SAE) as Level 4 automation.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Can I provide feedback on how the cars drive on the road?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#FAQ-Accordion">
                    <div class="accordion-body py-4">
                        Your feedback is important to us. If you've seen us on the road and would like to provide feedback on how we drive, please <a href="./contact_page.php">contact us</a> and tell us about your experience.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        When will self-driving vehicles with AI technology be available in my city?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#FAQ-Accordion">
                    <div class="accordion-body py-4">
                        We will be responsible for the commercial services that utilize AI’s self-driving system. Together, we will introduce self-driving vehicles to new cities gradually and deliberately, through community engagement, public awareness, and relationships with local and state government.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        What sort of weather can self-driving vehicles handle?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#FAQ-Accordion">
                    <div class="accordion-body py-4">
                        In the current state of technology, some weather conditions, such as hail, heavy rain, and falling snow, can impact the perception capabilities of self-driving systems. If we encounter conditions that affect our system in any way, our trained Test Specialists disengage from autonomous mode and drive the vehicle manually. It is in our roadmap to find solutions to operating in specific weather conditions, based on the business needs and operating domains in which we plan to launch.
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['ContactSubject'])): ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="my-5 text-center">
                <button type="submit" name="SendBtn" id="form-submit" class="filled-button">Send Message</button>
            </div>
        </form>
        <?php endif; ?>
    </div>
    <!-- END OF FAQ -->


    <!-- FOOTER -->
    <?php include('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>