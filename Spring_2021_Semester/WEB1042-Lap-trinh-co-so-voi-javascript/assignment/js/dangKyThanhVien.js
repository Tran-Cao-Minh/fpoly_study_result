// tao cac bien kiem tra
var ckStudCod = false;
var ckName = false;
var ckEmail = false;
var ckGender = false;
var ckInterest = false;
var ckCountry = false;
var ckNote = true; // ghi chu khong can nhap cung duoc
// dat dau hieu cho cac o gap loi, dau hieu cho o khi nhap dung
$('#maSV').change
    (function()
    {
        if(/^[a-zA-Z]{2}[0-9]{5}$/.test($(this).val())) // nhap dung dinh dang
        {
            $('#maSV ~ em').text('');
            $(this).removeClass("bg-warning border-danger").addClass("bg-light border-success");
            ckStudCod = true;
        }
        else // nhap sai 
        {
            $('#maSV ~ em').text('Vui lòng nhập đúng định dạng mã sinh viên');
            $(this).removeClass("bg-light border-success").addClass("bg-warning border-danger");
            ckStudCod = false;
        }
    }
    );
$('#hoTen').change
    (function()
    {
        // do dai chuoi so khop la 5 den 50 do ten ngan nhat co 5 ky tu va chua co cai ten nao vuot qua 50 ky tu ca
        if(/^[a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{5,50}$/
            .test($(this).val())) // nhap dung dinh dang
        {
            $('#hoTen ~ em').text('');
            $(this).removeClass("bg-warning border-danger").addClass("bg-light border-success");
            ckName = true;
        }
        else // nhap sai 
        {
            $('#hoTen ~ em').text('Vui lòng nhập đúng họ tên là tiếng Việt');
            $(this).removeClass("bg-light border-success").addClass("bg-warning border-danger");
            ckName = false;
        }
    }
    );
$('#email').change
    (function()
    {
        if(/^[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z0-9.]+$/.test($(this).val())) // nhap dung dinh dang
        {
            $('#email ~ em').text('');
            $(this).removeClass("bg-warning border-danger").addClass("bg-light border-success");
            ckEmail = true;
        }
        else // nhap sai 
        {
            $('#email ~ em').text('Vui lòng nhập đúng định dạng email');
            $(this).removeClass("bg-light border-success").addClass("bg-warning border-danger");
            ckEmail = false;
        }
    }
    );
$('#gender input').click
    (function()
    {
        // do input type radio nen khi check thi chac chan dung
        $('#gender > em').text('');
        $('#gender').addClass("bg-light border-success");
        ckGender = true;
    }
    );
$('#interests input').click
(function()
{
    if ($('#interests input:checked').length == 0) // chua chon cai nao
    {
        $('#interests > em').text('Vui lòng chọn ít nhất một sở thích');
        $('#interests').removeClass("bg-light border-success").addClass("bg-warning border-danger");
        ckInterest = false;
    }
    else // nhap dung
    {
        $('#interests > em').text('');
        $('#interests').removeClass("bg-warning border-danger").addClass("bg-light border-success");
        ckInterest = true;
    }
}
);
$('#quocTich').change
(function()
{
    if($('#quocTich').val() == '') // chua chon quoc tich
    {
        $('#quocTich ~ em').text('Vui lòng chọn quốc tịch của bạn');
        $(this).removeClass("bg-light border-success").addClass("bg-warning border-danger");
        ckCountry = false;
    }
    else // nhap dung
    {
        $('#quocTich ~ em').text('');
        $(this).removeClass("bg-warning border-danger").addClass("bg-light border-success");
        ckCountry = true;
    }
}
);
$('#ghiChu').change
    (function()
    {
        if($(this).val().length >= 200) // nhap sai
        {
            $('#ghiChu ~ em').text('Vui lòng nhập ghi chú ít hơn 200 ký tự');
            $(this).removeClass("bg-light border-success").addClass("bg-warning border-danger");
            ckNote = false;
        }
        else // nhap dung
        {
            $('#ghiChu ~ em').text('');
            $(this).removeClass("bg-warning border-danger").addClass("bg-light border-success");
            ckNote = true;
        }
    }
    );
// kiem tra form truoc khi gui di
function kiemTra()
{
    // kiem tra ma sinh vien
    if(ckStudCod == false)
    {
        alert("Vui lòng nhập đúng mã sinh viên của bạn!");
        return false;
    }
    // kiem tra ho ten sinh vien
    if(ckName == false)
    {
        alert("Vui lòng nhập đúng họ tên của bạn!")
        return false;
    }
    // kiem tra email
    if(ckEmail == false)
    {
        alert("Vui lòng nhập đúng email của bạn!")
        return false;
    }
    // kiem tra chon gioi tinh
    if (ckGender == false) // chi chon nhung cai co checked
    {
        alert("Vui lòng chọn giới tính của bạn!");
        return false;
    }
    // kiem tra chon so thich
    if (ckInterest == false) // chi chon nhung cai co checked
    {
        alert("Vui lòng chọn ít nhất một sở thích!");
        return false;
    }
    // kiem tra viec chon quoc tich
    if(ckCountry == false)
    {
        alert("Vui lòng chọn quốc tịch của bạn!")
        return false;
    }
    // kiem tra ghi chu it hon 200 ky tu
    if(ckNote == false)
    {
        alert("Vui lòng nhập ghi chú ít hơn 200 ký tự!")
        return false;
    }
    alert("Chúc mừng bạn nhập đúng!");
    return true;
}