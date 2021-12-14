var times = 0; // so lan choi
var ckCreNum = false; // kiem tra xem co tao so hay chua
$('#creNum').click // su kien click nut tao so
    (function()
    {
        // tao so
        $('#x').val(Math.round(Math.random()*100));
        $('#y').val(Math.round(Math.random()*100));
        ckCreNum = true; // gan bien kiem tra la true
    }
    );
$('#ok').click // su kien click nut ok de xem ket qua
    (function()
    {
        if(ckCreNum == false) // chua tao so thi thong bao
        {
            $('#danhgia').text('Mời bé tạo số');
        }
        else // xu ly khi da tao so
        {
            // tang so lan choi va hien thi
            times++;
            $('#times').text(times);
            // tao bien ket qua, dap an de so sanh
            var result = Number($('#x').val()) + Number($('#y').val());
            var answer = Number($('#traloi').val());
            // xu ly
            if(answer == result) // dung
            {
                $('#danhgia').text('Chính xác Hay lắm! Mời bé tiếp tục');
            }
            else // sai
            {
                $('#danhgia').text('Ôi sai rồi! Thử lại đi bé');
            }
        }
    }
    );