-- PS18817 Tran Cao Minh Lab 8
use ps18817_qlbh_lab5;
select * from hoadon;
select * from hoadonchitiet;
select * from sanpham;
select * from khachhang;
-- PS18817 Tran Cao Minh
-- bai 1
-- cau a
-- Tạo chỉ mục UNIQUE trên cột điện thoại của bảng khách hàng
create unique index uni_dienThoai on khachhang (dienthoai);
-- xoa chi muc
drop index uni_dienthoai on khachhang;
-- cau b
-- Tạo chỉ mục UNIQUE trên cột email của bảng khách hàng
create unique index uni_email on khachhang (email);
-- xoa chi muc
drop index uni_email on khachhang;

-- bai 2
-- cau b
-- 
drop database import_lab8_csdl;