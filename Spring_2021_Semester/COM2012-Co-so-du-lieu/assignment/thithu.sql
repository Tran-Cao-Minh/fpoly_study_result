-- tao va su dung database
create database ps18817_trancaominh_qlhoadon;
use ps18817_trancaominh_qlhoadon;

-- 1 tao cac bang
create table sanpham
(
	masp char(4) not null primary key,
    tensp varchar(50),
    dvt varchar(20),
    nuocsx varchar(50),
    giaban float
);
create table hoadon
(
	sohd int not null primary key,
    ngayhd date,
    hotenkh varchar(40)
);
create table hoadon_ct
(
	sohd int not null,
    masp char(4) not null,
    soluong int,
    primary key(sohd, masp),
    constraint hd_hdct foreign key (sohd) references hoadon (sohd),
    constraint sp_hdct foreign key (masp) references sanpham (masp)
);

-- 2 them du lieu cho cac bang 
insert into sanpham values
('BC01' , 'But chi','cay' , 'Singapore' , 5000),
('BC02' , 'But chi' , 'hop' , 'Viet Nam' , 30000),
('BB01' , 'But bi' , 'hop' , 'Thai Lan' , 100000),
('TV01' , 'Tap 100 giay tot' , 'quyen' , 'Viet Nam' , 3000),
('TV02' , 'Tap 200 giay tot' , 'quyen' , 'Viet Nam' , 5500);
select * from sanpham;
insert into hoadon values
(1001 , '2019-07-23' , 'Le Thi Phi Yen'),
(1002 , '2019-08-12' , 'Le Thi Phi Yen'),
(1003 , '2019-08-23' , 'Ngo Thanh Tuan'),
(1004 , '2019-09-01' , 'Ngo Thanh Tuan'),
(1005 , '2019-10-20' , 'Le Thi Phi Yen');
select * from hoadon;
insert into hoadon_ct values
(1001 , 'TV02' , 10),
(1001 , 'BC01' , 5),
(1001 , 'BC02' , 10),
(1002 , 'BC01' , 20),
(1002 , 'BB01' , 20),
(1002 , 'BC02' , 20),
(1003 , 'BB01' , 10),
(1004 , 'TV01' , 20);
select * from hoadon_ct;

-- thuc hien truy van tren cac bang
-- 3. Hiển thị danh sách các hóa đơn được lập từ tháng 7 đến tháng 9.
select *
from hoadon
where month(ngayhd) between 7 and 9;
-- 4. Cho biết khách hàng 'Le Thi Phi Yen' có bao nhiêu hóa đơn được lập.
select count(*) as 'So hoa don cua khach hang Le Thi Phi Yen'
from hoadon
where hotenkh like 'le thi phi yen';
-- 5. Tăng giá bán của sản phẩm có đơn vị tính là 'hop' thêm 10%.
update sanpham
set giaban = giaban * 1.1
where dvt like 'hop';
-- 6. Liệt kê thông tin hóa đơn gồm: SoHD, NgayHD, HoTenKH, TenSP, Soluong,
-- DonGia, ThanhTien. (Với Thành tiền = SoLuong * GiaBan)
select hd.sohd, hd.ngayhd, hd.hotenkh, sp.tensp, hdct.soluong, sp.giaban as dongia, (hdct.soluong * sp.giaban) as thanhtien
from hoadon_ct hdct inner join hoadon hd on hdct.sohd = hd.sohd
					inner join sanpham sp on hdct.masp = sp.masp;
-- 7. Đếm số lần bán của từng Sản phẩm, thông tin gồm: MaSP, TenSP, SoLan. Chỉ hiển thị
-- các Sản phẩm có số lần bán >=2.
select * from sanpham;
select * from hoadon;
select * from hoadon_ct;
select hdct.masp, sp.tensp, sum(soluong) as solan
from hoadon_ct hdct inner join sanpham sp on hdct.masp = sp.masp
group by hdct.masp
having sum(soluong) > 2;




























