var so1, so2, phepTinh;
function lamLai()
{
    so1 = null;
    so2 = null;
    phepTinh = null;
}
function toanTu(x)
{
    phepTinh = x;
}
function toanHang(x)
{
    if(so1 == null)
    {
        so1 = Number(x);
    }
    else
    {
        so2 = Number(x);
    }
}
function thucHien()
{
    switch(phepTinh)
    {
        case '+':
            alert("Tong: " + (so1+so2));
            break;
        case '-':
            alert("Hieu: " + (so1-so2));
            break;
        case '*':
            alert("Tich: " + (so1*so2));
            break;
        case '/':
            alert("Thuong: " + (so1/so2));
            break;
        default:
            alert(phepTinh + " không phải toán tử");
            break;
    }
    lamLai();
}