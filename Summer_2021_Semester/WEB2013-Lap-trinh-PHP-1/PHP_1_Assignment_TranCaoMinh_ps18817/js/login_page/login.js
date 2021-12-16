// --------------------------------------------------
// CHUYEN DOI GIUA DANG NHAP VA DANG KY
let login_form = document.querySelector('.login .login-form');
let register_form = document.querySelector('.login .rgtr-form');
let login_label = document.querySelector('.login .label-list');
let login_label_choosen = document.querySelector('.login .label-list-choosen');

login_label.addEventListener('click', changeForm);
document.querySelector('.login .register').addEventListener('click', changeForm);

function changeForm() {
    if (sessionStorage.getItem('form_status') === 'login') {
        sessionStorage.setItem('form_status', 'register');

    } else if (sessionStorage.getItem('form_status') === 'register') {
        sessionStorage.setItem('form_status', 'login');
    }
    displayForm();
}

function displayForm() {
    if (sessionStorage.getItem('form_status') === 'login') {
        login_label_choosen.innerText = 'Đăng Nhập';
        login_form.style.display = 'block';
        login_label.innerText = 'Đăng Ký';
        register_form.style.display = 'none';

    } else if (sessionStorage.getItem('form_status') === 'register') {
        login_label_choosen.innerText = 'Đăng Ký';
        register_form.style.display = 'block';
        login_label.innerText = 'Đăng Nhập';
        login_form.style.display = 'none';
    }
}

// --------------------------------------------------
// KIEM TRA FORM PHAN DANG NHAP
let submit_login_button = document.querySelector('.login-form button[type=submit]');
let check_login = [];
check_login['account'] = false;
check_login['password'] = false;

// Kiem tra ten dang nhap
let login_account = document.querySelector('.login-form input[name=account]');

login_account.addEventListener('change', checkLoginAccount);

function checkLoginAccount() {
    check_login['account'] = false;

    if (login_account.value === '') {
        notification_content = '* Vui lòng nhập tên tài khoản của bạn!';

    } else if (login_account.value.length < 4 || login_account.value.length > 20) {
        notification_content = '* Vui lòng nhập tên tài khoản từ 4 đến 20 ký tự!';

    } else if (/[^0-9a-zA-Z]/.test(login_account.value)) {
        notification_content = '* Tên tài khoản chỉ bao gồm chữ cái không dấu và các số từ 0 đến 9';

    } else {
        check_login['account'] = true;
    }

    changeFormStatus(
        login_account,
        check_login['account'],
        notification_content,
        check_login,
        submit_login_button,
        null
    );
}

// Kiem tra mat khau dang nhap
let login_password = document.querySelector('.login-form input[name=password]');
changeInputPasswordStatus(login_password);

login_password.addEventListener('change', checkLoginPassword);

function checkLoginPassword() {
    check_login['password'] = false;

    if (login_password.value === '') {
        notification_content = '* Vui lòng nhập mật khẩu của bạn!';

    } else if (login_password.value.length < 4 || login_password.value.length > 20) {
        notification_content = '* Vui lòng nhập mật khẩu từ 4 đến 20 ký tự!';

    } else if (/[^0-9a-zA-Z]/.test(login_password.value)) {
        notification_content = '* Mật khẩu chỉ bao gồm chữ cái không dấu và các số từ 0 đến 9';

    } else {
        check_login['password'] = true;
    }

    changeFormStatus(
        login_password,
        check_login['password'],
        notification_content,
        check_login,
        submit_login_button,
        null
    );
}

// --------------------------------------------------
// CHUC NANG KIEM TRA FORM DANG KY
let submit_register_button = document.querySelector('.rgtr-form button[type=submit]');
let check_register = [];
check_register['name'] = false;
check_register['email'] = false;
check_register['number_phone'] = false;
check_register['address'] = false;
check_register['account'] = false;
check_register['password'] = false;
check_register['retype_password'] = false;

// Kiem tra ten dang ky
let register_name = document.querySelector('.rgtr-form input[name=name]');

register_name.addEventListener('change', checkRegisterName);

function checkRegisterName() {
    check_register['name'] = false;

    if (register_name.value === '') {
        notification_content = '* Vui lòng nhập họ tên của bạn!';

    } else if (/[0-9]/.test(register_name.value)) {
        notification_content = '* Họ tên không bao gồm số!';

    } else if (register_name.value.length >= 100) {
        notification_content = '* Vui lòng nhập họ tên ngắn hơn 100 ký tự!';

    } else {
        check_register['name'] = true;
    }

    changeFormStatus(
        register_name,
        check_register['name'],
        notification_content,
        check_register,
        submit_register_button,
        'register_name'
    );
}

// Kiem tra email dang ky
let register_email = document.querySelector('.rgtr-form input[name=email]');
register_email.addEventListener('change', checkRegisterEmail);

function checkRegisterEmail() {
    check_register['email'] = false;

    if (register_email.value === '') {
        notification_content = '* Vui lòng nhập email của bạn!';

    } else if (/^[0-9a-zA-Z]+@gmail.com$/.test(register_email.value) === false) {
        notification_content = '* Vui lòng nhập đúng định dạng email có đuôi @gmail.com';

    } else if (register_email.value.length >= 100) {
        notification_content = '* Vui lòng chọn tên email ngắn hơn 100 ký tự!';

    } else {
        check_register['email'] = true;
    }

    changeFormStatus(
        register_email,
        check_register['email'],
        notification_content,
        check_register,
        submit_register_button,
        'register_email'
    );
}

// Kiem tra dien thoai dang ky
let register_number_phone = document.querySelector('.rgtr-form input[name=number_phone]');

register_number_phone.addEventListener('change', checkRegisterNumberPhone);

function checkRegisterNumberPhone() {
    check_register['number_phone'] = false;

    if (register_number_phone.value === '') {
        notification_content = '* Vui lòng nhập số điện thoại của bạn!';

    } else if (/[^0-9]/.test(register_number_phone.value)) {
        notification_content = '* Vui lòng nhập đúng định dạng số điện thoại!';

    } else if (register_number_phone.value.length < 10 || register_number_phone.value.length > 11) {
        notification_content = '* Vui lòng nhập số điện thoại từ 10 đến 11 số!';

    } else {
        check_register['number_phone'] = true;
    }

    changeFormStatus(
        register_number_phone,
        check_register['number_phone'],
        notification_content,
        check_register,
        submit_register_button,
        'register_number_phone'
    );
}

// Kiem tra dia chi dang ky
let register_address = document.querySelector('.rgtr-form input[name=address]');

register_address.addEventListener('change', checkRegisterAddress);

function checkRegisterAddress() {
    check_register['address'] = false;

    if (register_address.value === '') {
        notification_content = '* Vui lòng nhập địa chỉ của bạn!';

    } else if (register_address.value.length >= 100) {
        notification_content = '* Vui lòng nhập địa chỉ ngắn hơn 100 ký tự!';

    } else {
        check_register['address'] = true;
    }

    changeFormStatus(
        register_address,
        check_register['address'],
        notification_content,
        check_register,
        submit_register_button,
        'register_address'
    );
}

// Kiem tra tai khoan dang ky
let register_account = document.querySelector('.rgtr-form input[name=account]');

register_account.addEventListener('change', checkRegisterAccount);

function checkRegisterAccount() {
    check_register['account'] = false;

    if (register_account.value === '') {
        notification_content = '* Vui lòng nhập tên đăng nhập của bạn!';

    } else if (register_account.value.length < 4 || register_account.value.length > 20) {
        notification_content = '* Vui lòng nhập tên đăng nhập từ 4 đến 20 ký tự!';

    } else if (/[^0-9a-zA-Z]/.test(register_account.value)) {
        notification_content = '* Tên đăng nhập chỉ bao gồm chữ cái không dấu và các số từ 0 đến 9';

    } else {
        check_register['account'] = true;

        all_user_name.forEach(function checkUserNameExist(user_name) {
            if (register_account.value === user_name) {
                notification_content = '* Tên tài khoản đã tồn tại vui lòng chọn tên tài khoản khác!';
                check_register['account'] = false;
            }
        });
    }

    changeFormStatus(
        register_account,
        check_register['account'],
        notification_content,
        check_register,
        submit_register_button,
        'register_account'
    );
}

// Kiem tra mat khau dang ky
let register_password = document.querySelector('.rgtr-form input[name=password]');
changeInputPasswordStatus(register_password);
register_password.addEventListener('change', checkRegisterRetypePassword);

register_password.addEventListener('change', checkRegisterPassword);

function checkRegisterPassword() {
    check_register['password'] = false;

    if (register_password.value === '') {
        notification_content = '* Vui lòng nhập mật khẩu của bạn!';

    } else if (register_password.value.length < 4 || register_password.value.length > 20) {
        notification_content = '* Vui lòng nhập mật khẩu từ 4 đến 20 ký tự!';

    } else if (/[^0-9a-zA-Z]/.test(this.value)) {
        notification_content = '* Mật khẩu chỉ bao gồm chữ cái không dấu và các số từ 0 đến 9!';

    } else {
        check_register['password'] = true;
    }

    changeFormStatus(
        register_password,
        check_register['password'],
        notification_content,
        check_register,
        submit_register_button,
        'register_password'
    );
}

// Kiem tra nhap lai mat khau dang ky
let register_retype_password = document.querySelector('.rgtr-form input[name=retype_password]');
changeInputPasswordStatus(register_retype_password);

register_retype_password.addEventListener('change', checkRegisterRetypePassword);

function checkRegisterRetypePassword() {
    check_register['retype_password'] = false;

    if (register_retype_password.value === '') {
        notification_content = '* Vui lòng nhập lại mật khẩu của bạn!';

    } else if (register_retype_password.value !== register_password.value) {
        notification_content = '* Vui lòng nhập lại đúng mật khẩu của bạn!';

    } else {
        check_register['retype_password'] = true;
    }

    changeFormStatus(
        register_retype_password,
        check_register['retype_password'],
        notification_content,
        check_register,
        submit_register_button,
        'register_retype_password'
    );
}

// --------------------------------------------------
// KIEM TRA, TU DONG DIEN FORM KHI NGUOI DUNG NHAN TAI LAI, HOAC TU TRANG KHAC QUA
window.onload = function () {
    // Trang thai form
    if (sessionStorage.getItem('form_status') === null) {
        sessionStorage.setItem('form_status', 'login');
    }
    displayForm();

    // Tu dong dien form dang ky
    if (sessionStorage.getItem('register_name') !== null) {
        register_name.value = sessionStorage.getItem('register_name');
        checkRegisterName();
    }
    if (sessionStorage.getItem('register_email') !== null) {
        register_email.value = sessionStorage.getItem('register_email');
        checkRegisterEmail();
    }
    if (sessionStorage.getItem('register_number_phone') !== null) {
        register_number_phone.value = sessionStorage.getItem('register_number_phone');
        checkRegisterNumberPhone();
    }
    if (sessionStorage.getItem('register_address') !== null) {
        register_address.value = sessionStorage.getItem('register_address');
        checkRegisterAddress();
    }
    if (sessionStorage.getItem('register_account') !== null) {
        register_account.value = sessionStorage.getItem('register_account');
        checkRegisterAccount();
    }
    if (sessionStorage.getItem('register_password') !== null) {
        register_password.value = sessionStorage.getItem('register_password');
        checkRegisterPassword();
    }
    if (sessionStorage.getItem('register_retype_password') !== null) {
        register_retype_password.value = sessionStorage.getItem('register_retype_password');
        checkRegisterRetypePassword();
    }
}