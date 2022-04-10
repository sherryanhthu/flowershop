<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <title>FlowerShop Register</title>
    
</head>
<?php
ob_start();
session_start();
include_once("./connect.php");

// Random 1 chuoi ngau nhien
function randomId($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $mat_khau = $_POST['password'];
    $re_mat_khau = $_POST['re_password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

 


    $sql = "select * from khachhang WHERE Email='$email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        echo "<script> 
            alert('Tai khoan da ton tai!');
            window.location.href='/flower/register.php';
        </script>"; 
    } else {
        if ($mat_khau != $re_mat_khau) {
            echo "<script> 
            alert('Mật khẩu không trùng khớp!');
            window.location.href='/flower/register.php';
        </script>"; 
        } else {
            $MSKH = randomId(10);
            $password_hash = md5($mat_khau);
            $sql = "INSERT INTO `khachhang`(`MSKH`, `HoTenKH`, `Email`, `Password`, `DiaChi`, `SoDienThoai`) 
            VALUES ('$MSKH','$name','$email','$password_hash','$address','$phone')";
            mysqli_query($conn, $sql);
            echo "<script> 
            alert('Đăng ký thành công');
            window.location.href='/flower/login.php';
        </script>";
        }
    };
    
}

?>
<body>
    <a href="index.html"><img id="logoEco" src="img/logo.png" alt=""></a>
    <div class="container" style="max-width:800px;width:800px">
        <form class="form" id="createAccount" method="POST" action="register.php">
            <h1 class="form-title">ĐĂNG KÝ</h1>
            <div class="form-message form-error"></div>
            <div class="form-input-group">
                <label for="fullname" class="form-label">Họ và tên *</label>
                <input required  type="text" id="signupUsername" name="name" class="form-input" autofocus placeholder="Nhập họ tên của bạn">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="signupEmail" class="form-label">Email *</label>
                <input required type="email" id="signupEmail" name="email" class="form-input" autofocus placeholder="Email">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="signupPassword" class="form-label">Mật khẩu *</label>
                <input required  type="password" id="signupPassword" name="password" class="form-input" autofocus placeholder="Mật khẩu">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="signupPassword2" class="form-label">Nhập lại mật khẩu *</label>
                <input required  type="password" id="signupPassword2" name="re_password" class="form-input" autofocus placeholder="Nhập lại mật khẩu">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="signupPassword2" class="form-label">Địa chỉ *</label>
                <input required  type="text" id="address" class="form-input" name="address" autofocus placeholder="Địa chỉ">
                <div class="form-input-error-message"></div>
            </div>
            <div class="form-input-group">
                <label for="signupPassword2" class="form-label">Số điện thoại *</label>
                <input required type="text" id="phone" class="form-input" name="phone" autofocus placeholder="Số điện thoại">
                <div class="form-input-error-message"></div>
            </div>
            <button class="form-button" type="submit">Đăng ký</button>
            <p class="form-text">
                <a href="./login.php" class="form-link" id="linkLogin">Bạn đã có tài khoản chưa? Đăng nhập</a>
            </p>
        </form>
    </div>

   
</body>
</html>