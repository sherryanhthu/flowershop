<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
  <title>CUSTOMER</title>
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
if ($isAdmin || $isStaff) {
} else {
  echo "<script> 
        window.location.href='/flower/login.php';
        </script>";
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
          <a href="customer.php" class="active"><span class="fas fa-users"></span>
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
            <span>Danh sách khách hàng</span>
          </h3>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table width="100%">
              <thead>
                <tr>
                  <td>MSKH</td>
                  <td>Họ Tên KH</td>
                  <td>Email</td>
                  <td>Địa chỉ</td>
                  <td>Số Điện Thoại</td>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "select * from khachhang";
                $query = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($query)) {

                ?>
                  <tr>
                    <td><?php echo $rows['MSKH'] ?></td>
                    <td><?php echo $rows['HoTenKH'] ?></td>
                    <td><?php echo $rows['Email'] ?></td>
                    <td><?php echo $rows['DiaChi'] ?></td>
                    <td><?php echo $rows['SoDienThoai'] ?></td>
                  </tr>

                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="footertable">
            <button>1</button>
            <button>2</button>
            <button>3</button>
            <button>4</button>
            <button>></button>
            <button>>></button>
          </div> -->
      </div>
    </main>
  </div>
  <script src="plugins/chart.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>