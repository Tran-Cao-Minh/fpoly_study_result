// I) hien cac san pham co muc gia phu hop
// Xu ly su kien change trong select: #chonMucGia
$('.mucGia > .form-control').change
    (function()
    {
        // cho cac san pham vao mot mang
        var itemsArr = $('tbody > tr');
        // cho tat cac san pham xuat hien 
        for(var i = 0; i < itemsArr.length; i++)
        {
            itemsArr[i].style.display = ""; // mac dinh la hien thi
        }
        // lay thong tin ve muc gia da chon
        var price = $(this).val();
        // xet dieu kien theo muc gia da chon
        if(price == 'lt200')
        {
            // cho cac san pham khong thoa dieu kien bien mat
            for(var i = 0; i < itemsArr.length; i++)
            {             
                var prodPrice = Number(itemsArr[i].querySelector('td:nth-child(3)').innerText);
                if( prodPrice >= 200)
                {
                    itemsArr[i].style.display = "none";
                }
            }
        }
        else if(price == 'btw200&500')
        {
            // cho cac san pham khong thoa dieu kien bien mat
            for(var i = 0; i < itemsArr.length; i++)
            {                     
                var prodPrice = Number(itemsArr[i].querySelector('td:nth-child(3)').innerText);
                if( prodPrice < 200 || prodPrice > 500)
                {
                    itemsArr[i].style.display = "none";
                }
            }
        }
        else if(price == 'gt500')
        {
            // cho cac san pham khong thoa dieu kien bien mat
            for(var i = 0; i < itemsArr.length; i++)
            {
                var prodPrice = Number(itemsArr[i].querySelector('td:nth-child(3)').innerText);
                if( prodPrice <= 500)
                {
                    itemsArr[i].style.display = "none";
                }
            }
        }
    }
    );

// II) tich vao check box => kich hoat nhap so luong
//     bo tich => vo hieu nhap so luong
//     co so luong => thanh tien
$('td input[type="checkbox"]').change
    (function()
    {
        // lay hang chua dung nut check box da duoc nhan
        var rowContent = $(this).parents().eq(1);
        // lay input:number trong hang duoc chon
        var noInput = rowContent.find("input[type='number']");
        // xu ly vo hieu / cho phep nhap
        noInput.attr('disabled',
                    function(choosen, status)
                    {
                        return !status;
                    }
                    );
        // lay o thanh tien trong hang duoc chon
        var intoM = rowContent.find('td:nth-child(5)');
        // bo di so luong, thanh tien da nhap neu vo hieu hoa
        if($(this).prop('checked') == false)
        {
            noInput.val('');
            intoM.text('');
        }
        // cho so luong mac dinh la 1 va hien thi gia
        else if($(this).prop('checked') == true)
        {
            noInput.val(1);
            // lay don gia trong o don gia
            var prodPrice = Number(rowContent.find('td:nth-child(3)').text());
            // kieu dang khi hien thi gia tien
            intoM.css({'font-size':'18px','color':'rgb(22, 104, 178)'});
            // tinh tien va hien thi
            intoM.text(noInput.val() * prodPrice);
        }
        calcSum();
    }
    );

// III) tinh tien theo o so luong 
$('td input[type="number"]').change
    (function()
    {
        // lay hang chua dung o so luong
        var rowContent = $(this).parents().eq(1);
        // lay o thanh tien trong hang duoc chon
        var intoM = rowContent.find('td:nth-child(5)');
        // kieu dang khi hien thi gia tien
        intoM.css({'font-size':'18px','color':'rgb(22, 104, 178)'});
        // lay don gia trong o don gia
        var prodPrice = Number(rowContent.find('td:nth-child(3)').text());
        // tinh tien dua theo so luong
        if($(this).val() >= 1 & $(this).val() <= 100000 & ($(this).val() % 1) == 0)
        {   // so luong phai lon hon 1 va nho hon 100000
            intoM.text($(this).val() * prodPrice);
        }
        // thong bao khi so luong khong hop ly
        else
        {
            // kieu dang khi nhap so luong sai
            intoM.css({'font-size':'xx-small','color':'red'});
            // thong bao
            intoM.text('Vui lòng chọn số lượng là số nguyên dương nhỏ hơn 100.000 !');
        }
        calcSum();
    }
    );

// IV ham tinh tong tien
function calcSum()
{
    // lay tat ca cac phan tu gia tien hien co
    var intoMArr = $('tbody td:nth-child(5)');
    // xu ly tong tien
    var sum = 0;
    for(var i = 0; i < intoMArr.length; i++)
    {
        sum += Number(intoMArr[i].innerText);
    }
    // hien thi tong tien
    if(sum > 0)
    {
        $('tfoot th:nth-child(2)').text(sum);
    }
    else // khi sum bang 0
    {
        $('tfoot th:nth-child(2)').text('');
    }
}