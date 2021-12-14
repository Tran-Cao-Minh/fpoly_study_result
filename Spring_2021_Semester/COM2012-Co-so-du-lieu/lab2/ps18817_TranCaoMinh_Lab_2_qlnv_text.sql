create database ps18817_qlnv_lab2;
use ps18817_qlnv_lab2;
create table phongban
(
	mapb varchar(5) not null primary key,
    tenpb varchar(255)
);
create table duan
(
	mada varchar(5) not null,
    tenda varchar(255),
    ngay_bdau date,
    ngay_kthuc date,
    mapb varchar(5),
    primary key (mada),
    constraint da_pb foreign key (mapb) references phongban (mapb)
);
create table nhanvien
(
	manv int not null primary key auto_increment,
    honv varchar(255),
    tennv varchar(10),
    namsinh date,
    gioitinh varchar(8),
    diachi varchar(255),
    luong float,
    mapb varchar(5),
    constraint nv_pb foreign key (mapb) references phongban (mapb)
);
create table truongphong
(
	mapb varchar(5),
    manv int,
    primary key (mapb,manv),
    constraint tp_pb foreign key (mapb) references phongban (mapb),
    constraint tp_nv foreign key (manv) references nhanvien (manv)
);
create table phancong
(
	ngay_thamgia date,
    ngay_ketthuc date,
    sogio int,
    vaitro varchar(255),
    mada varchar(5),
    manv int,
    constraint pc_da foreign key (mada) references duan (mada),
    constraint pc_nv foreign key (manv) references nhanvien (manv)
);




























