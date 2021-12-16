$(document).ready( function() {
    // --------------------------------------------------
    // SU KIEN GUI YEU CAU DANG KY LEN SERVER AJAX
    $('.rgtr-form button[type=submit]').on('click', function(submit_event) {
        submit_event.preventDefault();
        let submit_register_button = $(this);

        checkRegisterName();
        checkRegisterEmail();
        checkRegisterNumberPhone();
        checkRegisterAddress();
        checkRegisterAccount();
        checkRegisterPassword();
        checkRegisterRetypePassword();

        if (submit_register_button.attr('class') === 'allow-submit') {
            submit_register_button.html('đang đăng ký ...');
            $.ajax({
                url: '../../pages/model/add_user.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    full_name: register_name.value,
                    email: register_email.value,
                    number_phone: register_number_phone.value,
                    address: register_address.value,
                    account: register_account.value,
                    password: register_password.value
                }
            }).done( function(result) {
                let full_screen_notification = $('#full-screen-notification');
                let notification = full_screen_notification.find('.content');

                if (result === 'success') {
                    submit_register_button.html('đăng ký');

                    changeForm();
                    
                    sessionStorage.setItem('login_account', register_account.value);
                    sessionStorage.setItem('login_password', register_password.value);
                    login_account.value = sessionStorage.getItem('login_account');
                    login_password.value = sessionStorage.getItem('login_password');

                    checkLoginAccount();
                    checkLoginPassword();

                    notification.html('đăng ký thành công!');
                    full_screen_notification.css('display', 'flex');

                } else if (result === 'fail') {
                    notification.html('có lỗi xảy ra, mong bạn thông cảm. tải lại trang sau 3 giây!');
                    full_screen_notification.css('display', 'flex');

                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            });
        }
    })

    // --------------------------------------------------
    // SU KIEN GUI YEU CAU DANG NHAP LEN SERVER AJAX
    $('.login-form button[type=submit]').on('click', function(submit_event) {
        submit_event.preventDefault();
        let submit_login_button = $(this);

        checkLoginAccount();
        checkLoginPassword();

        if (submit_login_button.attr('class') === 'allow-submit') {
            submit_login_button.html('xử lý đăng nhập ...');
            $.ajax({
                url: '../../pages/model/check_login.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    account: login_account.value,
                    password: login_password.value 
                }
            }).done( function(result) {
                let full_screen_notification = $('#full-screen-notification');
                let notification = full_screen_notification.find('.content');

                if (result === 'success') {
                    notification.html('đăng nhập thành công, vào tài khoản sau 3 giây!');
                    full_screen_notification.css('display', 'flex');

                    setTimeout(function () {
                        location.href = './index.php?action=tai_khoan';
                    }, 2000);


                } else if (result === 'fail') {
                    submit_login_button.html('đăng nhập');

                    notification.html('bạn nhập sai tài khoản hoặc mật khẩu rồi!');
                    full_screen_notification.css('display', 'flex');
                }
            });
        }
    })
})