<?php

    session_start();
    session_destroy();

    echo "<script>window.alert('You\'ve logged out successfully. Come back soon!');</script>";
    echo "<script>window.location='index.php'</script>";

?>