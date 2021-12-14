// khai bao lop meo va phuong thuc
function Meo (trongLuong)
{
    this.trongLuong = trongLuong;
}
var demChuot = 0;
Meo.prototype.batChuot = function(Chuot)
{
    this.trongLuong += Chuot.trongLuong;
    demChuot++;
}
// khai bao lop chuot
function Chuot (trongLuong)
{
    this.trongLuong = trongLuong;
}
// khai bao tung doi tuong
var meo2000 = new Meo(2000);
var chuot200 = new Chuot(200);
var chuot300 = new Chuot(300);
var chuot400 = new Chuot(400);
// tao cac lua chon bat chuot
function chonChuot(x)
{
    if(demChuot == 0)
    {
        switch(x)
        {
            case 200: 
                meo2000.batChuot(chuot200);
            break;
            case 300: 
                meo2000.batChuot(chuot300);
            break;
            case 400: 
                meo2000.batChuot(chuot400);
            break;
            case 500:
                meo2000.batChuot(chuot200);
                meo2000.batChuot(chuot300);
            break;
            case 600:
                meo2000.batChuot(chuot200);
                meo2000.batChuot(chuot400);
            break;
            case 700:
                meo2000.batChuot(chuot300);
                meo2000.batChuot(chuot400);
            break;
        } 
    }
    else
    {
        alert("Bạn đã lựa chọn rồi, vui lòng bấm hiển thị kết quả nhen :D");
    }
}
function chonChuot600()
{
    if(demChuot == 0)
    {
        meo2000.batChuot(chuot200);
        meo2000.batChuot(chuot400);
    }
    else
    {
        alert("Bạn đã lựa chọn rồi, vui lòng bấm hiển thị kết quả nhen :D");
    }  
}
function chonChuot700()
{
    if(demChuot == 0)
    {
        meo2000.batChuot(chuot300);
        meo2000.batChuot(chuot400);
    }
    else
    {
        alert("Bạn đã lựa chọn rồi, vui lòng bấm hiển thị kết quả nhen :D");
    }   
}
// tao lua chon so luong chuot muon bat 
function motCon()
{
    document.write("<link rel='stylesheet' href='./meoDuoiChuot.css'>");
    document.write("<button onclick='chonChuot(200);'>200</button>");
    document.write("<button onclick='chonChuot(300);'>300</button>");
    document.write("<button onclick='chonChuot(400);'>400</button>");
    document.write("<button onclick='hienThiKetQua()'>HIỂN THỊ KẾT QUẢ</button>");   
}
function haiCon()
{
    document.write("<link rel='stylesheet' href='./meoDuoiChuot.css'>");
    document.write("<button onclick='chonChuot(500)'>200 VÀ 300</button>");
    document.write("<button onclick='chonChuot(600)'>200 VÀ 400</button>");
    document.write("<button onclick='chonChuot(700)'>300 VÀ 400</button>");
    document.write("<button onclick='hienThiKetQua()'>HIỂN THỊ KẾT QUẢ</button>");
}
function baCon()
{
    meo2000.batChuot(chuot400);
    meo2000.batChuot(chuot300);
    meo2000.batChuot(chuot200);
    hienThiKetQua();
}
// hien thi ket qua
function hienThiKetQua()
{
    alert("Mèo nặng: " + meo2000.trongLuong + "g sau khi ăn " + demChuot + " con chuột");
    location.reload();
}

