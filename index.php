<?php
session_start();
include_once('./connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>FlowerShop</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ac8be3ee8.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <!-- <link href="libs/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet"> -->


    <script src="libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="libs/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="libs/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>

    <script src="libs/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .single-shipping {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flexbox;
            display: flex;
            margin-top: 30px;
        }

        .single-shipping .shipping-icon img {
            width: 100px;
        }

        .single-shipping .shipping-content {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -moz-flex: 1;
            -ms-flex: 1;
            flex: 1;
            padding-left: 15px;

        }

        .single-shipping .shipping-content .title {
            font-size: 20px;
            line-height: 18px;
            text-transform: capitalize;
            font-weight: 700;
            margin-bottom: 7px;
            color: #222222;
        }

        .single-shipping .shipping-content p {
            font-size: 18px;
            line-height: 18px;
            font-weight: 300;
            margin-bottom: 10px;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="libs/bootstrap-5.1.3-dist/js/jquery-3.6.0.min.js"></script>


</head>

<body>

    <!-- <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->

    <header>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/home/bia_1.jpg" class="bd-placeholder-img" width="100%" aria-hidden="true" focusable="false">

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h3><span id="CONTENTS_HEAD" class="multilang"></span> <b class="display-8">FlowerShop</b> !</h3>
                            <h1 class="lead4"><span id="CONTENTS_SLOGAN" class="multilang"></span></h1>
                            <p><span id="CONTENTS_DETAIL_TEXTSTART" class="multilang"></span></p>
                            <p><a class="btn header" href="register.php" style="background-color: green; border-color: yellowgreen">Đăng ký ngay</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/home/bia_2.jpg" class="bd-placeholder-img" width="100%" aria-hidden="true" focusable="false">

                    <div class="container">
                        <div class="carousel-caption">
                            <h3><span id="CONTENTS_HEAD2" class="multilang"></span> <b class="display-8">FlowerShop</b> !</h3>
                            <h1><span id="CONTENTS_SLOGAN2" class="multilang"></span></h1>
                            <p><span id="CONTENTS_DETAIL_CAPTION" class="multilang"></span></p>
                            <p><a class="btn header" href="register.php" style="background-color: green; border-color: yellowgreen">Đăng ký ngay</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/home/bia_3.jpg" class="bd-placeholder-img" width="100%" aria-hidden="true" focusable="false">

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h3><span id="CONTENTS_HEAD3" class="multilang"></span> <b class="display-8">FlowerShop</b> !</h3>
                            <h1><span id="CONTENTS_SLOGAN3" class="multilang"></span></h1>
                            <p><span id="CONTENTS_DETAIL_TEXTEND" class="multilang"></span></p>
                            <p><a class="btn header" href="register.php" style="background-color: green; border-color: yellowgreen">Đăng ký ngay</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        include_once('./header.php');

        ?>
    </header>





    <main>
        <?php
        $sql_danhmuc = mysqli_query($conn, 'SELECT * FROM loaihanghoa ORDER BY MaLoaiHang DESC')
        ?>
        <!--Shipping Start-->
        <hr class="featurette-divider">
        <div class="shipping-area section-padding-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="./img/home/Free-Delivery.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Free vận chuyển</h5>
                                <br>
                                <p>Giao hàng miễn phí trên toàn quốc cho tất cả các đơn đặt hàng trên 200k </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="./img/home/Online-Order.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Đặt hàng Online</h5>
                                <br>
                                <p>Đừng lo lắng, bạn có thể đặt hàng Trực tuyến trên Trang web của chúng tôi </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="./img/home/Freshness.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Sự tươi mới</h5>
                                <br>
                                <p>Bạn có hoa đẹp mỗi khi đặt hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-shipping">
                            <div class="shipping-icon">
                                <img src="./img/home/Made-By-Artists.png" alt="">
                            </div>
                            <div class="shipping-content">
                                <h5 class="title">Tâm huyết</h5>
                                <br>
                                <p>Mỗi một bó hoa chúng tôi đều dành hết tâm tư, tình cảm vào đó</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="container marketing" id="ourproducts">
            <!---->
            <div class="services-info col-md-12">
                <h2 class="section-title2"><span id="CONTENTS_PWD_TITLE" class="multilang">LOẠI HOA BÁN</span></h2>

            </div>
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                    <div class="i1">
                        <img src="./img/home/hoahuongduong.png" height="200" width="200" alt="ảnh hoa hướng dương"><br><br><br>
                    </div>
                    <h2><b class="text-muted1"><span id="CONTENTS_PWD_SEEDS" class="multilang"></span>Hoa Hướng Dương</b></h2>
                    <p class="text-muted"><span id="CONTENTS_PWD_SEEDS_DETAILS" class="multilang"></span></p>
                    <p><a class="btn btn-secondary" href="ProductsPage_hg.html"><span id="CONTENTS_SEEDS_BTN" class="multilang">Đọc thêm</span></a></p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                    <div class="i1">
                        <img src="./img/home/hoacamchuong.png" height="200" width="200" alt="hoa cẩm chướng"> <br><br><br>
                    </div>
                    <h2><b class="text-muted1"><span id="CONTENTS_PWD_FERTILIZER" class="multilang"></span>Hoa Cẩm Chướng</b></h2>
                    <p class="text-muted"><span id="CONTENTS_PWD_FERTILIZER_DETAILS" class="multilang"></span></p>
                    <p><a class="btn btn-secondary" href="ProductsPage_pb.html"><span id="CONTENTS_FER_BTN" class="multilang">Đọc thêm</span></a></p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                    <div class="i1">
                        <img src="./img/home/hoathuytien.png" height="250" width="250" alt="hoathuytien">
                    </div>
                    <h2><b class="text-muted1"><span id="CONTENTS_PWD_TOOLS" class="multilang"></span>Hoa Thủy Tiên</b></h2>
                    <p class="text-muted"><span id="CONTENTS_PWD_TOOLS_DETAILS" class="multilang"></span></p>
                    <p><a class="btn btn-secondary" href="ProductsPage_nc.html"><span id="CONTENTS_TOOL_BTN" class="multilang">Đọc thêm</span></a></p>
                </div>
                <div class="col-lg-4">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                    <div class="i1">
                        <img src="./img/home/xuongrong.png" height="250" width="250" alt="ảnh xương rồng">
                    </div>
                    <h2><b class="text-muted1"><span id="CONTENTS_HXR_TOOLS" class="multilang"></span>Xương Rồng</b></h2>
                    <p class="text-muted"><span id="CONTENTS_HXR_TOOLS_DETAILS" class="multilang"></span></p>
                    <p><a class="btn btn-secondary" href="ProductsPage_nc.html"><span id="CONTENTS_HXR_BTN" class="multilang">Đọc thêm</span></a></p>
                </div>
                <div class="col-lg-4">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                    <div class="i1">
                        <img src="./img/home/hoahong.png" height="250" width="250" alt="ảnh hoa hồng">
                    </div>
                    <h2><b class="text-muted1"><span id="CONTENTS_HH_TOOLS" class="multilang"></span>Hoa Hồng</b></h2>
                    <p class="text-muted"><span id="CONTENTS_HH_TOOLS_DETAILS" class="multilang"></span></p>
                    <p><a class="btn btn-secondary" href="ProductsPage_nc.html"><span id="CONTENTS_HH_BTN" class="multilang">Đọc thêm</span></a></p>
                </div>
                <div class="col-lg-4">
                    <!--<svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>-->
                    <div class="i1">
                        <img src="./img/home/hoadongtien.png" height="250" width="250" alt="ảnh hoa đồng tiền">
                    </div>
                    <h2><b class="text-muted1"><span id="CONTENTS_HDT_TOOLS" class="multilang"></span>Hoa Đồng Tiền</b></h2>
                    <p class="text-muted"><span id="CONTENTS_HDT_TOOLS_DETAILS" class="multilang"></span></p>
                    <p><a class="btn btn-secondary" href="ProductsPage.php"><span id="CONTENTS_HDT_BTN" class="multilang">Đọc thêm</span></a></p>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <!--Shipping End-->
            <hr class="featurette-divider">
            <div class="services-info col-md-12">
                <h2 class="section-title2"><span id="CONTENTS_PWD_TITLE" class="multilang">SẢN PHẨM MỚI</span></h2>
            </div>
            <div class="content">
          
                <?php
                $sqlP = "SELECT loaihanghoa.MaLoaiHH FROM loaihanghoa ORDER BY loaihanghoa.MaLoaiHH";
                $queryP = mysqli_query($conn, $sqlP);
                while ($rowsP = mysqli_fetch_array($queryP)) {
                ?>
                    <?php
                    $sql = "SELECT * FROM hanghoa, hinhhh WHERE hanghoa.MaLoaiHH = '" . $rowsP["MaLoaiHH"] . "' ORDER BY hanghoa.MSHH ASC LIMIT 4";
                    $query = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($query)) {
                    ?>
                        <div class="divp">
                            <a class="product" href="ProductsPageDetail.php?detail=<?php echo $rows['MSHH'] ?>">
                                <div class="product-item">
                        <?php echo $rowsP["MaLoaiHH"] ?>
                                    <div class="thumbnail">
                                        <div id="carousel-<?php echo $rows['MSHH'] ?>" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php
                                                $qr = "SELECT * FROM `hinhhh` WHERE `MSHH` = '" . $rows['MSHH'] . "'";
                                                $stmt = mysqli_query($conn, $qr);
                                                $i = 0;
                                                while ($row1s = mysqli_fetch_array($stmt)) {

                                                ?>
                                                    <div class="carousel-item <?= $i++ == 0 ? "active" : "" ?>">
                                                        <img class="thumbimg" src="./img/products/<?php echo $row1s['Anh'] ?>" class="d-block w-100" alt="<?php echo $row1s['TenHinh'] ?>">
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
                                        <SPAN><?php echo $rows['TenHH'] ?></SPAN>
                                        <h3>
                                            <?php
                                            $gia = number_format($rows['Gia'], 0, ',', '.');
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
                <?php
                };
                ?>
            </div>

        </div>





        <!-- <div>
            <img src="https://wpbingosite.com/wordpress/florial/wp-content/uploads/2021/09/bg-7.jpg" width=100% height="800px">

        </div> -->
        <hr class="featurette-divider">
        <div class="services-info col-md-12">
            <h2 class="section-title2"><span id="CONTENTS_PWD_TITLE" class="multilang">CẢM NGHĨ KHÁCH HÀNG</span></h2>
        </div>
        <!-- review   -->
        <div id="CusReview" class="row row-cols-1 row-cols-md-3 mb-3 text-center" style="background-image: url('img/home/main-bg.png')" ;>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <img src="./img/home/quote.png" class="i3" height="100px" width="100px" alt="">
                    <div class="card-body">
                        <h1 class="lead"><span id="CONTENTS_OCS_DAVID" class="multilang">Mẹ tôi đã rất ngạc nhiên khi tôi tặng bó hoa vào ngày 8/3 cho mẹ. Mẹ tôi rất thích chúng. Cảm ơn FlowerShop!</span></h1> <br>
                        <img src="https://wpbingosite.com/wordpress/florial/wp-content/uploads/2020/06/tesm-2.jpg" class="user" height="60px" width="60px" alt="">
                        <h3 class="text-muted"> <b>Ann Smith</b> </h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <img src="./img/home/quote.png" class="i3" height="100px" width="100px" alt="">
                    <div class="card-body">
                        <h1 class="lead"><span id="CONTENTS_OCS_Lalisa" class="multilang">Tuyệt vời, giao hàng nhanh, đã mua nhiều lần nên mọi người cứ yên tâm, lần sau sẽ ủng hộ.
                            </span></h1> <br>
                        <img src="https://wpbingosite.com/wordpress/florial/wp-content/uploads/2020/06/tesm-1.jpg" class="user" height="60px" width="60px" alt="">
                        <h3 class="text-muted"> <b>Lalisa</b> </h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm ">
                    <img src="./img/home/quote.png" class="i3" height="100px" width="100px" alt="">
                    <div class="card-body">
                        <h1 class="lead"><span id="CONTENTS_OCS_Justin" class="multilang">Shop bán nhiều loại, tuy ở xa nhưng giao hàng rất nhanh, bó hoa vừa tươi vừa đẹp. Tôi rất thích.</span></h1> <br>
                        <img src="https://wpbingosite.com/wordpress/florial/wp-content/uploads/2020/06/tesm-3.jpg" class="user" height="60px" width="60px" alt="">
                        <h3 class="text-muted"> <b>Sara</b> </h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">










    </main>


    <script src="libs/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

    <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
    <script>
        $(document).ready(function() {
            $('body').addClass('loaded');
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        $(".page-header .nav-link, .navbar-brand, .footer-link").on("click", function(e) {
            e.preventDefault();

            //link nav to area content
            const href = $(this).attr("href");
            $("html, body").animate({
                scrollTop: $(href).offset().top - 71
            }, 600);
        });
    </script>
    <script src="js/home.js"></script>
</body>

<style>
    .footer-link {
        color: #fff;
        text-decoration: none;
        transition: 0.3s;
        font-family: 'Rokkitt', serif;
        font-size: 20px;
    }

    .footer-link:hover {
        color: #328b37;
        text-decoration: underline;
    }

    footer {
        position: relative;
        height: auto;
        background-color: #0f4229;
        background-image: url(img/home/footer.png);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<div class="footer" style="background-image: url(./img/footer.jpg)">
    <div class="footer-container">
        <p style="font-family: Crimson Text; font-size: 25px;">Tải ứng dụng FlowerShop</p>
        <div class="app-google">
            <a href=""><img src="img/appstore.jpg" alt=""></a>
            <a href=""> <img src="img/googleplay.jpg" alt=""></a>
        </div>
        <p style="font-family: Crimson Text; font-size: 25px;">Nhận bản tin FlowerShop</p>
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

        <script>
            var text = '{"account":[{"nickname":"QUY KHANG","username":"quykhang831", "password":"Kh@ng831", "photo":"img/home/accountImg2.png"},{"nickname":"Quý Khang Huỳnh","username":"admin831", "password":"831Kh@ng", "photo":"img/home/accountImg"}]}';
            const accountList = JSON.parse(text);

            window.onload = function() {
                for (var i = 0; i < localStorage.length; i++) {
                    var key = localStorage.key(i);
                    var nickname = localStorage.getItem(key);
                    // if(key != null){
                    //     var login = document.getElementById("login");
                    //     login.firstElementChild.innerHTML = `Chào ${nickname}`;
                    //     login.lastElementChild.innerHTML = "<a href='login.html'>Thoát</a>";
                    // }
                    accountList.account.forEach(function(e) {
                        if (key == e.username) { //Kiểm tra xem key đó có tồn tại trong accountList hay không
                            var accountTitle = document.getElementById('accountTitle');
                            var accountDetail = document.getElementById('accountDetail');
                            var guest = document.getElementById('guest');

                            accountTitle.style.display = 'block';
                            accountDetail.style.display = 'block';
                            guest.style.display = 'none';

                            document.getElementById('nickname').textContent = nickname;
                            document.getElementById('avtUser').setAttribute('src', e.photo);
                        }
                    });
                }
            }
        </script>

</html>