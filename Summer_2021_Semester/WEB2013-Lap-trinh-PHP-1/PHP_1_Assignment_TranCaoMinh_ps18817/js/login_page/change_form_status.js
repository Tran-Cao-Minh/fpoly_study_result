// --------------------------------------------------
// CHUC NANG HIEN THI HOAC AN MAT KHAU INPUT:TYPE=PASSWORD
function changeInputPasswordStatus(input) {
    let clickable_area = input.parentElement.querySelector('.input-password-status');

    clickable_area.addEventListener('click', function () {
        if (input.getAttribute('type') === 'text') {
            input.setAttribute('type', 'password');
            clickable_area.innerHTML = 'Ẩn <i class="fas fa-eye-slash"></i>';

        } else if (input.getAttribute('type') === 'password') {
            input.setAttribute('type', 'text');
            clickable_area.innerHTML = 'Hiện <i class="fas fa-eye"></i>';
        }
    })
}

// --------------------------------------------------
// CHUC NANG CHUYEN DOI TRANG THAI INPUT VA BUTTON TRONG FORM
let notification_content = '';

function changeFormStatus(
    input,
    status,
    notification_content,
    check_array,
    submit_button,
    session_key
) {
    let notification = input.parentElement.querySelector('.notification');

    if (status === false) {
        notification.style.color = 'var(--red)';
        input.style.borderColor = 'var(--red)';

    } else if (status === true) {
        notification.style.color = 'var(--secondary-color)';
        input.style.borderColor = 'var(--secondary-color)';

        notification_content = '<i class="fas fa-check"></i>';
    }

    notification.innerHTML = notification_content;

    let check_result = true;

    for (let check_element in check_array) {
        if (check_array[check_element] === false) {
            check_result = false;
        }
    }

    if (check_result === false) {
        submit_button.setAttribute('class', 'not-allow-submit');

    } else if (check_result === true) {
        submit_button.setAttribute('class', 'allow-submit');
    }

    if (session_key !== null) {
        sessionStorage.setItem(session_key, input.value);
    }
}