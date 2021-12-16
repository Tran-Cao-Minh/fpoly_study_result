$(document).ready(function () {
    // --------------------------------------------------
    // THEM BINH LUAN QUA AJAX
    $('.post-comment button.post').on('click', function () {
        let comment_content = $('.post-comment textarea').val();
        let full_screen_notification = $('#full-screen-notification');
        let notification = full_screen_notification.find('.content');

        if (comment_content === '') {
            notification.html('bạn vui lòng nhập bình luận trước khi đăng !');
            full_screen_notification.css('display', 'flex');

        } else {
            let post_comment_button = $('.post-comment button.post');
            post_comment_button.html('đang đăng bình luận ...');

            let product_id = post_comment_button.data('product_id');
            
            $.ajax({
                url: '../../pages/model/add_comment.php',
                type: 'GET',
                dataType: 'html',
                data: {
                    comment_content: comment_content,
                    product_id: product_id
                }
            }).done( function(output) {
                if (output === 'not login') {
                    notification.html('bạn vui lòng đăng nhập để đăng bình luận !');
                    full_screen_notification.css('display', 'flex');
        
                } else if (output === 'fail') {
                    notification.html('không thể đăng bình luận do lỗi, mong bạn thông cảm !');
                    full_screen_notification.css('display', 'flex');

                } else if (output === 'false password or username') {
                    notification.html('bạn vui lòng đăng nhập lại để thêm bình luận !');
                    full_screen_notification.css('display', 'flex');

                } else {
                    $('.post-comment textarea').val('');
                    $('.contain-comment ul.comment-list').prepend(output);
                }
                post_comment_button.html('đăng bình luận &nbsp; <i class="fas fa-comments"></i>');
            });
        }
    })
})