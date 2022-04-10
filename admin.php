<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>ADMIN DASHBOARD</title>
    <link rel="shortcut icon"  href="img/favicon.png">
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/9ac8be3ee8.js" crossorigin="anonymous"></script>
</head>
<?php
    include_once('./connect.php');
    session_start();

    $logout = isset($_GET['logout']) ? $_GET['logout'] : false;
    if ($logout) {
        unset($_SESSION['user_email']);
        unset($_SESSION['isAdmin']);
        unset($_SESSION['isStaff']);
        header("Location: index.php");
    }

    $isAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
    $isStaff = isset($_SESSION['isStaff']) ? $_SESSION['isStaff'] : false;

    if ($isAdmin == true || $isStaff == true) {}else{
        echo "<script> 
        window.location.href='/flower/login.php';
        </script>";
    }
?>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
       <div class="sidebar-brand">
           <h2><span>
                <img id="fullLogo" src="img/logo.png" alt="logo" height="60px">
           </span></h2>
           
       </div>
       <div class="sidebar-menu">
           <ul>
               <li>
                   <a href="admin.php" class="active"><span class="fas fa-igloo"></span>
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
                <span id="dashboard">Bảng Điều Khiển</span> 
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
        <?php
        session_start();
        include_once("./connect.php");
        ?>
        <main>
            <div class="dashboard-cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php 
                                $sql = "select * from khachhang";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($query);
                                echo $row;
                            ?>
                        </h1>
                        <span>Khách hàng</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php 
                                $sql = "select * from hanghoa";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($query);
                                echo $row;
                            ?></h1>
                        <span>Sản phẩm</span>
                    </div>
                    <div>
                        <span class="fas fa-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php 
                                $sql = "select * from dathang";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($query);
                                echo $row;
                            ?></h1>
                        <span>Đơn hàng</span>
                    </div>
                    <div>
                        <span class="fas fa-shopping-bag"></span>
                    </div>
                </div>
                <!-- <div class="card-single">
                    <div>
                        <h1>$18k</h1>
                        <span>Doanh thu</span>
                    </div>
                    <div>
                        <span class="fas fa-wallet"></span>
                    </div>
                </div> -->
            </div>
            <div class="recent-grid" >
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sản phẩm mới</h3>
                            <button onclick="window.location.href='product.html'">Tất cả <span class="fas fa-arrow-right">
                            </span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td id="imgproduct">Hình ảnh</td>
                                            <td>Tên sản phẩm</td>
                                            <td>Loại sản phẩm</td>
                                            <td>Giá</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM hanghoa ORDER BY MSHH DESC LIMIT 10";
                                    $query = mysqli_query($conn, $sql);
                                    $STT = 0;
                                    while ($rows = mysqli_fetch_array($query)) {
                                        $MSHH = $rows['MSHH'];
                                        $MaLoaiHH = $rows['MaLoaiHH'];
                                    ?> 
                                       
                                            <tr>
                                                <td><?php
                                                    $sql_anh = "select * from hinhhh where MSHH='$MSHH'";
                                                    $query_anh = mysqli_query($conn, $sql_anh);
                                                    while ($rows_anh = mysqli_fetch_array($query_anh)) {
                                                    ?>
                                                        <img class="product__img" src="./img/products/<?php echo $rows_anh['Anh'] ?>" alt="anh">
                                                    <?php
                                                    }
                                                    ?></td>
                                                <td><?php echo $rows['TenHH']?></td>
                                                <td>
                                                <?php 
                                                    $sql_loai = "select * from loaihanghoa where MaLoaiHH='$MaLoaiHH'";
                                                    $query_loai = mysqli_query($conn, $sql_loai);
                                                    while ($rows_loai = mysqli_fetch_array($query_loai)){          
                                                            echo $rows_loai['TenLoaiHH']  ;
                                                } 
                                                ?>
                                                
                                                </td>
                                                <td><?php 
                                                $gia = number_format($rows['Gia'],0,',', '.');
                                                echo $gia;
                                                ?>
                                                VND</td>
                                            </tr>
                                        <?php 
                                             }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>  
                <!-- <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Khách hàng mới</h3>
                            <button onclick="window.location.href='customer.html'">Tất cả <span class="fas fa-arrow-right">
                            </span></button>
                        </div> -->

                        <!-- <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="img/admin/accountImg2.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Lưu Ca</h4>
                                        <small>member</small>
                                    </div>
                                 </div>   

                                <div class="contact">
                                    <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div> -->
                            
                            <!-- <div class="customer">
                                <div class="info">
                                    <img src="img/admin/pic-1.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Duy Tâm</h4>
                                        <small>member</small>
                                    </div>
                                </div>

                                <div class="contact">
                                    <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div> -->

                            <!-- <div class="customer">
                                <div class="info">
                                    <img src="img/admin/pic-2 (2).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Mai Tuyền </h4>
                                        <small>member</small>
                                    </div>
                                </div>

                                <div class="contact">
                                    <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div> -->

                            <!-- <div class="customer">
                                <div class="info">
                                    <img src="img/admin/pic-3.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Tú Khanh</h4>
                                        <small>member</small>
                                    </div>
                                </div>

                                <div class="contact">
                                     <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="img/admin/pic-2 (1).png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Hương Giang</h4>
                                        <small>member</small>
                                    </div>
                                </div>

                                <div class="contact">
                                    <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="img/admin/accountImg.jpg" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Minh Khôi</h4>
                                        <small>member</small>
                                    </div>
                                </div>

                                <div class="contact">
                                    <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="img/admin/customer0.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Hà Việt Quang</h4>
                                        <small>member</small>
                                    </div>
                                </div>

                                <div class="contact">
                                    <span class="fas fa-user-circle"></span>
                                    <span class="fas fa-comment"></span>
                                    <span class="fas fa-phone"></span>
                                </div>
                                
                            </div> -->

                        </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>