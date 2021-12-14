/* Tao cac option cho ngay*/
let arrNgay = []; // nen khai bao bien bang let va const. It xai var
// bien ngay load ra la hang khong thay doi nen dung const
// document.querySelector('.ngay') se chon phan tu dau tien co class ngay
// sau do gan phan tu vao bien ngay (chi co the la kieu chuoi)
const ngay = document.querySelector('.ngay');
// dung vong lap them bien vao mang
for(let i = 0; i < 31; i++)
{
    arrNgay[i] = "<option value='" + (i+1) + "'>" + (i+1) + "</option>";
}
// chuyen mang thanh chuoi bang join dinh lien nhau
arrNgay.toString();
// gan arrNgay vao bien ngay de hien thi option
ngay.innerHTML = arrNgay;

/* tao cac option cho thang */
let arrThang = [];
const thang = document.querySelector('.thang');
let i = 0;
while(i < 12)
{ 
    arrThang[i] = "<option value='" + (i+1) + "'>" + (i+1) + "</option>";
    i++;
}
arrThang.join("");
thang.innerHTML = arrThang;

/* tao cac option cho nam */
let arrNam = [];
const nam = document.querySelector('.nam');
let namI = 1970;
i = 0;
do
{
    arrNam[i] = "<option value ='" + namI + "'>" + namI + "</option>";
    namI++;
    i++;
}
while(namI <= 2021)
arrNam.join("");
nam.innerHTML = arrNam;
    