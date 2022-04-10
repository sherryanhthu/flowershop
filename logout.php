<?php 
    session_start();
    if (isset($_GET['logout'])) {
        unset($_SESSION['user_email']);
        unset($_SESSION['islogin']);
        unset($_SESSION['MSKH']);
        unset($_SESSION['carts']);
        header("Location: index.php");
    }
?>