<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <title>FlowerShop LogIn</title>

    </script>
    <?php
    include_once('./connect.php');
    session_start();

    if (isset($_SESSION['islogin'])) {
        echo "<script> 
        window.location.href='/flower/index.php';
    </script>";
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $mat_khau = $_POST['password'];
        $mat_khau_hash = md5($mat_khau);

        // Admin
        if ($email == 'admin@gmail.com' && $mat_khau == 'admin') {
            $_SESSION['user_email'] = $email;
            $_SESSION['isAdmin'] = true;
            header('location: admin.php');
        }

        // Nhan vien
        $sql_nv = "SELECT * FROM NHANVIEN WHERE EMAIL='$email' AND PASSWORD='$mat_khau'";
        $query_nv = mysqli_query($conn, $sql_nv);
        $rows = mysqli_num_rows($query_nv);
        if ($rows != 0) {
            $_SESSION['user_email'] = $email;
            if ($row = mysqli_fetch_assoc($query_nv)) {
                $_SESSION['MSNV'] = $row['MSNV'];
            }
            $_SESSION['isStaff'] = true;
            header('location: admin.php');
        }

        // Khach hang
        $sql = "SELECT * FROM KHACHHANG WHERE EMAIL='$email' AND PASSWORD='$mat_khau_hash'";
        $query = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows == 0) {
            echo "<script> 
            alert('Sai tài khoản hoặc sai mật khẩu. Vui lòng nhập lại!!');
            window.location.href='/flower/login.php';
        </script>";
        } else {
            $_SESSION['user_email'] = $email;
            if ($row = mysqli_fetch_assoc($query)) {
                $_SESSION['MSKH'] = $row['MSKH'];
            }
            $_SESSION['islogin'] = true;
            header('location: index.php');
        }
    }

    ?>
</head>

<body>
    <a href="index.html"><img id="logoEco" src="img/logo.png" alt=""></a>
    <div class="container">
        <form name="loginForm" action="#" method="post" id="login" class="form" enctype="application/x-www-form-urlencoded" action="login.php">
            <h1 class="form-title">ĐĂNG NHẬP</h1>

            <!-- <div class="form-message form-error"></div> -->
            <div class="form-input-group">
                <label for="fullname" class="form-label">Email *</label>
                <input required type="text" id="fullname" name="email" class="form-input" autofocus placeholder="Nhập username hoặc email của bạn">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="psw" class="form-label">Mật khẩu *</label>
                <input required type="password" id="psw" name="password" class="form-input" autofocus placeholder="Mật khẩu">
                <div class="form-input-error-message"></div>
            </div>
            <button class="form-button" type="submit">Tiếp tục</button>
            <p class="form-text">
                <a href="#" class="form-link">Bạn quên mật khẩu?</a>
            </p>
            <p class="form-text">
                <a href="./register.php" class="form-link" id="linkCreateAccount">Bạn không có tài khoản? Tạo tài khoản</a>
            </p>
        </form>
    </div>


</body>

</html>