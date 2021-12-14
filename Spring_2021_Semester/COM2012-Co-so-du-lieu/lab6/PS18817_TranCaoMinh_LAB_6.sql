use ps18817_qlbh_lab6;
select * from hoadon;
select * from hoadonchitiet;
select * from khachhang;
select * from sanpham;
-- ps18817 Tran Cao Minh
-- NỘP BỔ SUNG DO PHẦN NỘP LAB ĐÓNG TRƯỚC THỜI HẠN GIAO BÀI LÀM THÊM

-- bai 1
-- cau a
-- Hiển thị tất cả thông tin có trong 2 bảng Hoá đơn và Hoá đơn chi tiết gồm các cột
-- sau: maHoaDon, maKhachHang, trangThai, maSanPham, soLuong, ngayMua
-- cach 1 binh thuong
select hd.mahoadon, hd.makhachhang, hd.trangthai, hdct.soluong, hd.ngaymuahang
from hoadon hd, hoadonchitiet hdct
where hd.mahoadon = hdct.mahoadon;
-- cach 2 inner join
select hd.mahoadon, hd.makhachhang, hd.trangthai, hdct.soluong, hd.ngaymuahang
from hoadon hd inner join hoadonchitiet hdct
on hd.mahoadon = hdct.mahoadon;
-- cau b
-- Hiển thị tất cả thông tin có trong 2 bảng Hoá đơn và Hoá đơn chi tiết gồm các cột
-- sau: maHoaDon, maKhachHang, trangThai, maSanPham, soLuong, ngayMua với
-- điều kiện maKhachHang = ‘KH001’
-- cach 1 binh thuong
select hd.mahoadon, hd.makhachhang, hd.trangthai, hdct.masanpham, hdct.soluong, hd.ngaymuahang
from hoadon hd, hoadonchitiet hdct
where hd.mahoadon = hdct.mahoadon and hd.makhachhang like 'kh001';
-- cach 2 inner join
select hd.mahoadon, hd.makhachhang, hd.trangthai, hdct.soluong, hd.ngaymuahang
from hoadon hd inner join hoadonchitiet hdct
on hd.mahoadon = hdct.mahoadon
where hd.makhachhang like 'kh001';
-- cau c
-- Hiển thị thông tin từ 3 bảng Hoá đơn, Hoá đơn chi tiết và Sản phẩm gồm các cột
-- sau: maHoaDon, ngayMua, tenSP, donGia, soLuong mua trong hoá đơn, thành
-- tiền. Với thành tiền= donGia* soLuong 
-- cach 1 binh thuong
select hd.mahoadon, hd.ngaymuahang, sp.tensp, sp.dongia, hdct.soluong, (sp.dongia * hdct.soluong) as thanhTien
from hoadon hd, hoadonchitiet hdct, sanpham sp
where hdct.mahoadon = hd.mahoadon 
and hdct.masanpham = sp.masanpham;
-- cach 2 inner join
select hd.mahoadon, hd.ngaymuahang, sp.tensp, sp.dongia, hdct.soluong, (sp.dongia * hdct.soluong) as thanhTien
from hoadon hd inner join hoadonchitiet hdct on hdct.mahoadon = hd.mahoadon
			   inner join sanpham sp on hdct.masanpham = sp.masanpham;
-- cau d
-- Hiển thị thông tin từ bảng khách hàng, bảng hoá đơn, hoá đơn chi tiết gồm các
-- cột: họ và tên khách hàng, email, điện thoại, mã hoá đơn, trạng thái hoá đơn và
-- tổng tiền đã mua trong hoá đơn. Chỉ hiển thị thông tin các hoá đơn chưa thanh
-- toán.
-- cach 1 binh thuong
select concat(kh.hovatenlot,' ',kh.ten) as hoVaTenKH, kh.email, kh.dienthoai, hd.mahoadon, hd.trangthai, sum(hdct.soluong * sp.dongia) as tongTienDaMua
from khachhang kh, hoadon hd, hoadonchitiet hdct, sanpham sp
where hdct.masanpham = sp.masanpham and hdct.mahoadon = hd.mahoadon and hd.makhachhang = kh.makhachhang and hd.trangthai like 'chua thanh toan'
group by hd.mahoadon;
-- cach 2 inner join
select concat(kh.hovatenlot,' ',kh.ten) as hoVaTenKH, kh.email, kh.dienthoai, hd.mahoadon, hd.trangthai, sum(hdct.soluong * sp.dongia) as tongTienDaMua
from hoadon hd inner join khachhang kh on hd.makhachhang = kh.makhachhang
			   inner join hoadonchitiet hdct on hd.mahoadon = hdct.mahoadon
               inner join sanpham sp on hdct.masanpham = sp.masanpham
where hd.trangthai like 'chua thanh toan'
group by hd.mahoadon;
-- cau e
-- Hiển thị maHoaDon, ngàyMuahang, tổng số tiền đã mua trong từng hoá đơn. Chỉ
-- hiển thị những hóa đơn có tổng số tiền >=500.000 và sắp xếp theo thứ tự giảm dần
-- của cột tổng tiền.
-- cach 1 binh thuong
select hd.mahoadon, hd.ngaymuahang, sum(hdct.soluong * sp.dongia) as tongTienHoaDon
from hoadon hd, hoadonchitiet hdct, sanpham sp
where hdct.mahoadon = hd.mahoadon and hdct.masanpham = sp.masanpham and (hdct.soluong * sp.dongia) >= 500000
group by hd.mahoadon
order by tongTienHoaDon desc;
-- cach 2 inner join
select hd.mahoadon, hd.ngaymuahang, sum(hdct.soluong * sp.dongia) as tongTienHoaDon
from hoadonchitiet hdct inner join sanpham sp on hdct.masanpham = sp.masanpham
						inner join hoadon hd on hdct.mahoadon = hd.mahoadon
where (hdct.soluong * sp.dongia) >= 500000
group by hd.mahoadon
order by tongTienHoaDon desc;

-- bai 2
-- cau a
-- Hiển thị danh sách các khách hàng chưa mua hàng lần nào kể từ tháng 1/1/2016
select *
from khachhang
where makhachhang not in (select makhachhang from hoadon where year(ngaymuahang) >= 2016);
-- cau b
-- Hiển thị mã sản phẩm, tên sản phẩm có lượt mua nhiều nhất trong tháng 12/2019
select sp.masanpham, sp.tensp as sanPhamMuaNhieuNhat12_2019, sum(hdct.soluong) as soLuotMua
from hoadonchitiet hdct, hoadon hd, sanpham sp
where hdct.masanpham = sp.masanpham and hdct.mahoadon = hd.mahoadon and year(hd.ngaymuahang) = 2019 and month(hd.ngaymuahang) = 12
group by sp.masanpham
having sum(hdct.soluong) >= all 
	(select sum(hdct.soluong)
	from hoadonchitiet hdct, hoadon hd, sanpham sp
	where hdct.masanpham = sp.masanpham and hdct.mahoadon = hd.mahoadon and year(hd.ngaymuahang) = 2019 and month(hd.ngaymuahang) = 12
	group by sp.masanpham);
-- cau c
-- Hiển thị top 5 khách hàng có tổng số tiền mua hàng nhiều nhất trong năm 2019
select kh.makhachhang, concat(kh.hovatenlot,' ',kh.ten) as hoVaTenKH_muaNhieuNhat2019, sum(sp.dongia*hdct.soluong) as tongSoTien
from hoadonchitiet hdct, hoadon hd, sanpham sp, khachhang kh
where hdct.mahoadon = hd.mahoadon and hdct.masanpham = sp.masanpham and hd.makhachhang = kh.makhachhang and year(hd.ngaymuahang) = 2019
group by kh.makhachhang
order by sum(sp.dongia*hdct.soluong) desc
limit 5;
-- cau d
-- Hiển thị thông tin các khách hàng sống ở ‘Đà Nẵng’ có mua sản phẩm có tên
-- “Iphone 7 32GB” trong tháng 12/2019
select kh.makhachhang, kh.hovatenlot, kh.ten, kh.diachi, kh.email, kh.dienthoai
from hoadonchitiet hdct, hoadon hd, sanpham sp, khachhang kh
where hdct.mahoadon = hd.mahoadon and hdct.masanpham = sp.masanpham and hd.makhachhang = kh.makhachhang 
	and year(hd.ngaymuahang) = 2019 and month(hd.ngaymuahang) = 12
    and sp.tensp like 'Iphone 7 32GB' and kh.diachi like '%da nang%'; -- khong co khach hang loai nay
-- cau e
-- Hiển thị tên sản phẩm có lượt đặt mua nhỏ hơn lượt mua trung bình các các sản
-- phẩm.
select sp.tensp, sum(hdct.soluong) as luotDatMua
from hoadonchitiet hdct, hoadon hd, sanpham sp
where hdct.masanpham = sp.masanpham and hdct.mahoadon = hd.mahoadon
group by sp.masanpham
having sum(hdct.soluong) < (select avg(soluong) from hoadonchitiet group by sp.masanpham);

-- bai lam them
-- cau a
-- Liệt kê Mã sản phẩm, tên sản phẩm chưa có khách hàng nào đặt mua ?
select sp.masanpham, sp.tensp
from hoadonchitiet hdct inner join sanpham sp on hdct.masanpham = sp.masanpham
where sp.masanpham not in (select masanpham from hoadonchitiet); -- tat ca san pham deu duoc mua nen khong co tra ve gia tri
-- cau b
-- Cho biết Mã khách hàng, tên khách hàng nào có mua sản phẩm có mã sản phẩm là 2
select kh.makhachhang, kh.ten 
from hoadonchitiet hdct, hoadon hd, khachhang kh
where hdct.mahoadon = hd.mahoadon and hd.makhachhang = kh.makhachhang
	and hdct.masanpham = 2;
-- cau c
-- Cho biết số ngày quá hạn thanh toán của các hóa đơn chưa thanh toán tính từ ngày mua hàng?
select curdate()-(ngaymuahang) as songayquahanthanhtoan, mahoadon
from hoadon
where trangthai like 'chua thanh toan';






















