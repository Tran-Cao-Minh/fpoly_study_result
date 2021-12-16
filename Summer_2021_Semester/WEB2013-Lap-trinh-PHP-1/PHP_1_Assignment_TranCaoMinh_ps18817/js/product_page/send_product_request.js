$(document).ready(function () {
    let product_in_cart = []; // tao mang luu tru cac san pham da duoc them vao gio hang
    if (localStorage.getItem("product_in_cart") !== null) {
        // neu da co mang tu truoc thi them vao mang
        product_in_cart = JSON.parse(localStorage.getItem("product_in_cart"));
    }

    // --------------------------------------------------
    // LAY DANH SACH SAN PHAM QUA AJAX
    function getProductListData(scroll = true) {
        if (scroll == true) {
            $('html').animate({
                    scrollTop: $('header').height()
                },
                'slow'
            );
        }
        
        if (sessionStorage.getItem('key_word') == null) {
            sessionStorage.setItem('key_word', '');
        }

        $.ajax({
            url: '../../pages/model/get_product_list_data.php',
            type: 'GET',
            dataType: 'html',
            data: {
                category_list: sessionStorage.getItem('category_list'),
                price_range_list: sessionStorage.getItem('price_range_list'),
                order_rule: sessionStorage.getItem('order_rule'),
                page_num: sessionStorage.getItem('page_num'),
                page_size: sessionStorage.getItem('page_size'),
                key_word: sessionStorage.getItem('key_word')
            }
        }).done(function (output) {
            $('.contain-prod-list').empty();
            $('.contain-prod-list').append(output);

            // cap nhat va them su kien cho link cac trang san pham
            let page_link_list = $('.product-page-list li[data-page_num]');
            page_link_list.each(function () {
                let page_link = $(this);

                page_link.on('click', function () {
                    sessionStorage.setItem('page_num', page_link.data('page_num'));
                    getProductListData(true);
                });
            });

            // them su kien them san pham vao gio cho san pham khi load lai
            let all_add_to_cart_button = $('.prod-item .add-to-cart');

            all_add_to_cart_button.each( function() {
                let add_to_cart_button = $(this);

                add_to_cart_button.on('click', function () {
                    // do .text() jquery lay luon khoang trang nen phai dung .prop('innerText')
                    let prod_name = add_to_cart_button.parent().find('.name').prop('innerText'); 

                    // neu co san pham trong gio hang roi thi chi tang so luong
                    let check_prod_in_cart = false; 
                    for (let i = 0; i < product_in_cart.length; i++) {
                        if (product_in_cart[i].name === prod_name) {
                            product_in_cart[i].quantity++;
                            check_prod_in_cart = true;
                            break;
                        }
                    }

                    // neu chua co thi them san pham vao mang localStorage gio hang
                    if (check_prod_in_cart === false) {
                        let img_link = add_to_cart_button.parent().find('img').attr('src');
                        // do .text() jquery lay luon khoang trang nen phai dung .prop('innerText')
                        let price = add_to_cart_button.parent().find('.price span').prop('innerText'); 
                        let old_price = add_to_cart_button.parent().find('.old-price span').prop('innerText'); 

                        let product_object = {
                            name: prod_name,
                            img_link: img_link,
                            price: price,
                            old_price: old_price,
                            quantity: 1
                        };
                        product_in_cart.push(product_object);
                    }

                    localStorage.setItem("product_in_cart", JSON.stringify(product_in_cart));
                });
            });
        });
    }

    // tu dong hien thi san pham khi load trang
    let category_list = [];
    sessionStorage.setItem('category_list', JSON.stringify(category_list));
    let price_range_list = [];
    sessionStorage.setItem('price_range_list', JSON.stringify(price_range_list));

    sessionStorage.setItem('order_rule', 'moi_nhat');
    sessionStorage.setItem('page_num', '1');

    let view_width = $(document).width();
    if (view_width > 1240) {
        sessionStorage.setItem('page_size', '15');

    } else if (view_width <= 1240) {
        sessionStorage.setItem('page_size', '12');
    }

    getProductListData(false);

    // --------------------------------------------------
    // THAY DOI DANH SACH SAN PHAM
    // theo co che xap sep
    let filter_sort = $('.filter-sort .filter-sort-choosen')
    filter_sort.on('DOMSubtreeModified', function () {
        if (filter_sort.attr('value') != sessionStorage.getItem('order_rule')) {
            sessionStorage.setItem('order_rule', filter_sort.attr('value'));
            sessionStorage.setItem('page_num', '1');
            getProductListData();
        }
    });

    // theo danh muc
    let category_checkbox_list = $("#category-list .select-item input");

    category_checkbox_list.each( function() {
        let category_checkbox = $(this);

        category_checkbox.on('click', function () {
            let value = category_checkbox.attr('id');
            let category_list = JSON.parse(sessionStorage.getItem('category_list'));

            if (value == 'all_category') {
                category_list = [];

            } else if (category_checkbox.prop('checked') == true) {
                category_list.push(value);

            } else if (category_checkbox.prop('checked') == false) {
                let index = category_list.indexOf(value);
                category_list.splice(index, 1);
            }

            sessionStorage.setItem('category_list', JSON.stringify(category_list));
            sessionStorage.setItem('page_num', '1');
            getProductListData(false);
        });
    });

    // theo muc gia
    let price_range_checkbox_list = $("#price-range-list .select-item input");

    price_range_checkbox_list.each( function() {
        let price_range_checkbox = $(this);

        price_range_checkbox.on('click', function () {
            let value = price_range_checkbox.attr('id');
            let price_range_list = JSON.parse(sessionStorage.getItem('price_range_list'));
            
            if (value == 'all_price') {
                price_range_list = [];

            } else if (price_range_checkbox.prop('checked') == true) {
                    price_range_list.push(value);

            } else if (price_range_checkbox.prop('checked') == false) {
                    let index = price_range_list.indexOf(value);
                    price_range_list.splice(index, 1);
                    
            }

            sessionStorage.setItem('price_range_list', JSON.stringify(price_range_list));
            sessionStorage.setItem('page_num', '1');
            getProductListData(false);
        });
    });
})