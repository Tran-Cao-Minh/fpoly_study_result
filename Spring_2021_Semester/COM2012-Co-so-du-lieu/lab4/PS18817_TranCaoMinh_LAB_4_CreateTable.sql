create database if not exists ps18817_qlbds_lab4;
use ps18817_qlbds_lab4;
-- cach 1: copy nguyen cau truc bang  .. chi lay cau truc thoi
-- cach 2: copy tung field (cot)   .. chi lay thong tin thoi

-- theo cach 1 (phai nhap lieu them vao)
create table vanphong like ps18817_qlbds_lab3.vanphong;
drop table vanphong;
-- theo cach 2 (phai bo sung rang buoc) nen dung cach nay
create table vanphong 
(
	select mavp, diadiemvp
    from ps18817_qlbds_lab3.vanphong
);
select * from vanphong;
create table truongphong
(
	select manv, mavp
    from ps18817_qlbds_lab3.truongphong
);
select * from truongphong;
create table thannhan
(
	select matn, hotn, tentn, ngaysinhtn, moilienhe, manv
    from ps18817_qlbds_lab3.thannhan
);
select * from thannhan;
create table nhanvien
( 
	select manv, honv, tennv, mavp
    from ps18817_qlbds_lab3.nhanvien
);
select * from nhanvien;
create table chusohuu
(
	select macsh, hocsh, tencsh, diachicsh, sdtcsh
    from ps18817_qlbds_lab3.chusohuu
);
select * from chusohuu;
create table batdongsan
(
	select mabds, diachibds, mavp, macsh
    from ps18817_qlbds_lab3.batdongsan
);
select * from batdongsan;
-- them cac khoa chinh
alter table vanphong add primary key (mavp);
alter table nhanvien add primary key (manv);
alter table thannhan add primary key (matn);
alter table chusohuu add primary key (macsh);
alter table batdongsan add primary key (mabds);
alter table truongphong add primary key (manv, mavp);
-- them cac khoa ngoai
alter table nhanvien add foreign key (mavp) references vanphong (mavp);
alter table thannhan add foreign key (manv) references nhanvien (manv);
alter table batdongsan add foreign key (mavp) references vanphong (mavp);
alter table batdongsan add foreign key (macsh) references chusohuu (macsh);
alter table truongphong add foreign key (manv) references nhanvien (manv);
alter table truongphong add foreign key (mavp) references vanphong (mavp);