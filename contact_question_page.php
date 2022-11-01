<?php

    session_start();
    include('./config/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DRIVERLESS Contact Questions Page</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/icons/font/bootstrap-icons.css">

    <!-- ADDITIONAL CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/aos.css">

</head>

<body>

    <!-- HEADER -->
    <?php include('./header/header.php'); ?>
    <!-- END OF HEADER -->


    <!-- CONTACT MESSAGES -->
    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="table-responsive" data-aos="fade-up">
            <table class="table table-hover caption-top">
                <caption style="font-size: 23px;">Contact Questions from Users</caption>
                
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
                        // CONTACT SELECT QUERY
                        $queryContactSelect =  "SELECT *
                                                FROM contact
                                                ORDER BY ContactID";
                        
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

                            // ANSWER INSERT QUERY RESULT
                            $queryAnswerSelectResult = mysqli_query($Connect_DB, $queryAnswerSelect);
                            
                            $countAnswer = mysqli_num_rows($queryAnswerSelectResult);
                            $answerArray = mysqli_fetch_all($queryAnswerSelectResult, MYSQLI_ASSOC); 
                            
                            if ($countAnswer > 0):
                                foreach($answerArray as $answer):
                                    if (!empty($answer['Answer'])):
                        ?>
                        <td class="py-4 px-3"><?php echo htmlspecialchars($answer['Answer']); ?></td>
                        
                        <?php else: ?>
                        <td class="py-4 px-3"><a href="contact_reply_page.php?CID=<?php echo htmlspecialchars($contactArray[$i]['ContactID']); ?>" class="btn btn-register" name="ReplyBtn">Reply</a></td>
                        
                        <?php   
                                    endif;
                                endforeach;
                            else:
                        ?>
                        <td class="py-4 px-3"><a href="contact_reply_page.php?CID=<?php echo htmlspecialchars($contactArray[$i]['ContactID']); ?>" class="btn btn-register" name="ReplyBtn">Reply</a></td>
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