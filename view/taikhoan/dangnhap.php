<div class="content">
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Đăng Nhập
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">hoặc đăng nhập với:</p>
                    </div>
                    <form class="login-form" action="index.php?act=dangnhap" method="post" onsubmit="return validateForm()">
                    <div class="input-group">
                        <input type="text" id="username" name="username" class="auth-form-input" placeholder="Họ tên" >
                        <div id="username-error" class="error-message"></div>
                    </div>
                        <div class="input-icon input-group">
                            <input type="password" id="pass" name="pass" class="auth-form-input" placeholder="Mật khẩu">
                            <i class="fa fa-eye show-password"></i>
                            <div id="pass-error" class="error-message"></div>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name='email' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i>
                            <span> Ghi nhớ mật khẩu.</span>
                        </label>
                        <br>
                        <?=$erro?>
                        
                        <div class="footer-action">
                            <input type="submit" value="Đăng nhập" name="dangnhap" class="auth-submit">
                            <a href="index.php?act=dangky" class="auth-btn-direct">Đăng ký</a>
                        </div>
                    </form>
                    <div class="auth-forgot-password">
                        <a href="index.php?act=quenmk">Quên mật khẩu</a>
                    </div>
                    
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="assets/images/vector.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
</div>