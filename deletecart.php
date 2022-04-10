
<?php
session_start();
$MSHH = $_GET["MSHH"];
unset($_SESSION['carts'][$MSHH]);

if (count($_SESSION['carts']) == 0) {
    unset($_SESSION['carts']);
}

header("location: cart.php");
?>

