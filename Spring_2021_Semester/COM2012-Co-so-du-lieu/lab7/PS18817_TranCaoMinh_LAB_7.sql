-- PS18817 Tran Cao Minh Lab 7
use ps18817_qlbh_lab5;
select * from hoadon;
select * from hoadonchitiet;
select * from sanpham;
select * from khachhang;
-- bai 1 -- cau a =>> bang da day du du lieu
-- cu phap cau lenh insert: insert into <ten bang> values
-- 							('gia tri 1','gia tri 2',...),  -- cua hang dau tien
-- 							....
-- 							('gia tri 1','gia tri 2',...);  -- cua hang cuoi cung						
-- cau b 
-- Tạo 1 bảng có tên KhachHang_daNang chứa thông tin tin đầy đủ về các khách
-- hàng đến từ Đà Nẵng
create table KhachHang_daNang like khachhang;
insert into KhachHang_daNang 
select * from khachhang 
where diachi like '%da nang%';
select * from KhachHang_daNang;

-- bai 2
-- cau a
-- Cập nhật lại thông tin số điện thoại của khách hàng có mã ‘KH002’ có giá trị mới
-- là ‘16267788989’
update khachhang
set dienthoai = '16267788989'
where makhachhang like 'KH002';
-- tra ve so ban dau
update khachhang
set dienthoai = '16109423443'
where makhachhang like 'KH002';
-- cau b
-- Tăng số lượng mặt hàng có mã ‘3’ lên thêm ‘200’ đơn vị
update sanpham
set soluong = soluong + 200
where masanpham = 3;
-- giam lai 200
update sanpham
set soluong = soluong - 200
where masanpham = 3;
-- cau c
-- Giảm giá cho tất cả sản phẩm giảm 5%
update sanpham
set dongia = dongia - (dongia*0.05);
-- cau d
-- Tăng số lượng của mặt hàng bán chạy nhất trong tháng 12/2016 lên 100 đơn vị
-- tim ra san pham ban chay nhat trong thang 12/2016
select masanpham
from hoadonchitiet hdct inner join hoadon hd on hdct.mahoadon = hd.mahoadon and year(ngaymuahang) = 2016 and month(ngaymuahang) = 12
group by masanpham
order by sum(soluong) desc
limit 1;
update sanpham
set soluong = soluong + 100
where masanpham = (select masanpham
					from hoadonchitiet hdct inner join hoadon hd on hdct.mahoadon = hd.mahoadon and year(ngaymuahang) = 2016 and month(ngaymuahang) = 12
					group by masanpham
					order by sum(soluong) desc
					limit 1);
-- giam lai 100
update sanpham
set soluong = soluong - 100
where masanpham = (select masanpham
					from hoadonchitiet
					group by masanpham
					order by sum(soluong) desc
					limit 1);
select * from hoadonchitiet;
-- cau e
-- Giảm giá 10% cho 2 sản phẩm bán ít nhất trong năm 2016
-- tim ra 2 san pham ban it nhat nam 2016
select hdct.masanpham
from hoadonchitiet hdct inner join hoadon hd on hdct.mahoadon = hd.mahoadon and year(hd.ngaymuahang) = 2016
group by masanpham
order by sum(soluong) asc
limit 2;
update sanpham sp inner join (select hdct.masanpham
						from hoadonchitiet hdct inner join hoadon hd on hdct.mahoadon = hd.mahoadon and year(hd.ngaymuahang) = 2016
						group by masanpham
						order by sum(soluong) asc
						limit 2) bangtam
				on sp.masanpham = bangtam.masanpham
set dongia = dongia - (dongia * 0.1);
-- cau f
-- Cập nhật lại trạng thái “đã thanh toán” cho hoá đơn có mã 120956
update hoadon
set trangthai = 'da thanh toan'
where mahoadon like '120956';
-- chuyen lai thanh chua thanh toan
update hoadon
set trangthai = 'chua thanh toan'
where mahoadon like '120956';
-- cau g
-- Xoá mặt hàng có mã sản phẩm là ‘2’ ra khỏi hoá đơn ‘120956’ và trạng thái là
-- chưa thanh toán.
delete
from hoadonchitiet
where masanpham = 2 and mahoadon = (select mahoadon 
									from hoadon 
                                    where mahoadon like '120956' and trangthai like 'chua thanh toan'); 
-- them vo lai
insert into hoadonchitiet values
(5,120956,2,60);
-- cau h
-- Xoá khách hàng chưa từng mua hàng kể từ ngày “1-1-2016”
delete
from khachhang
where makhachhang not in (select makhachhang 
							from hoadon
                            where year(ngaymuahang) >= 2016);
-- them vo lai
insert into khachhang values
('KH003','Le Hoang','Nam','23 Tran Phu TP Hue','namlt@yahoo.com','0989354556');

