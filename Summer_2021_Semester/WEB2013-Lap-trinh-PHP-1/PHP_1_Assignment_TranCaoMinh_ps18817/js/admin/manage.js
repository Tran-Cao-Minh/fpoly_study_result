// --------------------------------------------------------------------------------------------
// THEM SU KIEN DOI MAU CHO CAC BUTTON THANH SELECT-BAR
// lay cac button cua thanh select-bar
let buttons = document.querySelectorAll('.select-bar button');
// tao bien chua class doi mau
let btn_color_class = '';

// them su kien doi mau cho cac button
buttons.forEach((button) => {
    button.addEventListener('click', function () {
        // lay class boostrap doi mau theo button_name
        switch (this.dataset.id) {
            case 'chuc_nang_1':
                btn_color_class = 'btn btn-primary';
                break;
            case 'chuc_nang_2':
                btn_color_class = 'btn btn-danger';
                break;
            case 'chuc_nang_3':
                btn_color_class = 'btn btn-warning';
                break;
            case 'chuc_nang_4':
                // chuc nang 4 la 1 link -> khong can doi mau
                break;
            case 'chuc_nang_5':
                btn_color_class = 'btn btn-success';
                break;
        }

        buttons.forEach((button) => {
            if (button.dataset.id == this.dataset.id) {
                button.className = btn_color_class;

            } else {
                button.className = 'btn';
            }
        });

        sessionStorage.setItem('id_chuc_nang', this.dataset.id);
    });
});

// --------------------------------------------------------------------------------------------
// THEM SU KIEN CHUYEN DOI FORM TUONG UNG THEO CHUC NANG - control-area
// lay tat ca cac vung chua form
let form_areas = document.querySelectorAll('.control-area > div[id^="chuc_nang"]');

// an tat ca vung chua form can thiet khi tai trang
form_areas.forEach((form_area) => {
    form_area.style.display = 'none';
});

// hien thi form tuong ung khi click vao cac button - dong 3 - manage js
buttons.forEach((button) => {
    button.addEventListener('click', function () {
        form_areas.forEach((form_area) => {
            form_area.style.display = 'none';
        });

        // hien thi form theo button_name - tru chuc nang 4 khong co form
        if (this.dataset.id != 'chuc_nang_4') {
            document.getElementById(this.dataset.id).style.display = 'block';
        }
    });
}); 

// tu dong click vao button chuc nang duoc luu trong session - chuyen doi tuong ung
buttons.forEach((button) => {
    if (
        button.dataset.id == sessionStorage.getItem('id_chuc_nang') &&
        button.dataset.id != 'chuc_nang_4' // tru chuc nang 4 do no bat tai lai trang
    ) {
        button.click();
    }
});

// --------------------------------------------------------------------------------------------
// SU KIEN XOA SESSION LUU CHUC NANG KHI CLICK VAO LINK CHUYEN HUONG
let all_page_link = document.querySelectorAll('aside nav a');

all_page_link.forEach((page_link) => {
    page_link.addEventListener('click', function () {
        sessionStorage.removeItem('id_chuc_nang');
    });
});