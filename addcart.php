<?php
session_start();
include_once('./connect.php');
$MSHH = $_GET["MSHH"];
$sql = "select * from hanghoa where MSHH='$MSHH'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if($row['SoLuongHang'] == 0){
    echo "<script> 
            alert('het hang!');
            window.location.href='/flower/index.php';
    </script>";
}else{

    if (isset($_SESSION['carts'][$MSHH])) {
        if($_SESSION['carts'][$MSHH] + 1 > $row['SoLuongHang']){
            echo "<script> 
                alert('vuot!');
                window.location.href='/flower/index.php';
        </script>";
        }else {
            $_SESSION['carts'][$MSHH] = $_SESSION['carts'][$MSHH] + 1;
            //     echo "<script> 
            //         alert('Đặt hàng thành công!');
            // </script>";
            header("location: ProductsPageDetail.php?detail=$MSHH");
        }
    } else {
        $_SESSION['carts'][$MSHH] = 1;
        header("location: ProductsPageDetail.php?detail=$MSHH");
    }
    
}
