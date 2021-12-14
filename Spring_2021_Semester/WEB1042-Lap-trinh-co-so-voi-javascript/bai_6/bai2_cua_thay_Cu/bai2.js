function hienThi(trangThai)
{
    var phiVanChuyen = document.getElementById("phiVanChuyen");
    if(trangThai) // trang thai truyen vao la true : false
    {
        phiVanChuyen.style.display = "block";
    }
    else
    {
        phiVanChuyen.style.display = "none";
    }
}
function kiemTra()
{
    // kiem tra ten sp
    var tenSP = document.getElementById("tenSP");
    if(tenSP.value.length == 0)
    {
        alert("Vui lòng nhập tên sản phẩm!");
        return false;
    }
    // kiem tra viec chon loai sp 
    var loaiSP = document.getElementById("loai");
    if(loai.value.length == 0)
    {
        alert("Vui lòng chọn loại sản phẩm!")
        return false;
    }
    // kiem tra gia sp
    var giaSP = document.getElementById("donGia");
    if(isNaN(giaSP.value)) // true la ko phai so
    {
        alert("Vui lòng nhập số!");
        return false;
    }
    else if(Number(giaSP.value) <= 0)
    {
        alert("Vui lòng nhập số dương lớn hơn 0!");
        return false;
    }
    // kiem tra chon noi nhan hang
    var noiNhanHang = document.getElementsByName("noiNhanHang");
    if(!noiNhanHang[0].checked && !noiNhanHang[1].checked)
    {
        alert("Vui lòng chọn nơi nhận hàng!");
        return false;
    }
    alert("Chúc mừng bạn nhập đúng!");
    return true;
}