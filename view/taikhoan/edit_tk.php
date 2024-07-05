<div class="content_capnhat_tk">
    <div class="title">CẬP NHẬT TÀI KHOẢN</div>
    <div class="">
        <?php
        if (isset($_SESSION["user"]) && (is_array($_SESSION["user"]))) {
            extract($_SESSION["user"]);
        }
        ?>
        <form action="index.php?act=edit_tk" method="post">
            <div class="form-field">
                Tên đăng ký <br>
                <input type="text" name="username" value="<?= $username ?> ">
            </div>

            <div class="form-field">
                Email <br>
                <input type="email" name="email" value="<?= $email ?> ">
            </div>

            <div class="form-field">
                Mật khẩu <br>
                <input type="password" name="pass" value="<?= $pass ?> ">
            </div>

            <div class="form-field">
                Địa chỉ <br>
                <input type="text" name="address" value="<?= $address ?> ">
            </div>

            <div class="form-field">
                Số điện thoại <br>
                <input type="text" name="tel" value="<?= $tel ?> ">
            </div>

            <div class="form-field flex_c">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input style="margin-right: 10px;" type="submit" name="capnhat" value="Cập nhật">
                <input type="reset" value="Nhập lại">
            </div>
        </form>
        <h2 class="thongbao">

        </h2>
    </div>
</div>