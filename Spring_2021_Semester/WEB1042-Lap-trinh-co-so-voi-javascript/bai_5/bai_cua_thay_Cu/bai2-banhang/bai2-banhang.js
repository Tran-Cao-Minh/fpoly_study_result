document.getElementById("cart").style.display = "none";
document.getElementsByClassName("title-table-cart")[0].style.display = "none";
document.getElementsByTagName("h3")[0].style.display = "none";

function them(button)
{
    var row = button.parentElement.parentElement.cloneNode(true);
    var btnXoa = row.getElementsByTagName("button")[0];
    btnXoa.innerText = "Xóa";
    btnXoa.setAttribute('onclick', 'xoa(this)');
    document.getElementById("cart").appendChild(row);
    tinhTong();
    document.getElementById("cart").style.display = "block";
    document.getElementsByClassName("title-table-cart")[0].style.display = "block";
    document.getElementsByTagName("h3")[0].style.display = "block";
}

function xoa(button)
{
    var row = button.parentElement.parentElement;
    document.getElementById("cart").removeChild(row);
    tinhTong();
}

function tinhTong()
{
    var cartTable = document.getElementById("cart");
    var rowsOfCartTable = cartTable.getElementsByTagName("tr");
    var tong = 0;
    for ( var i = 0; i < rowsOfCartTable.length; i++)
    {
        var gia = rowsOfCartTable[i].children[2].innerText;
        gia = parseInt(gia);
        tong += gia;
    }
    document.getElementById("tong").innerText = tong;
}

function daott(checkbox)
{
    var rowContainCheckBox = checkbox.parentElement.parentElement;
    var btnChonInRow = rowContainCheckBox.getElementsByTagName("button")[0];
    btnChonInRow.disabled = !btnChonInRow.disabled;
}