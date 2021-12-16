<!-- BODY -->
        <section class="login">
            <div class="title">
                <div class="label-list-choosen">
                    <!-- noi dung dang ky hay dang nhap xu ly voi file login.js -->
                </div>
                <div class="label-list">
                    <!-- noi dung dang ky hay dang nhap xu ly voi file login.js -->
                </div>
            </div>
            <div class="login-area">
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label for="login-input-1">Tài khoản:</label>
                            <input type="text" name="account" id="login-input-1" 
                                placeholder="Email/Số điện thoại/Tên đăng nhập">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="login-input-2">Mật khẩu:</label>
                            <div class="input-password-status">
                                Ẩn <i class="fas fa-eye-slash"></i>
                            </div>
                            <input type="password" name="password" id="login-input-2" 
                                placeholder="Từ 4 đến 20 kí tự">
                            <span class="notification"></span>
                        </div>
                        <button type="submit" class="not-allow-submit">
                            đăng nhập
                        </button>
                    </form>
                    <div class="suggest">
                        <div>
                            Quên mật khẩu?
                        </div>
                        <div class="register">
                            Tạo tài khoản
                        </div>
                    </div>
                    <div class="social-login">
                        <div class="title">
                            Hoặc đăng nhập bằng
                        </div>
                        <div class="social-list">
                            <a href="#">
                                <div class="social-item">
                                    <img src="../../images/login/face.png" alt="" >
                                </div>
                            </a>
                            <a href="#">
                                <div class="social-item">
                                    <img src="../../images/login/google.png" alt="" >
                                </div>
                            </a>
                            <a href="#">
                                <div class="social-item">
                                    <img src="../../images/login/zalo.png" alt="" >
                                </div>
                            </a>
                        </div>
                        <div class="note">
                            Bằng việc đăng nhập, bạn đã chấp nhận 
                            <a href="#">điều khoản sử dụng</a>
                        </div>
                    </div>
                </div>
                <div class="rgtr-form">
                    <form>
                        <div class="form-group">
                            <label for="register-input-1">Họ và tên:</label>
                            <input type="text" name="name" id="register-input-1" 
                                placeholder="Trần Cao Minh">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="register-input-2">Email:</label>
                            <input type="email" name="email" id="register-input-2" 
                                placeholder="x@gmail.com">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="register-input-3">Số điện thoại:</label>
                            <input type="text" name="number_phone" id="register-input-3" 
                                placeholder="0332340123">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="register-input-4">Địa chỉ:</label>
                            <input type="text" name="address" id="register-input-4" 
                                placeholder="TP/Tỉnh, Quận/Huyện, Phường/Ấp, Số nhà">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="register-input-5">Tên đăng nhập:</label>
                            <input type="text" name="account" id="register-input-5" 
                                placeholder="Tên đăng nhập">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="register-input-6">Mật khẩu:</label>
                            <div class="input-password-status">
                                Ẩn <i class="fas fa-eye-slash"></i>
                            </div>
                            <input type="password" name="password" id="register-input-6" 
                                placeholder="Từ 4 đến 20 kí tự">
                            <span class="notification"></span>    
                        </div>
                        <div class="form-group">
                            <label for="register-input-7">Nhập lại mật khẩu:</label>
                            <div class="input-password-status">
                                Ẩn <i class="fas fa-eye-slash"></i>
                            </div>
                            <input type="password" name="retype_password" id="register-input-7" 
                                placeholder="Trùng với mật khẩu">
                            <span class="notification"></span>
                        </div>
                        <button type="submit" class="not-allow-submit">
                            đăng ký
                        </button>
                    </form>
                </div>
            </div>
        </section>
<!-- END BODY -->
<!-- lay tat ca user_name vao mang truoc khi qua login.js -->
<script type="text/javascript">
    let all_user_name = "<?php getAllUserName(); ?>";
    all_user_name = all_user_name.split('|');
    all_user_name.shift();
</script>
