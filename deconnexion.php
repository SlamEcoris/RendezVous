<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    unset($_SESSION);
    unset($_COOKIE);
    header ("location: index.php");
    exit;
?>