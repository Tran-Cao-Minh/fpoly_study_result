create database ps18817_qlbds_lab3;
use ps18817_qlbds_lab3;
create table vanphong
(
	maVP varchar(5) not null primary key,
    diaDiemVP varchar(255)
);
create table nhanvien
(
	maNV int not null primary key auto_increment,
    hoNV varchar(255),
    tenNV varchar(15),
    maVP varchar(5),
    constraint nv_vp foreign key (maVP) references vanphong (maVP)
);
-- chen du lieu vao noi co stt tu dong tang
insert into nhanvien(honv,tennv,mavp) values
	('Le Vinh','Ky','vp1');
    -- ket thuc
create table thannhan
(
	maTN varchar(5) not null primary key,
    hoTN varchar(255),
    tenTN varchar(15),
    ngaySinhTN date,
    moiLienHe varchar(255),
    maNV int,
    constraint tn_nv foreign key (maNV) references nhanvien (maNV)
);
create table chusohuu
(
	maCSH varchar(5) not null primary key,
    hoCSH varchar(255),
    tenCSH varchar(15),
    diaChiCSH varchar(255),
    sdtCSH varchar(15)
);
create table batdongsan
(
	maBDS varchar(5),
    diaChiBDS varchar(255),
    maVP varchar(5),
    maCSH varchar(5),
    constraint bds_vp foreign key (maVP) references vanphong (maVP),
    constraint bds_csh foreign key (maCSH) references chusohuu (maCSH)
);
create table truongphong
( 
	maNV int,
    maVP varchar(5),
    primary key (maNV,maVP),
    constraint tp_nv foreign key (maNV) references nhanvien (maNV),
    constraint tp_vp foreign key (maVP) references vanphong (maVP)
);