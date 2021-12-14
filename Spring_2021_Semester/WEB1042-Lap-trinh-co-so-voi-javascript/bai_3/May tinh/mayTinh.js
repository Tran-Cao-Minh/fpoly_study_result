var so1 = null, so2 = null, phepTinh = null, quaSoTiepTheo = false;
function lamLai()
{
    so1 = null, so2 = null, phepTinh = null, quaSoTiepTheo = false;
}
function toanTu(x)
{
    phepTinh = x;
    quaSoTiepTheo = true;
}
function toanHang(x)
{
    if(quaSoTiepTheo == false)
    {
        if(so1 == null && x != '.')
        {
            so1 = x;
        }
        else if(so1 != null)
        {
            so1 = so1 + x;
        }
    }
    else
    {
        if(so2 == null && x != '.')
        {
            so2 = x;
        }
        else if(so2 != null)
        {
            so2 = so2 + x;
        }
    }
}
function thucHien()
{
    so1 = Number(so1);
    so2 = Number(so2);
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