            </main>
        </div>
        <!-- FOOTER -->
        <footer>
            <div class="inf">
                <span class="fs-1 text-center">
                    Được tạo bởi: Trần Cao Minh - PS18817
                </span>
            </div>
        </footer>
        <!-- END FOOTER -->
    </div>
    <!-- dung php tao cac link js -->
    <?php
        if (isset($link_javascript_arr)) {
            foreach ($link_javascript_arr as $link_javascript) {
                echo '<script src="' . $link_javascript . '"></script>';
            }
        }
    ?>
</body>

</html>