select * from nhan_vien;
select * from phong_ban;
select pb.ma_pb, pb.ten_pb, pb.ma_pb 
from nhan_vien nv, phong_ban pb
where nv.phg = pb.ma_pb;
select count(*) from nhan_vien, phong_ban;

-- bai tap thay cho
-- bai 1
-- hay lay ra so gio lam va ten cua nhan vien trong cac du an
select nv.ten_nv, qlda.sogio
from quanly_duan qlda, nhan_vien nv
where nv.id_nhanvien = qlda.ma_nhanvien;
-- bai 2
-- lay nhung nhan vien da tham gia 60h trong du an bao gom ma_nv, ho_ten, luong va so gio
select nv.id_nhanvien as ma_nv, concat(nv.ho_nv,' ',nv.ten_nv) as ho_ten_nv, nv.luong, qlda.sogio
from nhan_vien nv, quanly_duan qlda
where nv.id_nhanvien = qlda.ma_nhanvien and qlda.sogio >= 60;
-- bai 3
-- Viết câu truy vấn hiển thị các thông tin bao gồm họ, tên, lương của nhân viên, tên dự án với điều
-- kiện nhân viên thuộc phòng ban có tên ‘Thiết kế’, tham gia vào các dự án có ngày bắt đầu  tu ‘1/1/2016’
select concat(nv.ho_nv,' ',nv.ten_nv) as ho_ten_nv, nv.luong, da.ten_duan ,da.ngay_batdau
from nhan_vien nv, du_an da, quanly_duan qlda, phong_ban pb
where nv.phg = pb.ma_pb 
	and nv.id_nhanvien = qlda.ma_nhanvien 
	and da.ma_duan = qlda.ma_duan 
	and pb.ten_pb like 'thiet ke' 
	and year(da.ngay_batdau) >= 2016;
-- bai 4
-- dung inner join vao bai 2
-- lay nhung nhan vien da tham gia 60h trong du an bao gom ma_nv, ho_ten, luong va so gio
select * from quanly_duan;
select * from nhan_vien;
select * from du_an;
select * from phong_ban;
select nv.id_nhanvien as ma_nv, concat(nv.ho_nv,' ',nv.ten_nv) as ho_ten_nv, nv.luong, qlda.sogio
from nhan_vien nv inner join quanly_duan qlda on nv.id_nhanvien = qlda.ma_nhanvien
where nv.id_nhanvien = qlda.ma_nhanvien and qlda.sogio >= 60;
-- 





