use wd16306_quanlyhanghoa;
create table sanpham1
(
	masp int not null,
    mota varchar(255),
    soluong int,
    dongia float,
    primary key (masp)
);
-- chen du lieu voa table
insert into sanpham1 values (4,'khan tay',5,200);
insert into sanpham1 values (5,'khan tay',5,200);
select * from sanpham1;
    