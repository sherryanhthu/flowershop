<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>STAFF PRODUCT</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/9ac8be3ee8.js" crossorigin="anonymous"></script>
    <script src="libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>

    <style>
        #btnDel {
            background: var(--main-color);
            border-radius: 10px;
            color: #fff;
            font-size: .8rem;
            padding: .5rem 1rem;
            border: 1px solid var(--main-color);
            cursor: pointer;
            margin-left: 30px;
            transition: .2s;
        }

        #btnDel:hover {
            background: rgb(21, 105, 21);
            color: var(--main-color);
        }
    </style>
</head>
<?php
session_start();
include_once("./connect.php");

$logout = isset($_GET['logout']) ? $_GET['logout'] : false;
if ($logout) {
    unset($_SESSION['user_email']);
    unset($_SESSION['isAdmin']);
    header("Location: index.php");
}

$isAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
$isStaff = isset($_SESSION['isStaff']) ? $_SESSION['isStaff'] : false;
if ($isAdmin || $isStaff) {
} else {
    echo "<script> 
        window.location.href='/flower/login.php';
        </script>";
}

// Them 1 nhanvien
if (isset($_POST['addstaff'])) {
    $msnv = $_POST['msnv'];
    $tennv = $_POST['tennv'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $chucvu = $_POST['chucvu'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];


    // Bat dau them nhanvien
    $sql = "select * from nhanvien where MSNV='$msnv'";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        echo "<script>
                        alert('Nhan vien da ton tai');
                        window.location.href = 'nhanvien.php';
                    </script>";
    } else {
        $sql = "INSERT INTO 
        `nhanvien`(`MSNV`, `HoTenNV`, `Email`, `Password`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES 
        ('$msnv','$tennv','$email','$password','$chucvu','$diachi','$sodienthoai')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Thêm nhân viên thành công');
                    window.location.href = 'nhanvien.php';
                </script>";
        }
    }
}

// Xoa 1 nhan vien
$delete = isset($_GET['delete']) ? $_GET['delete'] : false;
$msnv = isset($_GET['msnv']) ? $_GET['msnv'] : false;

if ($delete) {
    if (mysqli_query($conn, "delete from nhanvien where MSNV='$msnv'")) {
        echo "<script>
                        alert('Xoa nhan vien thanh cong');
                        window.location.href = 'nhanvien.php';
                    </script>";
    }
}
?>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="img/logo.png" alt="logo" height="60px">
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="admin.php"><span class="fas fa-igloo"></span>
                        <span>BẢNG ĐIỀU KHIỂN</span></a>
                </li>
                <li>
                    <a href="product.php"><span class="fas fa-shopping-bag"></span>
                        <span>HÀNG HÓA</span></a>
                </li>
                <li>
                    <a href="customer.php"><span class="fas fa-users"></span>
                        <span>KHÁCH HÀNG</span></a>
                </li>
                <li>
                    <a href="order.php"><span class="fas fa-shopping-bag"></span>
                        <span>ĐƠN HÀNG</span></a>
                </li>
                <li>
                    <a href="nhanvien.php" class="active"><span class="fas fa-shopping-bag"></span>
                        <span>NHÂN VIÊN</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2 style="margin-top: 10px">
                <label for="nav-toggle">
                    <span class="fas fa-bars"> </span>
                </label>
                <span id="dashboard">BẢNG ĐIỀU KHIỂN</span>
            </h2>

            <div class="search-wrapper">
                <span class="fas fa-search"></span>
                <input type="search" placeholder="Search here">
            </div>

            <div class="user-wrapper" style="cursor: pointer;">
                <img src="img/admin/1.jpg" width="30px" height="30px" alt="">
                <div>
                    <h4>Nguyễn Thị Anh Thư</h4>
                    <small>Admin</small>
                </div>
            </div>
            <div id="infoAdmin">
                <a href="#"><i class="fas fa-cog"></i>&nbsp; Setting</a>
                <a href="admin.php?logout=true" onclick="localStorage.clear()"><i class="fas fa-sign-out-alt"></i>&nbsp; Log out</a>
            </div>
            <script>
                let account = document.querySelector("#infoAdmin");
                document.querySelector(".user-wrapper").onclick = () => {
                    account.classList.toggle("active");
                };
            </script>
        </header>

        <main style="font-size: 12px">
            <div class="projects">
                <div class="card">
                    <div class="card-add">
                        <div class="card-header">
                            <h3>Thêm nhân viên</h3>
                        </div>
                        <div class="table-responsive">
                            <form enctype="multipart/form-data" id="themsanpham" method="POST" action="nhanvien.php">
                                <table id="addproduct" width="100%">
                                    <thead>
                                        <td>MSNV</td>
                                        <td>Tên nhân viên</td>
                                        <td>Email</td>
                                        <td>Mật khẩu</td>
                                        <td>Chức vụ</td>
                                        <td>Địa chỉ</td>
                                        <td>Số điện thoại</td>
                                        <td></td>
                                    </thead>
                                    <tbody>

                                        <td><input id="msnv" required maxlength="6" type="text" name="msnv" placeholder=" 6 ký tự"></td>
                                        <td><input required name="tennv" id="tennv" type="text" placeholder=" không rỗng"></td>
                                        <td><input required name="email" id="email" type="text" placeholder=" nhập email"></td>
                                        <td><input required name="password" id="password" type="password" placeholder=" nhập password"></td>
                                        <td><input required name="chucvu" id="chucvu" type="text" placeholder=" nhập chức vụ"></td>
                                        <td><textarea name="diachi" id="diachi" cols="30" rows="10"></textarea></td>
                                        <td><input required name="sodienthoai" id="sdt" type="text" placeholder=" nhập số điện thoại"></td>

                                        <td><button class="my-btn-primary my-btn-primary--2 cart__total-btn" name='addstaff' id="btnAdd" type="submit">Thêm nhân viên</button></td>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3><span class="fas fa-list"></span> <span>Danh sách nhân viên</span> </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%">
                                <thead align="center">
                                    <tr>
                                        <td>STT</td>
                                        <td>MSNV</td>
                                        <td>Tên Nhân Viên</td>
                                        <td>Email</td>
                                        <td>Chức vụ</td>
                                        <td>Địa chỉ</td>
                                        <td>Số điện thoại</td>

                                    </tr>

                                </thead>
                                <tbody class="list" id="list" align="center">
                                    <?php
                                    $sql = "SELECT * FROM nhanvien";
                                    $query = mysqli_query($conn, $sql);
                                    $STT = 0;
                                    while ($rows = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo ++$STT; ?></td>
                                            <td><?php echo $rows['MSNV'] ?></td>
                                            <td><?php echo $rows['HoTenNV'] ?></td>
                                            <td><?php echo $rows['Email'] ?></td>
                                            <td><?php echo $rows['ChucVu'] ?></td>
                                            <td><?php echo $rows['DiaChi'] ?></td>
                                            <td><?php echo $rows['SoDienThoai'] ?></td>
                                            <td>
                                                <!-- <button class="my-btn-primary my-btn-primary--2 cart__total-btn">
                                                    Chỉnh sửa
                                                </button> -->
                                                <!-- <br> -->
                                                <a href="<?php if ($isAdmin == true) {
                                                                $msnv = $rows['MSNV'];
                                                                echo "nhanvien.php?delete=true&msnv=$msnv";
                                                            } else {
                                                                echo "";
                                                            } ?>" style="cursor: <?php if ($isAdmin == true) {
                                                                                        echo "pointer";
                                                                                    } else {
                                                                                        echo "not-allowed";
                                                                                    } ?>;" class="my-btn-primary my-btn-primary--2 cart__total-btn">
                                                    Xóa nhan vien
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    };
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </main>
    </div>

</body>

</html>