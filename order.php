<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title>ORDER</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script src="https://kit.fontawesome.com/9ac8be3ee8.js" crossorigin="anonymous"></script>
    <style>
        .order .order__content h2 {
            font-size: 20px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 10px;
            margin-bottom: 25px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .order .order__content table {
            width: 100%;
        }

        .order .order__content table tr th,
        td {
            padding: 10px;
            font-weight: 600;
            border-color: #ccc;
            border-bottom: 0;
            color: #1f2226;
            text-align: center;
            font-size: 14px;
        }

        .order .order__content table tr td {
            color: #696969;
            font-weight: 400;
            padding: 10px;
        }

        .order .order__content table tr td p {
            max-width: 100%;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            margin: 0;
        }

        .order .order__content table tr td a {
            text-decoration: none;
            color: #1f2226;
        }

        .order .order__content table .order__pending {
            font-size: 12px;
            padding: 2px 4px;
            width: 60%;
            margin: 0 auto;
            border-radius: 20px;
            background-color: var(--color-primary);
            color: #fff;
        }

        .order .order__content table .order__delivered {
            font-size: 12px;
            padding: 2px 4px;
            width: 60%;
            margin: 0 auto;
            border-radius: 20px;
            background-color: var(--bs-blue);
            color: #fff;
        }

        .order .order__content table .order__cancel {
            font-size: 12px;
            padding: 2px 4px;
            width: 60%;
            margin: 0 auto;
            border-radius: 20px;
            background-color: var(--bs-gray);
            color: #fff;
        }
    </style>
</head>
<?php
session_start();
include_once('./connect.php');

$isAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
$isStaff = isset($_SESSION['isStaff']) ? $_SESSION['isStaff'] : false;
$MSNV = isset($_SESSION['MSNV']) ? $_SESSION['MSNV'] : false;

echo 'admin'. $isAdmin;
echo $MSNV;

if ($isAdmin || $isStaff) {
} else {
    echo "<script> 
        window.location.href='/flower/login.php';
        </script>";
}

// Updang trang thai
$trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : false;
$SoDonDH = isset($_GET['SoDonDH']) ? $_GET['SoDonDH'] : false;

if ($trangthai && $SoDonDH) {

    // Huy don hang
    if ($trangthai == 2) {
        // Xoa cac chi tiet dat hang co lien quan
        $sql = "SELECT * FROM `chitietdathang` WHERE SoDonDH='$SoDonDH'";
        $query = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($query)) {
            mysqli_query($conn, "DELETE FROM `chitietdathang` WHERE SoDonDH='$SoDonDH'");
        }

        // Xoa don dat hang thi huy
        $sql_delete = "DELETE FROM `dathang` WHERE SoDonDH='$SoDonDH'";
        mysqli_query($conn, $sql_delete);
        if (mysqli_query($conn, $sql_delete)) {
            echo "<script> 
                alert('Hủy đơn hàng thành công');
                window.location.href='/flower/order.php';
                </script>";
        }
    }

    // Duy don hang
    if ($isStaff) {
        $ngayGH = date("Y-m-d H:i:s");
        $sql = "UPDATE `dathang` SET `TrangthaiDH`='$trangthai',`MSNV`='$MSNV',`NgayGH`='$ngayGH' WHERE SoDonDH='$SoDonDH'";
    } else {
        $ngayGH = date("Y-m-d H:i:s");
        $sql = "UPDATE `dathang` SET `TrangthaiDH`='$trangthai',`MSNV`='ADMIN',`NgayGH`='$ngayGH' WHERE SoDonDH='$SoDonDH'";
    }
    // Cap nhat lai trang thai
    if (mysqli_query($conn, $sql)) {

        // Tru so luong
        // So luong hien tai - so luong trong bang chi tiet dat hang
        $sql = "SELECT * FROM `chitietdathang` WHERE SoDonDH='$SoDonDH'";
        $query = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($query)) {
            $MSHH = $rows['MSHH'];
            $sql_hanghoa = "select * from hanghoa where MSHH='$MSHH'";
            $query_hanghoa = mysqli_query($conn, $sql_hanghoa);
            if($hanghoa = mysqli_fetch_assoc($query_hanghoa)){
                $sl_hientai = $hanghoa['SoLuongHang'];
                $sl_chitietdathang = $rows['SoLuong'];
                $sl_tong =  $sl_hientai -  $sl_chitietdathang;
                mysqli_query($conn, "UPDATE `hanghoa` SET `SoLuongHang`='$sl_tong' WHERE MSHH='$MSHH'");
            }
        }

        echo "<script> 
        alert('Đơn hàng đã được duyệt')
        </script>";
    }
}

?>

<body>
    <input type="checkbox" id="nav-toggle" />
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="img/logo.png" alt="logo" height="60px" />
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
                    <a href="order.php" class="active"><span class="fas fa-shopping-bag"></span>
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
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper" style="cursor: pointer">
                <img src="img/admin/1.jpg" width="30px" height="30px" alt="" />
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

        <main>


            <div class="card">
                <div class="card-header">
                    <h3>
                        <span class="fas fa-list"></span>
                        <span>Danh sách đơn hàng</span>
                    </h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Số Đơn</td>
                                    <td>MSKH</td>
                                    <td>MSNV</td>
                                    <td>NgàyĐH</td>
                                    <td>NgàyGH</td>
                                    <td>Trạng thái ĐH</td>
                                    <td>Thao tác</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from dathang where TrangthaiDH=0";
                                $query = mysqli_query($conn, $sql);

                                while ($rows = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td style="max-width: 220px;"><?php echo $rows['SoDonDH'] ?></td>
                                        <td><?php echo $rows['MSKH'] ?></td>
                                        <td><?php echo $rows['MSNV'] ?></td>
                                        <td style="max-width: 220px;"><?php echo $rows['NgayDH'] ?></td>
                                        <td style="max-width: 220px;"><?php echo $rows['NgayGH'] ?></td>
                                        <td>
                                            <?php
                                            $status = $rows['TrangthaiDH'];
                                            switch ($status) {
                                                case '0':
                                                    echo "<p class='order__pending'>Đang Xử Lý</p>";
                                                    break;
                                                case '1':
                                                    echo "<p class='order__delivered'>Đã duyệt đơn hàng</p>";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="width:100px;">
                                            <div style="display:flex;">
                                                <div>
                                                    <a href="order.php?trangthai=1&SoDonDH=<?php echo $rows['SoDonDH'] ?>" class="my-btn-primary my-btn-primary--2 cart__total-btn">
                                                        Duyệt
                                                    </a>
                                                    <br>
                                                    <a href="order.php?trangthai=2&SoDonDH=<?php echo $rows['SoDonDH'] ?>" class="my-btn-primary my-btn-primary--2 cart__total-btn">
                                                        Hủy đơn hàng
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                <?php
                                }
                                $count = mysqli_num_rows(($query));
                                if ($count == 0) {
                                    echo "<p> Hiện chưa có đơn hàng</p>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <script src="plugins/chart.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>