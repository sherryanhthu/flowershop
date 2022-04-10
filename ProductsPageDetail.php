<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ProductsPage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
    <script src="js/jshg.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ac8be3ee8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="libs/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>
    <script src="js/cart.js"></script>
    <script src="libs/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
          $('body').addClass('loaded');
        });
    
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map (function(tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        });
      </script>
      <script src="js/script.js"></script>
</head>
<?php 
    $MSHH = $_GET['detail'];
    include_once("./connect.php");
?>
<body>
    <div id="loader-wrapper">            
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <div class="home-page"><!---->
    <?php include_once('./header.php');?>

        <div class="main-content" style="background-image: url(img/products/main3.png)">
        <?php
            $sql = "SELECT a.*, b.`TenLoaiHH`,b.`duongdan` FROM `hanghoa` a JOIN `loaihanghoa` b ON (a.`MaLoaiHH` = b.`MaLoaiHH`) WHERE a.`MSHH` = '".$_GET['detail']."' ";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query)
        ?>
            <div class="content flex-nowrap">
                <div class="column-trai mx-3">
                    <div id="carousel-<?= $_GET['detail'] ?>" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                                $qr = "SELECT * FROM `hinhhh` WHERE `MSHH` = '".$_GET['detail']."'";
                                $stmt = mysqli_query($conn, $qr);
                                $i = 0;
                                while($row1s = mysqli_fetch_array($stmt)) {
                                ?>
                            <div class="carousel-item <?= $i++ == 0 ? "active" : "" ?>">
                                <img class ="thumbimg" src="./img/products/<?php echo $row1s['Anh']?>" class="d-block w-100" alt="<?php echo $row1s['TenHinh']?>">
                            </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?= $_GET['detail'] ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?= $_GET['detail'] ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="column-phai mx-5">
                    <div class="mota">
                        <h2 style="margin-bottom: 20px;">
                            <?php
                                echo $row['TenHH'];
                            ?>
                        </h2>
                        <div id="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div class="mota2">
                        <h2 style="margin-bottom: 20px;">
                        <?php 
                            $gia = number_format($row['Gia'],0,',', '.');
                            echo $gia;
                            ?>
                            VND
                        </h2>
                        <p style="color: #84BE38;font-size: 20px;"><?= $row['GhiChu']?></p>
                    </div>
                    <div class="mota4">
                        <label id="text-des" for="cars">Số Lượng:
                            <?php
                                echo $row['SoLuongHang'];
                            ?>
                        </label>
                        <span style="position: relative;margin-left: 12px;">
                            <!-- <input id="hg01" type="number" max="100" min="0" size="3" value="1"> -->
                            <!-- <button class="buttun" type="button" onclick="addCart('hg01')" >Đặt Hàng</button> -->
                            <a class="buttun"  href="addcart.php?MSHH=<?php echo $row['MSHH']; ?>">Đặt Hàng</a>
                        </span>
                    </div>
                    <div class="mota6">
                        <p>Bạn có thể chia sẻ đến bạn bè thông qua</p>
                        <div class="mota6-1">
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-facebook-square"></i>
                            <i class="fab fa-twitter"></i>
                        </div>
                    </div>
                    <div class="mota5">
                        <ul class="li-des">
                            <li>
                            <?php
                                echo $row['MoTaHH'];
                            ?>
                            </li>
                            
                        </ul>
                    </div>
                </div>  
            </div>
        </div> 
        <div class="footer" style="background-image: url(./img/footer.jpg)">
        <div class="footer-container">
            <p style="font-family: Crimson Text; font-size: 25px;" >Tải ứng dụng FlowerShop</p>
            <div class="app-google">
                <a href=""><img src="img/appstore.jpg" alt=""></a>
                <a href=""> <img src="img/googleplay.jpg" alt=""></a>
            </div>
            <p style="font-family: Crimson Text; font-size: 25px;">Nhận bản tin  FlowerShop</p>
            <div class="input-email">
                <input type="text" placeholder="Nhập email của bạn">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="footer-items">
                <!-- <li>
                    <a href=""><img src="image/dathongbao.png" alt=""></a>
                </li> -->
                <li style="font-family: Crimson Text; font-size: 20px;"><a href="">Liên hệ</a></li>
                <li style="font-family: Crimson Text; font-size: 20px;"><a href="">Tuyển dụng</a></li>
                <li style="font-family: Crimson Text; font-size: 20px;"><a href="">Giới thiệu</a></li>
               
                
            </div>
            <div class="row-share">
                    <div class="share">
                      <a href="#" class="fab fa-facebook-f"></a>
                      <a href="#" class="fab fa-twitter"></a>
                      <a href="#" class="fab fa-instagram"></a>
                      <a href="#" class="fab fa-linkedin"></a>
                    </div>
            <div class="footer-text">
               <p style="font-family: Crimson Text;">FlowerShop - DH Can Tho - Khoa CNTT&TT</p> 
            </div>
            <div class="footer-bottom">
              <p style="font-family: Crimson Text;"> FlowerShop ©2022</p> 
        </div>
    </div>

    <script src="js/home.js"></script>
</body>
</html>