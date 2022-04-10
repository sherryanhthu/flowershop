<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>ADMIN PRODUCT</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">

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

$isAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
$isStaff = isset($_SESSION['isStaff']) ? $_SESSION['isStaff'] : false;
if ($isAdmin || $isStaff) {
} else {
    echo "<script> 
        window.location.href='/flower/login.php';
        </script>";
}

$mshh = isset($_GET['mshh']) ? $_GET['mshh'] : "";
$sql = "SELECT * FROM hanghoa WHERE MSHH='$mshh'";
$query = mysqli_query($conn, $sql);
function randomId($n)
{
    $characters = '0123456789abcxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
if (isset($_POST['updateproduct'])) {
    $tenhh = $_POST['tenhh'];
    $loaisp = $_POST['loaisp'];
    $gia = $_POST['gia'];
    $soluong = $_POST['soluong'];
    $chitietsp = $_POST['chitietsp'];
    $ghichu = $_POST['ghichu'];
    // Xu ly anh
    $target_dir = "img/products";
    $target_file = "";
    $file_name =  "";
    $sql = "SELECT * FROM hanghoa WHERE MSHH='$mshh'";
    $query = mysqli_query($conn, $sql);

    $sql_anh_delete = "SELECT * FROM hinhhh WHERE MSHH='$mshh'";
    $query_anh_delete = mysqli_query($conn, $sql_anh_delete);

    $upload_ok = true;

    // Duyet qua tung anh
    if (!empty(array_filter($_FILES['anh']['name']))) {
        $countfiles = count($_FILES['anh']['name']);
        for ($i = 0; $i < $countfiles; $i++) {
            if (isset($_FILES['anh']['name'][$i])) {

                $tenHinh = $_FILES['anh']['name'][$i];

                switch ($loaisp) {
                    case "1": {
                            $target_file = $target_dir . "/HoaCamChuong/" .  basename($_FILES["anh"]["name"][$i]);
                            $file_name =  "HoaCamChuong/" . basename($_FILES["anh"]["name"][$i]);
                            break;
                        }
                    case "3": {
                            $target_file = $target_dir . "/HoaHuongDuong/" .  basename($_FILES["anh"]["name"][$i]);
                            $file_name =  "HoaHuongDuong/" . basename($_FILES["anh"]["name"][$i]);
                            break;
                        }
                    case "5": {
                            $target_file = $target_dir . "/HoaThuyTien/" .  basename($_FILES["anh"]["name"][$i]);
                            $file_name =  "HoaThuyTien/" . basename($_FILES["anh"]["name"][$i]);
                            break;
                        }
                    case "6": {
                            $target_file = $target_dir . "/XuongRong/" .  basename($_FILES["anh"]["name"][$i]);
                            $file_name =  "XuongRong/" . basename($_FILES["anh"]["name"][$i]);
                            break;
                        }
                    case "4": {
                            $target_file = $target_dir . "/HoaHong/" .  basename($_FILES["anh"]["name"][$i]);
                            $file_name =  "HoaHong/" . basename($_FILES["anh"]["name"][$i]);
                            break;
                        }
                    case "2": {
                            $target_file = $target_dir . "/HoaDongTien/" .  basename($_FILES["anh"]["name"][$i]);
                            $file_name =  "HoaDongTien/" . basename($_FILES["anh"]["name"][$i]);
                            break;
                        }
                }

                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $is_exist = false;

                // kiem tra anh co chon hay chua
                if ($_FILES['anh']['name'][$i] == '') {
                    echo "<script>
                            alert('Ảnh không được để trống!');
                        </script>";
                    $upload_ok = false;
                }

                // Kiem tra file co ton tai hay chua neu ton tai thi ko luu anh
                if (file_exists($target_file)) {
                    $is_exist = true;
                }

                // Kiem do size
                if ($_FILES['anh']['size'][$i] > 1024 * 1024) { // 1Mb
                    echo "<script>
                            alert('Size ảnh không được quá 1MB');
                        </script>";
                    $upload_ok = false;
                }

                //Kiem tra type
                if ($imageFileType != 'jpg' and $imageFileType != "png" and $imageFileType != "jpeg") {
                    echo "<script>
                            alert('Định dạnh file không hợp lệ');
                        </script>";
                    $upload_ok = false;
                }

                if ($upload_ok == true) {
                    while ($rows_anh = mysqli_fetch_array($query_anh_delete)) {
                        $MaHinh = $rows_anh['MaHinh'];
                        $sql_anh_delete = "DELETE FROM `hinhhh` WHERE MaHinh='$MaHinh'";
                        mysqli_query($conn, $sql_anh_delete);
                    }
                }

                if ($is_exist == false) {
                    if ($upload_ok == true) {
                        echo '123';
                        if (move_uploaded_file($_FILES["anh"]["tmp_name"][$i], $target_file)) {
                            $MaHinh = randomId(11);
                            $sql = "INSERT INTO `hinhhh`(`MaHinh`, `Anh`, `TenHinh`, `MSHH`) VALUES ('$MaHinh','$file_name','$tenHinh','$mshh')";
                            mysqli_query($conn, $sql);
                        }
                    }
                } else {
                    if ($upload_ok == true) {
                        $MaHinh = randomId(11);
                        $sql = "INSERT INTO `hinhhh`(`MaHinh`, `Anh`, `TenHinh`, `MSHH`) VALUES ('$MaHinh','$file_name','$tenHinh','$mshh')";
                        mysqli_query($conn, $sql);
                    }
                }
            }
        }
    }


    $sql_update = "UPDATE `hanghoa` SET
    `TenHH`='$tenhh',
    `MoTaHH`='$chitietsp',
    `Gia`='$gia',
    `MaLoaiHH`='$loaisp',
    `SoLuongHang`='$soluong',
    `GhiChu`='$ghichu' WHERE MSHH='$mshh'";
    if (mysqli_query($conn, $sql_update)) {
        echo "<script>
            alert('Cap nhat thanh cong');
            window.location.href = 'product.php';
        </script>";
    };
};


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
                    <a href="product.php" class="active"><span class="fas fa-shopping-bag"></span>
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
                    <a href="nhanvien.php"><span class="fas fa-shopping-bag"></span>
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
        <!-- Chinh sua san pham -->
        <main class="edit_main">
            <form enctype="multipart/form-data" action="editproduct.php?mshh=<?php echo $mshh; ?>" method="POST">
                <?php
                if ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="edit-header">
                        <h1><b><i>Chỉnh sửa sản phẩm</i></b> </h1>

                    </div>
                    <!-- <div class="form-message form-error"></div> -->
                    <div class="form-input-group">
                        <label class="form-label">Hình ảnh</label>
                        <img class="editproduct__img" width=90px heigh="90px" src="img/products/<?php echo $row['Anh'] ?>" alt='img-product'>

                        </img>
                        <input type="file" id="anh" name="anh[]" multiple class="form-input">
                        <div class="form-input-error-message"></div>
                    </div>
                    <br><br>
                    <hr><br><br>
                    <div class="form-input-group">
                        <label class="form-label">MSHH</label>
                        <input value="<?php echo $row['MSHH'] ?>" required type="text" id="mshh" name="mshh" class="form-input" disabled>
                        <div class="form-input-error-message"></div>
                    </div>
                    <br><br>
                    <hr><br><br>
                    <div class="form-input-group">
                        <label class="form-label">Tên sản phẩm</label>
                        <input value="<?php echo $row['TenHH'] ?>" required type="text" id="tenhh" name="tenhh" class="form-input" autofocus placeholder="Tên hàng hóa">
                        <div class="form-input-error-message"></div>
                    </div>
                    <br><br>
                    <hr><br><br>
                    <div class="form-input-group">
                        <label class="form-label">Loại sản phẩm</label>
                        <select name="loaisp" required id="loaisp" size="1">
                            <option value="">--Chọn--</option>
                            <?php
                            $sql = "select * from loaihanghoa";
                            $query = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_array($query)) {
                            ?>
                                <option <?php if ($row['MaLoaiHH'] == $rows['MaLoaiHH']) echo ("selected") ?> value="<?php echo $rows['MaLoaiHH'] ?>"><?php echo $rows['TenLoaiHH'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <!-- <select name="loaisp" required id="loaisp" size="1">
                            <option value="">--Chọn--</option>
                            <option <?php if ($row['LoaiHoa'] == 'hoa_HD') echo ("selected") ?> value="hoa_HD">Hoa Hướng Dương</option>
                            <option <?php if ($row['LoaiHoa'] == 'hoa_CC') echo ("selected") ?> value="hoa_CC">Hoa Cẩm Chướng</option>
                            <option <?php if ($row['LoaiHoa'] == 'hoa_TT') echo ("selected") ?> value="hoa_TT">Hoa Thủy Tiên</option>
                            <option <?php if ($row['LoaiHoa'] == 'hoa_XR') echo ("selected") ?> value="hoa_XR">Hoa Xương Rồng</option>
                            <option <?php if ($row['LoaiHoa'] == 'Hoa_Hong') echo ("selected") ?> value="Hoa_Hong">Hoa Hồng</option>
                            <option <?php if ($row['LoaiHoa'] == 'hoa_DT') echo ("selected") ?> value="Hoa_DT">Hoa Đồng Tiền</option>
                        </select> -->
                        <div class="form-input-error-message"></div>
                    </div>
                    <br><br>
                    <hr><br><br>
                    <div class="form-input-group">
                        <label for="signupPassword2" class="form-label">Giá sản phẩm</label>
                        <input value="<?php echo $row['Gia'] ?>" required min='0' type="number" id="gia" name="gia" class="form-input" autofocus placeholder="Gia san pham">
                        <div class="form-input-error-message"></div>
                    </div>
                    <br><br>
                    <hr><br><br>
                    <div class="form-input-group">
                        <label for="signupPassword2" class="form-label">Số lượng</label>
                        <input value="<?php echo $row['SoLuongHang'] ?>" min='0' required type="number" id="soluong" class="form-input" name="soluong" autofocus placeholder="So luong">
                        <div class="form-input-error-message"></div>
                    </div>
                    <br><br>
                    <hr><br><br>
                    <div class="form-input-group">
                        <label for="chitietsp" class="form-label">Mô tả sản phẩm</label>
                        <div>

                        </div>
                        <textarea name="chitietsp" id="chitietsp" cols="30" rows="10">
                            <?php echo $row['MoTaHH'] ?>
                        </textarea>
                        <div class="form-input-error-message"></div>
                    </div>

                    <div class="form-input-group">
                        <label for="ghichu" class="form-label">Ghi chu sản phẩm</label>
                        <div>

                        </div>
                        <textarea name="ghichu" id="ghichu" cols="30" rows="10">
                            <?php echo $row['GhiChu'] ?>
                        </textarea>
                        <div class="form-input-error-message"></div>
                    </div>


                    <button name='updateproduct' class="form-button" type="submit">Cập nhật sản phẩm</button>
                <?php
                }
                ?>
                <form>
        </main>

    </div>
</body>

</html>