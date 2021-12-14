// load truoc anh 
var images = [];
for (var i = 0; i < 27; i++)
{
    images[i] = new Image();
    images[i].src = "./images/sach-images/_ ("+i+").png";
}
var anhHienThi = 0; // vi tri anh dang hien thi
var auto = false; // xac dinh xem nut auto co kich hoat hay chua
                // tranh viec nut auto bi nhan nhieu lan
                // tao nhieu setInterval chong len nhau
var autoSwitch; // su dung de gan setInterval vao va clear
// tao su kien khi nhan cac nut
$('button').click
    (function()
    {
        // lay gia tri cua nut duoc nhan
        var button = $(this).text();
        if(button == 'NEXT')// sang anh tiep theo
        {
            anhHienThi++;
            if(anhHienThi >= images.length)
            {
                anhHienThi = 0;
            }
        }
        if(button == 'PREV')// ve lai anh phia truoc
        {
            anhHienThi--;
            if(anhHienThi < 0)
            {
                anhHienThi = (images.length - 1);
            }
        }
        if(button == 'AUTO' & auto == false)
        {
            auto = true;
            autoSwitch = setInterval(
                function()
                {
                    // dieu chinh anh hien thi
                    anhHienThi++;
                    if(anhHienThi >= images.length)
                    {
                        anhHienThi = 0;
                    }
                    $('#image').attr('src',images[anhHienThi].src);
                    // doi dong chu hien thi vi tri anh
                    $('#curImg').text(anhHienThi + 1);
                    imgAni(); 
                }
                ,2000);
        }
        if(button == 'STOP' & auto == true)
        {
            auto = false;
            clearInterval(autoSwitch);
        }
        // doi hinh anh
        $('#image').attr('src',images[anhHienThi].src);
        // doi dong chu hien thi vi tri anh
        $('#curImg').text(anhHienThi + 1);
        // hieu ung chuyen anh
        $('#image').fadeOut(0);
        $('#image').fadeIn(1000);
    }
    )