            <main class="login">
                <div class="login-form">
                    <form action="./manage_database.php" method="POST">
                        <div class="form-group">
                            <label>Tài khoản:</label>
                            <input type="text" name="admin_account"
                                placeholder="Tên đăng nhập">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu:</label>
                            <input type="password" name="admin_password" 
                                placeholder="Từ 4 đến 20 kí tự, chỉ bao gồm chữ cái không dấu và số">
                        </div>
                        <button type="submit">
                            xác nhận quyền quản trị
                        </button>
                        <?php if (isset($notification)): ?>
                            <span class="notification">
                                <?php echo $notification; ?>
                            </span>
                        <?php endif; ?>
                    </form>
                </div>