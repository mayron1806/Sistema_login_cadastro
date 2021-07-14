<?php
    session_start();
    session_destroy();
    header('location: http://localhost:8080/index.php');
?>