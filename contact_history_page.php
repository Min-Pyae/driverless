<?php

    session_start();
    include('./config/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Contact History Page</title>

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


    <!-- CONTACT MESSAGES -->
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 140px; margin-bottom: 140px;">
        <div class="table-responsive" data-aos="fade-up">
            <table class="table table-hover caption-top">
                <caption style="font-size: 23px;">Contact History</caption>

                <thead>
                    <tr>
                        <th scope="col" class="py-4 px-3">No.</th>
                        <th scope="col" class="py-4 px-3">Email</th>
                        <th scope="col" class="py-4 px-3">Subject</th>
                        <th scope="col" class="py-4 px-3">Message</th>
                        <th scope="col" class="py-4 px-3">Reply</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $userID = mysqli_real_escape_string($Connect_DB, $_SESSION['UserID']);
                        
                        // CONTACT SELECT QUERY
                        $queryContactSelect =  "SELECT *
                                                FROM contact
                                                WHERE UserID = '$userID'";
                        
                        // CONTACT SELECT QUERY RESULT
                        $queryContactSelectResult = mysqli_query($Connect_DB, $queryContactSelect);
                        
                        $countContact = mysqli_num_rows($queryContactSelectResult);
                        $contactArray = mysqli_fetch_all($queryContactSelectResult, MYSQLI_ASSOC); 
                    
                        if ($countContact > 0):
                            for($i = 0; $i < count($contactArray); $i++): 
                    ?>
                    <tr>
                        <th scope="row" class="py-4 px-3"><?php echo htmlspecialchars($i + 1); ?></th>
                        <td class="py-4 px-3"><?php echo htmlspecialchars($contactArray[$i]['Email']); ?></td>
                        <td class="py-4 px-3"><?php echo htmlspecialchars($contactArray[$i]['Subject']); ?></td>
                        <td class="py-4 px-3"><?php echo htmlspecialchars($contactArray[$i]['Message']); ?></td>
                        <?php 
                            $contactID = htmlspecialchars($contactArray[$i]['ContactID']);
                            
                            // ANSWER SELECT QUERY
                            $queryAnswerSelect =   "SELECT *
                                                    FROM answer 
                                                    WHERE ContactID = '$contactID'";
                            
                            // ANSWER SELECT QUERY RESULT
                            $queryAnswerSelectResult = mysqli_query($Connect_DB, $queryAnswerSelect);
                            
                            $countAnswer = mysqli_num_rows($queryAnswerSelectResult);
                            $answerArray = mysqli_fetch_all($queryAnswerSelectResult, MYSQLI_ASSOC); 
                            
                            if ($countAnswer > 0):
                                foreach($answerArray as $answer):
                        ?>
                        <td class="py-4 px-3"><?php echo htmlspecialchars($answer['Answer']); ?></td>
                        
                        <?php 
                                endforeach;
                            else:
                        ?>
                        <td class="py-4 px-3"><?php echo "Not Replied yet"; ?></td>
                        <?php endif; ?>
                    </tr>
                    <?php          
                            endfor;
                        endif;
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- END OF CONTACT MESSAGES -->


    <!-- FOOTER -->
    <?php include('./footer/footer.php'); ?>
    <!-- END OF FOOTER -->

</body>

</html>