$(document).ready(function () {
    // --------------------------------------------------
    // CHUC NANG TIM KIEM THEO TU KHOA DUOC NHAP
    $('.search-area input').on('change', function() {
        let key_word = $('.search-area input').val();
        sessionStorage.setItem('key_word', key_word);
        
        if (key_word != '') {
            location.href = './index.php?action=san_pham&key_word=' + key_word;

        } else {
            location.href = './index.php?action=san_pham';
        }
    });
    

})