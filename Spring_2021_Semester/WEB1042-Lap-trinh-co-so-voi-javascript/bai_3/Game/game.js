function choi()
{
    var min = prompt("Bạn hãy nhập Min của khoảng muốn đoán");
    var max = prompt("Bạn hãy nhập Max của khoảng muốn đoán");
    min = Number(min);
    max = Number(max);
    var soNgauNhien = Math.round(min + Math.random() * (max - min));
    for(var i = 0; i < 3; i++)
    {
        var x = prompt("Bạn hãy nhập một số bất kỳ trong phạm vi lần " + (i+1));
        x = Number(x);
        if(x == soNgauNhien)
        {
            alert("Xin chúc mừng bạn đã nhập trúng");
        }
        else 
        {
            alert("Bạn đã nhập sai, bạn còn " + (3-(i+1)) + " lần nhập");
            if(x > soNgauNhien)
            {
                alert("Sỗ bạn nhập lớn hơn sỗ ngẫu nhiên");
            }
            else
            {
                alert("Sỗ bạn nhập nhỏ hơn sỗ ngẫu nhiên");
            }
        }
    }
}