-- tao va su dung database
create database detest20210428_ps18817_TranCaoMinh;
use detest20210428_ps18817_TranCaoMinh;

-- 1 tao cac bang
create table phongban
(
     mapb varchar(20) not null primary key,
     tenpb varchar(200),
     matruongphong varchar(20)
);
create table nhanvien
(
	manv int not null primary key,
    honv varchar(200),
    tennv varchar(200),
    ngaysinh date,
    gioitinh bit(1),
    diachi varchar(300),
    luong float,
    mapb varchar(20),
    constraint nv_pb foreign key (mapb) references phongban (mapb)
);
create table truongphong
(
	matp int not null,
    mapb varchar(20) not null,
    primary key(matp,mapb),
    constraint tp_pb foreign key (mapb) references phongban (mapb)
);

-- 2 them du lieu cho cac bang 
insert into phongban values
('P001','phong giam doc','nv001'),
('P002','phong ke toan','nv002'),
('P003','phong kinh doanh','nv003'),
('P004','phong phat trien','nv004');
select * from phongban;
insert into nhanvien values
(1,'Tran Quoc','Khanh','19860202',1,'141/15 tphcm','1000','p001'),
(2,'Nguyen Xuan','Danh','19950705',1,'Dong Nai','2000','p001'),
(3,'Liu Tan','Phat','19980407',1,'Dong Nai','2000','p003'),
(4,'Mai Hong','Phuong','19990704',0,'Hue','2000','p001'),
(5,'Trinh Gia','An','19960706',1,'Da Nang','2500','p002'),
(6,'Truong Tam','Phong','19960605',0,'Hue','3000','p002'),
(7,'Phan Vu Nhat','Huy','19980705',1,'Dong Nai','2000','p003');
select * from nhanvien;
insert into truongphong values
(1,'p001'),
(2,'p002'),
(7,'p003');
select * from truongphong;

-- thuc hien truy van tren cac bang
-- Câu 1. Lấy ra 2 Nhân Viên với thông tin gồm: Họ Và Tên, Địa Chỉ, Giới Tính, Tuổi (từ
-- 18-22 ) N, Tuổi được sắp xếp tăng dần.

-- Câu 2. Lấy ra những Nhân Viên ở ‘TPHCM có lương từ 2200 đến 3200

-- Câu 3. Lấy ra những phòng ban nào có số nhân viên <3

-- Câu 4. Lấy ra những phòng ban không có nhân viên

-- Câu 5. Lấy ra mức lương trung bình lớn nhất của tất cả các phòng ban: Thông tin
-- gồm: mã phòng ban, tên phòng ban, mức lương trung bình lớn nhất.

-- Câu 6. Cập nhật Mã nhân Viên 3 sửa lại Họ và tên là Lê Hồng Sơn, Lương=2000, Địa
-- Chỉ ở Gò-Vấp TPHCM, 

-- Câu 7. Thêm một nhân viên: insert into NHANVIEN: có họ tên là : Vũ Nguyễn Khương
-- Duy, sinh năm 2002, địa chỉ ở TPHCM thuộc phòng P003

-- Câu 8. Xóa phòng ban P003
delete
from phongban
where mapb like 'p003';



























