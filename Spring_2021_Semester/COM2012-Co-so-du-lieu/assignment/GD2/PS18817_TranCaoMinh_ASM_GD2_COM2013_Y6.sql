use ps18817_trancaominh_asm_com2013;

-- viet cau truy van  tai Y6 assignment
select * from giahan;
select * from loaisach;
select * from lop;
select * from phieumuon;
select * from sach;
select * from thesinhvien;

-- bai 6.1
-- Liệt kê tất cả thông tin của các đầu sách gồm tên sách, mã sách, giá tiền , tác giả
-- thuộc loại sách có mã “IT” 
-- cap nhat them loai sach co ma IT
insert into loaisach values
('IT','Lap trinh');
insert into sach values
('s11','Lap trinh ngau het say','NXB The Gioi','Rob Hansen',113,4,74800,'20130415','Ke 03','IT'),
('s12','Code dao ki su','NXB Dan Tri','Pham Huy Hoang',297,5,127200,'20150617','Ke 05','IT'),
('s13','Lap trinh voi C#','NXB Thanh Nien','Pham Quang Huy',382,2,105000,'20170121','Ke 02','IT');
select tensach, masach, gia as giatien, tacgia
from sach
where maloai like 'IT';

-- bai 6.2
-- Liệt kê các phiếu mượn gồm các thông tin mã phiếu mượn, mã sách , ngày mượn, mã
-- sinh viên có ngày mượn trong tháng 02/2021
select * from giahan;
select * from loaisach;
select * from lop;
select * from phieumuon;
select * from sach;
select * from thesinhvien;
select sophieu as maphieumuon, masach, ngaymuon, masv as masinhvien
from phieumuon
where year(ngaymuon) = 2021 and month(ngaymuon) = 2;

-- bai 6.3
-- Liệt kê các phiếu mượn chưa trả sách cho thư viên theo thứ tự tăng dần của ngày
-- mượn sách.
-- Cap nhat them phieu muon chua tra
insert into phieumuon(ngaymuon,ghichu,soluong,masach,masv) values
('20210414','Chua tra','1','s11','sv08'),
('20210415','Chua tra','1','s12','sv10'),
('20210413','Chua tra','1','s13','sv01');
select *
from phieumuon
where ngaytra is null  -- chua co ngay tra la chua tra sach
order by ngaymuon asc;

-- bai 6.4
-- Liệt kê tổng số đầu sách của mỗi loại sách ( gồm mã loại sách, tên loại sách, tổng số
-- lượng sách mỗi loại).
select ls.maloai, ls.tenloai, count(s.masach) as tongsodausach -- do ma sach khong bi trung lap nen count masach
from sach s inner join loaisach ls on ls.maloai = s.maloai
group by s.maloai;

-- bai 6.5
--  Đếm xem có bao nhiêu lượt sinh viên đã mượn sách.
select count(*) as soluot_sv_muonsach
from phieumuon;

-- bai 6.6
-- Hiển thị tất cả các quyển sách có tiêu đề chứa từ khoá “SQL”.
-- Them vao sach co tieu de chua tu khoa SQL
insert into sach values
('s14','SQL can ban','NXB Cao Minh','Tran Cao Minh',115,2,75000,'20170416','Ke 04','IT'),
('s15','SQL nang cao','NXB Thong Minh','Dang Huy Hoang',297,3,125000,'20190517','Ke 06','IT'),
('s16','Nghien cuu SQL','NXB Cao Minh','Tran The Nam',300,1,108000,'20180128','Ke 01','IT');
select *   -- tensach la tieu de
from sach
where tensach like "%sql%";

-- bai 6.7
-- Hiển thị thông tin mượn sách gồm các thông tin: mã sinh viên, tên sinh viên, mã
-- phiếu mượn, tiêu đề sách, ngày mượn, ngày trả. Sắp xếp thứ tự theo ngày mượn sách.
select sv.masv, sv.tensv, pm.sophieu as maphieumuon, s.tensach as tieudesach, pm.ngaymuon, pm.ngaytra
from phieumuon pm inner join thesinhvien sv on pm.masv = sv.masv
				inner join sach s on pm.masach = s.masach
order by pm.ngaymuon desc;

-- bai 6.8
-- Liệt kê các đầu sách có lượt mượn lớn hơn 2 lần.
select s.tensach as dausach_muonhon_2lan, count(pm.sophieu) as soluotmuon
from phieumuon pm inner join sach s on pm.masach = s.masach 
group by s.tensach
having count(pm.sophieu) > 2; -- ham having xu ly sau khi da co du lieu tu count
								-- ham where thi khong duoc do no nhom truoc

-- bai 6.9
-- Viết câu lệnh cập nhật lại giá tiền của các quyển sách có ngày nhập kho trước năm
-- 2014 giảm 30%.
update sach
set gia = gia - (gia*0.3)
where year(ngaynhap) < 2014;
select *
from sach
where year(ngaynhap) < 2014;

-- bai 6.10
-- Viết câu lệnh cập nhật lại trạng thái đã trả sách cho phiếu mượn của sinh viên có mã
-- sinh viên sv10.
update phieumuon
set ghichu = 'Da tra sach'
where masv like 'sv10' and ghichu like 'Chua tra';
-- cap nhat lai thanh chua tra
update phieumuon
set ghichu = 'Chua tra'
where masv like 'sv10' and ghichu like 'Da tra sach';

-- bai 6.11
-- Lập danh sách các phiếu mượn quá hạn chưa trả gồm các thông tin: mã phiếu mượn,
-- tên sinh viên, email, danh sách các sách đã mượn, ngày mượn.
select pm.sophieu as maphieumuon, sv.tensv, sv.email, s.tensach, pm.ngaymuon
from phieumuon pm inner join thesinhvien sv on pm.masv = sv.masv and pm.ghichu like 'Chua tra'
				inner join sach s on pm.masach = s.masach;

-- bai 6.12
-- Viết câu lệnh cập nhật lại số lượng bản sao tăng lên 5 đơn vị đối với các đầu sách có
-- lượt mượn lớn hơn 2
update sach
set sobansao = sobansao + 5
where masach =( select masach 
		from phieumuon 
        group by masach
        having count(sophieu) > 2);
-- giam lai 5 ban sao
update sach
set sobansao = sobansao - 5
where masach =( select masach 
		from phieumuon 
        group by masach
        having count(sophieu) > 2);

-- bai 6.13
-- Viết câu lệnh xoá các phiếu mượn có ngày mượn và ngày trả trước „1/1/2021‟
delete 
from phieumuon
where year(ngaymuon) < 2021 and year(ngaytra) < 2021;
delete 
from phieumuon
where sophieu = 24;
-- Them vao cac phieu muon co ngay muon va tra truoc 01/01/2010
insert into phieumuon(ngaymuon,ngaytra,ghichu,soluong,masach,masv) values
('20200215','20200218','Tra dung han','1','s08','sv02'),
('20200216','20200219','Tra dung han','1','s09','sv04'),
('20200215','20200217','Tra dung han','1','s01','sv05');

