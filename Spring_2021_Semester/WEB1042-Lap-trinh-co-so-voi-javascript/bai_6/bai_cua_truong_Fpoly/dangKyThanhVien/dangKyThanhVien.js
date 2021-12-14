function hienThi()
{
    var nSoThichKhac = document.getElementById("soThichKhac");
    if(nSoThichKhac.style.display == "block")
    {
        nSoThichKhac.style.display = "none";
    }
    else
    {
        nSoThichKhac.style.display = "block";
    }
}
function kiemTra()
{
    // kiem tra ho, ten
    var ho = document.getElementById("ho");
    var ten = document.getElementById("ten");
    if(ho.value.length == 0)
    {
        alert("Vui lòng nhập họ của bạn!");
        return false;
    }
    if(ten.value.length == 0)
    {
        alert("Vui lòng nhập tên của bạn!");
        return false;
    }
    // kiem tra ngay thang nam
    // da gan min max cho ngay thang nam va co input type la Number
    var ngay = document.getElementById("ngay");
    var thang = document.getElementById("thang");
    var nam = document.getElementById("nam");
    if((ngay.value)*(thang.value)*(nam.value) == 0) // mac dinh cua input:number la 0
    {
        alert("Vui lòng nhập ngày tháng năm sinh!");
        return false;
    }
    // kiem tra gioi tinh
    var gioiTinh = document.getElementsByName("nGioiTinh");
    if(!gioiTinh[0].checked && !gioiTinh[1].checked && !gioiTinh[2].checked) // mac dinh cua input:radio khi khong check la false
    {
        alert("Vui lòng chọn giới tính của bạn!");
        return false;
    }
    // kiem tra So Dien Thoai
    var soDienThoai = document.getElementById("SDT");
    if(isNaN(soDienThoai.value) || soDienThoai.value.length == 0) // true la chu + mac dinh cua o nhap la 0
    {
        alert("Vui lòng nhập số");
        return false;
    }
    if(soDienThoai.value.length < 10 || soDienThoai.value.length > 11)
    {
        alert("Vui lòng nhập định dạng số điện thoại có 10 hoặc 11 chữ số!");
        return false;
    }
    // kiem tra chon so thich
    var cacSoThich = document.getElementsByName("nSoThich");
    var demSoThich = 0;
    for(var i = 0; i < cacSoThich.length; i++)
    {
        if(cacSoThich[i].checked) // input:checkbox khi check la true
        {
            demSoThich++;
        }
    }
    if(demSoThich == 0)
    {
        alert("Vui lòng chọn ít nhất một sở thích!");
        return false;
    }
    // kiem tra viec nhap so thich khac
    if(cacSoThich[cacSoThich.length - 1].checked) // lay so thich khac o vi tri cuoi cung
    {
        var nhapSoThichKhac = document.getElementById("nhapSoThichKhac");
        if(nhapSoThichKhac.value.length == 0)
        {
            alert("Vui lòng nhập sở thích khác của bạn!");
            return false;
        }
    }
    // tra ve true khi nhap dung het
    alert("Chúc mừng bạn nhập đúng!");
    return true;
}