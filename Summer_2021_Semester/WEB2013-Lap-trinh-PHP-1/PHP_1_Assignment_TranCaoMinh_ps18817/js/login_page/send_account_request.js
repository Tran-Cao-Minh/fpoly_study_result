$(document).ready( function() {
    // --------------------------------------------------
    // SU KIEN GUI YEU DOI MAT KHAU LEN SERVER AJAX
    $('.change-password-form button[type=submit]').on('click', function(submit_event) {
        submit_event.preventDefault();
        let submit_change_password_button = $(this);

        checkOldPassword();
        checkNewPassword();
        checkRetypeNewPassword();
        
        if (submit_change_password_button.attr('class') === 'allow-submit') {
            submit_change_password_button.html('đang đổi mật khẩu ...');
            $.ajax({
                url: '../../pages/model/change_user_password.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    old_password: old_password.value,
                    new_password: new_password.value
                }
            }).done( function(result) {
                let full_screen_notification = $('#full-screen-notification');
                let notification = full_screen_notification.find('.content');

                if (result === 'success') {
                    notification.html('đổi mật khẩu thành công, vui lòng đăng nhập lại!');
                    full_screen_notification.css('display', 'flex');

                    setTimeout(function () {
                        location.href = './index.php?action=dang_nhap';
                    }, 2000);

                } else if (result === 'fail') {
                    submit_change_password_button.html('xác nhận');

                    notification.html('bạn nhập sai mật khẩu cũ rồi!');
                    full_screen_notification.css('display', 'flex');
                }
            });
        }
    })

    
    // --------------------------------------------------
    // DANG XUAT KHOI TAI KHOAN
    let log_out_button = document.querySelector('.account-information-form .log-out');

    log_out_button.addEventListener('click', function() {
        let full_screen_notification = document.querySelector('#full-screen-notification');
        let notification = full_screen_notification.querySelector('.content');

        notification.innerHTML = 'đang xử lý đăng xuất... !';
        full_screen_notification.style.display = 'flex';

        // xoa cookie ve thong tin dang nhap nguoi dung
        document.cookie = 'user_id=delete; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
        document.cookie = 'user_password=delete; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';

        setTimeout( function() {
            location.href = './index.php?action=dang_nhap';
        }, 2000);
    })
})