use ps18817_qlda_lab5;
-- dung lenh select

-- lay nguyen mot bang
select * from phong_ban; 

-- lay mot vai cot
select ma_pb, ten_pb from phong_ban;
-- lay n hang dau tien
select * from nhan_vien limit 2;
-- neu su dung ms sql thi co lenh la: select 2 * from nhan_vien;

-- lay thong tin khong trung lap theo cot
select distinct (ho_nv) from nhan_vien;

-- lay theo dieu kien
select * from nhan_vien where luong >= 1000 and luong <= 1500;
-- lay theo dieu kien gan giong
select * from nhan_vien where dia_chi like '%da nang';
-- lay theo dieu kien la doi tuong con
select * from nhan_vien where year(nam_sinh) >= 1990;
-- lay theo ngay thang xac dinh
select * from nhan_vien where nam_sinh = '19900605';

-- bai tap 1
-- hien thi ho ten nhan vien co luong tren 800
select ho_nv, ten_nv from nhan_vien where luong > 800;
-- hien thi ho ten nhan vien co luong nam trong khoan tu 800 den 1000
select ho_nv, ten_nv from nhan_vien where luong >= 800 and luong <= 1000;
-- hien thi tat ca thong tin cua du an co ngay bat dau tu ngay 01/01/2017
select * from du_an where year(ngay_batdau) >= 2017;
-- hien thi thong tin cua phong ban co chua chuoi san xuat
select * from phong_ban where ten_pb like '%san xuat%';
select * from phong_ban; -- hoi thay
-- hien thi thong tin ho ten va luong cua nhan vien co luong nho hon hoac bang 800 va ma phong ban la PB002
select ho_nv, ten_nv, luong from nhan_vien where luong <= 800 and phg = 'pb002';
select * from nhan_vien;

-- bai tap 2
-- tinh tong so luong duoc phan bo xuong tung phong
select phg as ma_phong, sum(luong) as tong_luong from nhan_vien group by phg;
-- tim so luong nho nhat trong bang nhan vien
select min(luong) as luong_nho_nhat from nhan_vien; -- hoac max cho lon nhat
-- ting so luong trung binh cua bang nhan vien
select avg(luong) as luong_tb from nhan_vien;
-- tinh tong so nhan vien trong moi phong
-- nen dung count * dem tat ca co phan biet de dam bao tinh chinh xac
select phg as ma_phong, count(*) as so_luong_nhan_vien from nhan_vien group by phg;
-- hien thi luong trung binh cua ma nhan vien co ma phong pb001
select avg(luong) as luong_tb_phong_001 from nhan_vien where phg = 'pb001';

-- bai tap 3
-- hien thi luong cao nhat cua tung phong them dieu kien la luong >= 1200
-- c1 (khong nen dung where trong cau lenh co group by
select phg as ma_phong, max(luong) as luong_cao_nhat from nhan_vien group by phg having max(luong) >= 1200;
-- c2 loc 2 tang (tao bang tam xong dung where)
select * from (select phg as ma_phong, max(luong) as luong_cao_nhat from nhan_vien group by phg having max(luong) >= 1200) bangtam where bangtam.luong_cao_nhat >= 1200;
-- *** vay group by giup ta lua cho theo tung nhom

-- bai tap 4
-- tinh tong luong cong ty phai tra cho moi phong ban chi hien thi phong nao co tong > 1000
select phg as ma_phong, sum(luong) as tong_luong from nhan_vien group by phg having sum(luong) > 1000;
-- tinh tong luong cong ty phai tra cho moi phong ban, tinh theo cac hang co luong > 700 chi hien thi phong nao co tong > 1000
-- c1 hack nao, cao cap
select nv_lon_hon_700.phg as ma_phong, sum(nv_lon_hon_700.luong) from (select * from nhan_vien where luong > 700) nv_lon_hon_700 
group by nv_lon_hon_700.phg having sum(nv_lon_hon_700.luong) > 1000;
-- c2 don gian hon, xai cai nay cho khoe
select phg as ma_phong, sum(luong) as tong_luong from nhan_vien where luong > 700 group by phg having sum(luong) > 1000;















