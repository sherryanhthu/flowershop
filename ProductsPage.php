<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>
        <link rel="shortcut icon"  href="img/favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9ac8be3ee8.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="libs/bootstrap-5.1.3-dist/css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
        <!-- <link rel="stylesheet" href="css/ProductsPage.css?v=<?php echo time(); ?>"> -->
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
        ob_start();
        session_start();
        include_once('./connect.php');
        $loai_hoa = isset( $_GET['loai_hoa']) ? $_GET['loai_hoa'] : "";
        if($loai_hoa != "hoa_TT" && $loai_hoa != "hoa_HD" && $loai_hoa != "hoa_CC"
         && $loai_hoa != "hoa_XR" && $loai_hoa != "Hoa_Hong" && $loai_hoa != "Hoa_DT"){
            echo "<script>
            window.location.href='/flower/index.php';
        </script>";
        }

    ?>
    <body>
        <div id="loader-wrapper">            
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <div class="home-page"><!---->
            <?php include_once('./header.php');?>

            <div class="main-content" style="background-image: url(https://roisin.qodeinteractive.com/wp-content/uploads/2020/02/roisin-landing-background-img-1.jpg)">
                <div class="title-product">
                    <?php
                        switch($loai_hoa){
                            case "hoa_TT": 
                                echo "Hoa Thuỷ Tiên";
                                break;
                            case "hoa_HD": 
                                echo "Hoa Hướng Dương";
                                break;
                            case "hoa_XR": 
                                echo "Xương Rồng";
                                break;
                            case "hoa_CC": 
                                echo "Hoa Cẩm Chướng";
                                break;
                            case "Hoa_Hong": 
                                echo "Hoa Hồng";
                                break;
                            case "Hoa_DT": 
                                echo "Hoa Đồng Tiền";
                                break;
                        } 
                    ?>
                    <hr>
                </div>
                <div class="content">
                    <?php
                       
                         $sql = "SELECT a.*, b.`TenLoaiHH`,b.`duongdan` FROM `hanghoa` a JOIN `loaihanghoa` b ON (a.`MaLoaiHH` = b.`MaLoaiHH`) WHERE b.`duongdan` = '$loai_hoa' ";
                        $query = mysqli_query($conn, $sql);
                        while($rows = mysqli_fetch_array($query)) {
                    ?>
                        
                            <div class="divp"> 
                                <a class="product" href="ProductsPageDetail.php?detail=<?php echo $rows['MSHH'] ?>">             
                                    <div class="product-item">
                                        <div class="thumbnail">
                                            <div id="carousel-<?php echo $rows['MSHH'] ?>" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                <?php 
                                                    $qr = "SELECT * FROM `hinhhh` WHERE `MSHH` = '".$rows['MSHH']."'";
                                                    $stmt = mysqli_query($conn, $qr);
                                                    $i = 0;
                                                    while($row1s = mysqli_fetch_array($stmt)) {
                                                        
                                                    ?>
                                                    <div class="carousel-item <?= $i++ == 0 ? "active" : "" ?>">
                                                        <img class ="thumbimg" src="./img/products/<?php echo $row1s['Anh']?>" class="d-block w-100" alt="<?php echo $row1s['TenHinh']?>">
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $rows['MSHH'] ?>" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $rows['MSHH'] ?>" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            

                                            
                                        </div>
                                        <div class="info-product">
                                            <SPAN><?php echo $rows['TenHH']?></SPAN>
                                            <h3>
                                                <?php 
                                                $gia = number_format($rows['Gia'],0,',', '.');
                                                echo $gia;
                                                ?>
                                                VND
                                            </h3>
                                        </div>
                                    </div> 
                                </a>
                            </div>
                                             <?php 
                        };
                    ?>
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