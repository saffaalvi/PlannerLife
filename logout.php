<?php

    session_start();
    session_unset();
    session_destroy();

    // redirect to homepage
    header('Location: index.php');
    die();

?>
