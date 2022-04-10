<style>
    #inforAccount {
        position: absolute;
        top: 100px;
        /* right: -100%; */
        right: 1.3%;
        /* height: calc(100vh - 10.5rem); */
        height: auto;
        padding: 20px;
        width: 20rem;
        background: rgb(245, 255, 240);
        transition: 0.2s linear;
        border-radius: 10px;
        z-index: 3000;
        transform: scaleY(0);
        transform-origin: top;
        transition: 0.3s;
    }
</style>
<?php
?>
<div class="header">
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid nav-links">
            <a class="navbar-brand" href="index.php">
                <img src="img/products/logo.png" id="logo" alt="logo" style=" width: 200px; height:auto">
            </a>
            <button style="color: green" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="color: green" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">
                            <h5> <b>TRANG CHỦ</b> </h5>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <h5> <b>SẢN PHẨM</b> <i class="fas fa-angle-down"></i></h5>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="ProductsPage.php?loai_hoa=hoa_HD">&nbsp;&nbsp;Hoa Hướng Dương</a></li>
                            <li><a href="ProductsPage.php?loai_hoa=hoa_CC">&nbsp;&nbsp;Hoa Cẩm Chướng</a></li>
                            <li> <a href="ProductsPage.php?loai_hoa=hoa_TT">&nbsp;&nbsp;Hoa Thủy Tiên</a></li>
                            <li><a href="ProductsPage.php?loai_hoa=hoa_XR">&nbsp;&nbsp;Xương Rồng</a></li>
                            <li><a href="ProductsPage.php?loai_hoa=Hoa_Hong">&nbsp;&nbsp;Hoa Hồng</a></li>
                            <li><a href="ProductsPage.php?loai_hoa=Hoa_DT">&nbsp;&nbsp;Hoa Đồng Tiền</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <h5> <b>TIN TỨC</b> <i class="fas fa-angle-down"></i></h5>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="#">&nbsp;&nbsp;Giá hoa hồng giảm</a></li>
                            <li><a href="#">&nbsp;&nbsp;Mẫu hoa mới</a></li>
                            <li><a href="#">&nbsp;&nbsp;Màu hoa hồng mới</a></li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <h5> <b>LIÊN HỆ</b></h5>
                        </a>
                    </li>
                </ul>
                <form class="d-flex search-form">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search" style="background-color: #f8fcf3; border-color: #328b37;">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                <a href="#" id="search-btn" class="nav-btn"><i class="fas fa-search"></i></a>
                <a href="#" class="nav-btn" onclick="window.location.href = 'cart.php'"><i class="fas fa-shopping-cart"></i></a>
                <a href="#" id="account-btn" class="nav-btn"><i class="fas fa-user"></i></a>

            </div>
    </nav>
    <div id="inforAccount">
        <div class="side-bar">

            <div id="close-side-bar" class="fas fa-times"></div>

            

            <div id="accountDetail" class="navbar" style="display: none;">
                <a href="profile.html"> <i class="fas fa-angle-right"></i> My profile </a>
                <a href="purchased.html"> <i class="fas fa-angle-right"></i> Purchased products </a>
                <a href="viewed.html"> <i class="fas fa-angle-right"></i> Viewed products </a>
                <a href="favorite.html"> <i class="fas fa-angle-right"></i> Favorite products </a>
                <a href="setting.html"> <i class="fas fa-angle-right"></i> Setting </a>
            </div>
            <div id="guest">
                <img src="img/home/loginImg2.png" width="300px" alt="" align="center">
                <?php
                if (isset($_SESSION['islogin'])) { ?>
                    <a href="myaccount.php" style="text-align:center; padding: 20px">Tài khoản</a>
                <?php } ?>
             
                <?php
                if (isset($_SESSION['islogin'])) {
                ?>
                    <a href="logout.php?logout=true" style="text-align:center; padding: 20px">LOGOUT!</a>
                <?php
                } else {
                ?>
                    <a href="login.php" style="text-align:center; padding: 20px">LOGIN NOW!</a>
                <?php
                }
                ?>
                <hr>
                <h6 style="text-align:center; padding: 20px">Don't have an account?<br>Sign up now with us!</h6>
                <a href="register.php" style="text-align:center;">SIGN IN</a>
            </div>
        </div>
    </div>
    <script>
        var text = '{"account":[{"nickname":"QUY KHANG","username":"quykhang831", "password":"Kh@ng831", "photo":"img/home/accountImg2.png"},{"nickname":"Quý Khang Huỳnh","username":"admin831", "password":"831Kh@ng", "photo":"img/home/accountImg"}]}';
        const accountList = JSON.parse(text);

        for (var i = 0; i < localStorage.length; i++) {
            var key = localStorage.key(i);
            var nickname = localStorage.getItem(key);

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
    </script>
    <div id="lang-menu" align="center">
        <img src="img/home/flagVie.png" onclick="changeLang('vi-VN')" alt="Vietnamese">
        <img src="img/home/flagUK.png" onclick="changeLang('en-US')" alt="English">
    </div>
</div>