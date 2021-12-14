create database ps18817_TranCaoMinh_Assignment_TaoBang;
use ps18817_TranCaoMinh_Assignment_TaoBang;
--
create table sach
(
	masach varchar(5),
    tensach varchar(255),
    tacgia varchar(255),
    sotrang int,
    nsx varchar(255),
    ngaynhap date,
    gia varchar(255),
    vitri varchar(255),
    sobansao int,
    maloai varchar(5)
);
alter table sach add primary key (masach);
alter table sach add foreign key (maloai) references loaisach (maloai);
create table loaisach
(
	maloai varchar(5),
    tenloai varchar(255)
);
alter table loaisach add primary key (maloai);
create table lop
(
	malop varchar(5),
    tenlop varchar(255)
);
alter table lop add primary key (malop);
create table thesv
(
	masv varchar(5),
    tensv varchar(255),
    chuyennganh varchar(255),
    sdt varchar(255),
    email varchar(255),
    ngayhethan date,
    malop varchar(5)
);
alter table thesv add primary key (masv);
alter table thesv add foreign key (malop) references lop (malop);
create table chitietphieumuon
(
	sophieu varchar(5),
    masach varchar(5),
    ghichu varchar(255)
);
alter table chitietphieumuon  add primary key (sophieu, masach);
alter table chitietphieumuon add foreign key (sophieu) references phieumuon (sophieu);
alter table chitietphieumuon add foreign key (masach) references sach (masach);
create table phieumuon
(
	sophieu varchar(5),
    ngaymuon date,
	ngaytra date,
    soluong int,
    masv varchar(5)
);
alter table phieumuon add primary key (sophieu);
alter table phieumuon add foreign key (masv) references thesv (masv);
-- copy bang co san
create table lop1 like lop;
-- sua ten bang co san
rename table lop to vainhai;
-- sua ten cot
alter table lop change column tenlop caominh varchar(255);
-- them cot
alter table lop add column sieuviet varchar(255);
-- xoa cot
alter table lop drop sieuviet;
-- copy database
create database minh;
use minh;
create table lop like ps18817_TranCaoMinh_Assignment_TaoBang.lop;