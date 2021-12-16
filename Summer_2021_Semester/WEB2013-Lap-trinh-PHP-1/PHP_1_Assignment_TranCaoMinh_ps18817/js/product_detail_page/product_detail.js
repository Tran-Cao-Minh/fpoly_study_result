window.onload = function () {
    // --------------------------------------------------
    // THEM SAN PHAM VAO GIO HANG QUA LOCAL-STORAGE
    let product_in_cart = []; // tao mang de tien luu tru

    if (localStorage.getItem('product_in_cart') !== null) {
        product_in_cart = JSON.parse(localStorage.getItem('product_in_cart'));
    }

    let add_to_cart_button = document.querySelector('.product-detail button.add-to-cart'); 

    add_to_cart_button.addEventListener('click', function () {
        let prod_name = this.parentElement.querySelector('.product-name').innerText;

        // neu da co san pham trong gio hang thi chi tang so luong
        let check_product_in_cart = false; 
        for (let i = 0; i < product_in_cart.length; i++) {
            if (product_in_cart[i].name === prod_name) {
                product_in_cart[i].quantity++;
                check_product_in_cart = true;
                break;
            }
        }
        
        // neu chua co san pham trong gio hang thi them vao mang local-storage
        if (check_product_in_cart === false) {
            let img_link = add_to_cart_button.parentElement.parentElement.querySelector('img').getAttribute('src');
            let price = add_to_cart_button.parentElement.querySelector('.price').innerText; 
            let old_price = add_to_cart_button.parentElement.querySelector('.old-price').innerText; 

            let product_object = {
                name: prod_name,
                img_link: img_link,
                price: price,
                old_price: old_price,
                quantity: 1
            };
            product_in_cart.push(product_object);
        }
        localStorage.setItem('product_in_cart', JSON.stringify(product_in_cart));
    });
};