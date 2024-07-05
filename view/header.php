<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB BÁN GIÀY</title>
    <link rel="shortcut icon" href="assets/images/logo-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/loginandregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" 
    />
    <style>
        .error-message {
            color: red;
        }
        .input-group {
            margin-bottom: 15px;
        }
    </style>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var pass = document.getElementById("pass").value;

            if (username == "" || username == "null") {
                document.getElementById("username-error").innerHTML = "Vui lòng nhập tên đăng nhập.";
                return false;
            } else {
                document.getElementById("username-error").innerHTML = "";
            }

            if (pass == "" || pass =="null") {
                document.getElementById("pass-error").innerHTML = "Vui lòng nhập mật khẩu.";
                return false;
            } else {
                document.getElementById("pass-error").innerHTML = "";
            }

            return true;
        }
    </script>

</head>


<body>
    <div class="contaier">
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="assets/images/goy.jpg" alt=""></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                    <li><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                    <li><a href="index.php?act=lienhe">Liên hệ</a></li>
                    <li><a href="index.php?act=hoidap">Hỏi đáp</a></li>
                    <li><a href="index.php?act=gopy">Góp ý</a></li>
                </ul>
            </div>
            <div class="icon_bar flex_c">
                <div class="dropdown">
                    <div class="icon_login">
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']) {
                            echo 'Xin chào ' . $_SESSION['user']['username'];
                        } else {
                            echo "";
                        }
                        ?>
                        <i class="fa-regular fa-user fa-lg"></i>
                    </div>

                    <ul class="dropdown_list">
                        <li class="dropdown_item">
                            <a href="index.php?act=dangky" class="dropdown_link">
                                <span class="dropdown_text">Đăng ký</span>
                                <i class="fa-regular fa-user"></i>
                            </a>
                        </li>
                        <li class="dropdown_item">
                            <a href="index.php?act=dangnhap" class="dropdown_link">
                                <span class="dropdown_text">Đăng nhập</span>
                                <i class="fa-solid fa-right-to-bracket"></i>
                            </a>
                        </li>
                        <li class="dropdown_item">
                            <a href="index.php?act=yourorder" class="dropdown_link">
                                <span class="dropdown_text">Đơn hàng của tôi</span>
                            </a>
                        </li>
                        <li class="dropdown_item">
                            <a href="index.php?act=quenmk" class="dropdown_link">
                                <span class="dropdown_text">Quên mật khẩu</span>
                            </a>
                        </li>
                        <li class="dropdown_item">
                            <a href="index.php?act=edit_tk" class="dropdown_link">
                                <span class="dropdown_text">Cập nhật tài khoản</span>
                                <i class="fa-regular fa-address-card"></i>
                            </a>
                        </li>
                        <li class="dropdown_item">
                            <a href="index.php?act=dangxuat" class="dropdown_link">
                                <span class="dropdown_text">Đăng xuất</span>
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="icon_cart">
                    <?php 
                        $cartCount = 0;
                        if(isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
                            foreach($_SESSION['mycart'] as $cart) {
                                $cartCount += (int)$cart[7];
                            }
                        } else {
                            $cartCount = 0;
                        }
                    ?>
                    <span class="quatity_cart"><?=$cartCount?></span>
                    <a href="index.php?act=addgiohang"><i class="fa-solid fa-bag-shopping fa-lg"></i></a>
                </div>
            </div>
        </div>