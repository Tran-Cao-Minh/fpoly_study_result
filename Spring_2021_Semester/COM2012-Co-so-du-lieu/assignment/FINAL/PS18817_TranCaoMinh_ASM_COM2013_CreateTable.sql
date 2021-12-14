create database PS18817_TranCaoMinh_ASM_COM2013;
use PS18817_TranCaoMinh_ASM_COM2013;

-- Tao cac bang khong co khoa ngoai truoc
create table loaisach
(
	maloai varchar(5) not null primary key,
    tenloai varchar(255)
);
create table lop
(
	malop varchar(5) not null primary key,
    tenlop varchar(255)
);

-- Tao cac bang co khoa ngoai la malop va maloai da co
create table sach
(
	masach varchar(5) not null primary key,
    tensach varchar(255),
    nhaxuatban varchar(255),
    tacgia varchar(255),
    sotrang mediumint unsigned, -- toi da 16.777.215
    sobansao tinyint unsigned, -- toi da 255
    gia int unsigned, -- toi da 4.294.967.295
    ngaynhap date,
    vitri varchar(255),
    maloai varchar(5),
    constraint s_ls foreign key (maloai) references loaisach (maloai)
);
drop table sach;
create table thesinhvien
(
	masv varchar(5) not null primary key,
    tensv varchar(255),
    ngayhethan date,
    chuyennganh varchar(255),
    email varchar(255),
    sdt  varchar(15),
    malop varchar(5),
    constraint tsv_l foreign key (malop) references lop (malop)
);

-- Tao bang phieu muon voi masv va masach da co
create table phieumuon
(
	sophieu int unsigned not null primary key auto_increment, -- so phieu la so duong | toi da 4.294.967.295
    ngaymuon date,
    ngaytra date,
    ghichu varchar(255),
    soluong tinyint unsigned, -- toi da 255
    masach varchar(5),
    masv  varchar(5),
    constraint pm_s foreign key (masach) references sach (masach),
    constraint pm_tsv foreign key (masv) references thesinhvien (masv)
);
drop table phieumuon;

-- Tao them bang gia han
-- them bang gia han 
create table giahan
(
	sophieu int unsigned primary key not null, -- so phieu la so duong | toi da 4.294.967.295
    ngaygiahan date,
    nhacnho varchar(255),
    constraint gh_pm foreign key (sophieu) references phieumuon (sophieu)
);
drop table giahan;


-- 
