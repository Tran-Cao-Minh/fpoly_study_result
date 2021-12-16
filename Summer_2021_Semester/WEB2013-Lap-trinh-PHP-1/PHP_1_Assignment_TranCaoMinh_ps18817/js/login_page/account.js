// --------------------------------------------------
// AN HIEN FORM DOI MAT KHAU
let change_password_form = document.querySelector('.account-information-form .change-password-form');
change_password_form.style.display = 'none';
let change_password_area = document.querySelector('.account-information-form .change-password');

change_password_area.addEventListener('click', function() {
    change_password_form.style.display = 'block';
})

// --------------------------------------------------
// KIEM TRA DOI VIEC DOI MAT KHAU
let submit_change_password_button = document.querySelector('.change-password-form button[type=submit]');
let check_change_password = [];
check_change_password['old_password'] = false;
check_change_password['new_password'] = false;
check_change_password['retype_new_password'] = false;

// Kiem tra mat khau cu
let old_password = document.querySelector('.change-password-form input[name=old_password]');
changeInputPasswordStatus(old_password);

old_password.addEventListener('change', checkOldPassword);
function checkOldPassword() {
    check_change_password['old_password'] = false;

    if (old_password.value === '') {
        notification_content = '* Vui lòng nhập mật khẩu của bạn!';

    } else if (old_password.value.length < 4 || old_password.value.length > 20) {
        notification_content = '* Vui lòng nhập mật khẩu từ 4 đến 20 ký tự!';

    } else if (/[^0-9a-zA-Z]/.test(old_password.value)) {
        notification_content = '* Mật khẩu chỉ bao gồm chữ cái không dấu và các số từ 0 đến 9';

    } else {
        check_change_password['old_password'] = true;
    }

    changeFormStatus(
        old_password,
        check_change_password['old_password'],
        notification_content,
        check_change_password,
        submit_change_password_button,
        null
    );
}

// Kiem tra mat khau moi
let new_password = document.querySelector('.change-password-form input[name=new_password]');
changeInputPasswordStatus(new_password);

new_password.addEventListener('change', checkNewPassword);
old_password.addEventListener('change', checkNewPassword);
function checkNewPassword() {
    check_change_password['new_password'] = false;

    if (new_password.value === '') {
        notification_content = '* Vui lòng nhập mật khẩu mới của bạn!';

    } else if (new_password.value.length < 4 || new_password.value.length > 20) {
        notification_content = '* Vui lòng nhập mật khẩu từ 4 đến 20 ký tự!';

    } else if (/[^0-9a-zA-Z]/.test(new_password.value)) {
        notification_content = '* Mật khẩu chỉ bao gồm chữ cái không dấu và các số từ 0 đến 9';

    } else if (new_password.value === old_password.value) {
        notification_content = '* Mật khẩu mới phải khác với mật khẩu cũ';

    } else {
        check_change_password['new_password'] = true;
    }

    changeFormStatus(
        new_password,
        check_change_password['new_password'],
        notification_content,
        check_change_password,
        submit_change_password_button,
        null
    );
}

// Kiem tra mat khau moi duoc nhap lai
let retype_new_password = document.querySelector('.change-password-form input[name=retype_new_password]');
changeInputPasswordStatus(retype_new_password);

retype_new_password.addEventListener('change', checkRetypeNewPassword);
new_password.addEventListener('change', checkRetypeNewPassword);
function checkRetypeNewPassword() {
    check_change_password['retype_new_password'] = false;

    if (retype_new_password.value !== new_password.value) {
        notification_content = '* Vui lòng nhập lại đúng mật khẩu của bạn!';

    } else {
        check_change_password['retype_new_password'] = true;
    }

    changeFormStatus(
        retype_new_password,
        check_change_password['retype_new_password'],
        notification_content,
        check_change_password,
        submit_change_password_button,
        null
    );
}