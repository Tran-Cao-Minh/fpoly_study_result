            <aside>
                <div class="heading">
                    <span>
                        chọn chức năng
                    </span>
                </div>
                <nav>
                    <a href="../controller/manage_database.php?page=quan_ly_danh_muc">
                        <i class="fas fa-file-alt"></i>&nbsp;
                        quản lý danh mục
                    </a>
                    <a href="../controller/manage_database.php?page=quan_ly_san_pham">
                        <i class="fas fa-book"></i>&nbsp;
                        quản lý sản phẩm
                    </a>
                </nav>
                <form action="./manage_database.php" class="log-out" method="GET">
                    <span class="title">
                        Xin chào Quản trị viên:
                    </span>
                    <span class="admin-name">
                        <?php echo $admin_name; ?>
                    </span>
                    <button type="submit" name="log_out">
                        <i class="fas fa-sign-out-alt"></i>
                        đăng xuất
                    </button>
                </form>
            </aside>