        <!-- BODY -->
        <?php
            // neu lay thong tin khong thanh cong -> dang nhap lai
            if (gettype($user_information) !== 'array') {
                // do khong the dung header PHP -> dung javascript
                echo '<script>location.href = "./index.php?action=dang_nhap"</script>';
            }
        ?>
        <section class="login">
            <div class="title">
                <div class="label-list-choosen">
                    Thông Tin Tài Khoản
                </div>
            </div>
            <div class="login-area">
                <div class="account-information-form">
                    <div class="form-group">
                        <label for="account-input-1">Họ và tên:</label>
                        <input type="text" name="name" id="account-input-1" disabled
                            value="<?php echo $user_information['ten_khach_hang']; ?>" >
                        <span class="notification"></span>
                    </div>
                    <div class="form-group">
                        <label for="account-input-2">Email:</label>
                        <input type="email" name="email" id="account-input-2" disabled
                            value="<?php echo $user_information['email']; ?>" >
                        <span class="notification"></span>
                    </div>
                    <div class="form-group">
                        <label for="account-input-3">Số điện thoại:</label>
                        <input type="text" name="number_phone" id="account-input-3" disabled
                            value="<?php echo $user_information['so_dien_thoai']; ?>" >
                        <span class="notification"></span>
                    </div>
                    <div class="form-group">
                        <label for="account-input-4">Địa chỉ:</label>
                        <input type="text" name="address" id="account-input-4" disabled
                            value="<?php echo $user_information['dia_chi']; ?>" >
                        <span class="notification"></span>
                    </div>
                    <form class="change-password-form">
                        <div class="form-group">
                            <label for="account-input-5">Mật khẩu cũ:</label>
                            <div class="input-password-status">
                                Ẩn <i class="fas fa-eye-slash"></i>
                            </div>
                            <input type="password" name="old_password" id="account-input-5"
                                placeholder="Từ 4 đến 20 kí tự">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="account-input-6">Mật khẩu mới:</label>
                            <div class="input-password-status">
                                Ẩn <i class="fas fa-eye-slash"></i>
                            </div>
                            <input type="password" name="new_password" id="account-input-6"
                                placeholder="Từ 4 đến 20 kí tự">
                            <span class="notification"></span>
                        </div>
                        <div class="form-group">
                            <label for="account-input-7">Nhập lại mật khẩu mới:</label>
                            <div class="input-password-status">
                                Ẩn <i class="fas fa-eye-slash"></i>
                            </div>
                            <input type="password" name="retype_new_password" id="account-input-7"
                                placeholder="Từ 4 đến 20 kí tự">
                            <span class="notification"></span>
                        </div>
                        <button type="submit" class="not-allow-submit">
                            xác nhận
                        </button>
                    </form>
                    <div class="suggest">
                        <div class="change-password">
                            Đổi mật khẩu
                        </div>
                        <div class="log-out">
                            Đăng xuất
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END BODY -->