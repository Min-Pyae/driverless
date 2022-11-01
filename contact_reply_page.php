<?php 

    session_start();
    include('./config/connect.php');

    $contactID = $_REQUEST['CID'];

    // CONTACT SELECT QUERY
    $queryContactSelect =  "SELECT * FROM contact 
                            WHERE ContactID = '$contactID'";

    // CONTACT SELECT QUERY RESULT
    $queryContactSelectResult = mysqli_query($Connect_DB, $queryContactSelect);
    
    $contactArray = mysqli_fetch_array($queryContactSelectResult);

    $userID = $contactArray['UserID'];
    $email = $contactArray['Email'];
    $contactsubject = $contactArray['Subject'];
    $contactquestion = $contactArray['Message'];
    
    if (isset($_POST['ReplyBtn'])) {
        $adminID = mysqli_real_escape_string($Connect_DB, $_SESSION['AdminID']);
        $answer = mysqli_real_escape_string($Connect_DB, $_POST['Reply']);
        
        // ANSWER INSERT QUERY
        $queryAnswerInsert =   "INSERT INTO answer (Answer, AdminID, ContactID) 
                                VALUES ('$answer', '$adminID', '$contactID')";

        // ANSWER INSERT QUERY RESULT
        $queryAnswerInsertResult = mysqli_query($Connect_DB, $queryAnswerInsert);

        if ($queryAnswerInsertResult) {
            echo "<script>window.alert('You\'ve replied successfully!')</script>";
            echo "<script>window.location='contact_question_page.php'</script>";
        } else {
            echo "<script>window.alert('Reply Fails!')</script>";
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

    <title>DRIVERLESS Contact Reply Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
</head>
     
    <!-- HEADER -->
    <?php include ('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- CONTACT FORM -->
    <div class="callback-form contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12" data-aos="fade-right">
                    <div class="section-heading">
                    <h2>Reply <em>message</em></h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="contact-form">
                        <form id="contact" action="contact_reply_page.php?CID=<?php echo htmlspecialchars($contactID); ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <label class="d-flex mb-2">UserID:</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($userID); ?>" disabled>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <label class="d-flex mb-2" for="name">Email:</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($email); ?>" disabled>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <label class="d-flex mb-2">Subject:</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($contactsubject); ?>" disabled>
                                </div>

                                <div class="col-lg-12">
                                    <label class="d-flex mb-2">Message:</label>
                                    <textarea rows="6" class="form-control" disabled><?php echo htmlspecialchars($contactquestion); ?></textarea>
                                </div>

                                <div class="col-lg-12">
                                    <label class="d-flex mb-2" for="Reply">Reply:</label>
                                    <textarea name="Reply" rows="6" class="form-control" id="Reply"></textarea>
                                </div>

                                <div class="col-lg-12"> 
                                    <button type="submit" name="ReplyBtn" class="filled-button">Reply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF CONTACT FORM -->


    <!-- FOOTER -->
    <?php include ('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>