-- bai 1
-- cau a
-- Hiển thị tất cả thông tin có trong bảng khách hàng bao gồm tất cả các cột
select * 
from khachhang;
-- cau b
-- Hiển thị 2 khách hàng đầu tiên trong bảng khách hàng bao gồm các cột: mã khách hàng, họ và tên, email, số điện thoại
select maKhachhang, concat(hoLot,' ',ten) as hoVaTen, email, dienThoai as soDienThoai 
from khachhang limit 2;
-- cau c
-- Hiển thị thông tin từ bảng Sản phẩm gồm các cột: mã sản phẩm, tên sản phẩm, tổng tiền tồn kho. Với tổng tiền tồn kho = đơn giá* số lượng
select maSanpham as maSanPham, tenSP as tenSanPham, soLuong*donGia as tongTienTonKho 
from sanpham;
-- cau d
-- Hiển thị danh sách khách hàng có tên bắt đầu bởi kí tự ‘H’ gồm các cột: maKhachHang, hoVaTen, diaChi. Trong đó cột hoVaTen ghép từ 2 cột hoVaTenLot và Ten
select maKhachhang as maKhachHang, concat(hoLot,' ',ten) as hoVaTen, diaChi 
from khachhang 
where ten like 'h%';
-- cau e
-- Hiển thị tất cả thông tin các cột của khách hàng có địa chỉ chứa chuỗi ‘Đà Nẵng’
select * 
from khachhang 
where diaChi like '%da nang%';
-- cau f
-- Hiển thị các sản phẩm có số lượng nằm trong khoảng từ 100 đến 500
-- tu lam
select * 
from sanpham 
where soLuong >= 100 and soLuong <= 500;
-- thay LOC huong dan them
select * 
from sanpham 
where soLuong between 100 and 500;
-- cau g
-- Hiển thị danh sách các hoá hơn có trạng thái là chưa thanh toán và ngày mua hàng trong năm 2016
select * 
from hoadon 
where trangThai like 'chua thanh toan' and year(ngayMuahang) = 2016;
-- cau h
-- Hiển thị các hoá đơn có mã Khách hàng thuộc 1 trong 3 mã sau: KH001, KH003, KH006
-- tu lam
select * 
from hoadon 
where maKhachhang like 'kh001' or maKhachhang like 'kh003' or maKhachhang like 'kh004';
-- thay LOC chi dan them
select * 
from hoadon 
where maKhachhang in ('kh001','kh003','kh004');

-- bai 2
-- cau a
-- Hiển thị số lượng khách hàng có trong bảng khách hàng
select count(*) as soLuongKhachHang 
from khachhang;
-- cau b
-- Hiển thị đơn giá lớn nhất trong bảng SanPham
select max(donGia) as donGiaLonNhat 
from sanpham;
-- cau c
-- Hiển thị số lượng sản phẩm thấp nhất trong bảng sản phẩm
select min(soLuong) as soLuongThapNhat 
from sanpham;
-- cau d
-- Hiển thị tổng tất cả số lượng sản phẩm có trong bảng sản phẩm
select sum(soLuong) as tongSoLuongSanPham 
from sanpham;
-- cau e
-- Hiển thị số hoá đơn đã xuất trong tháng 12/2016 mà có trạng thái chưa thanh toán
select maHoadon as chuaThanhToan_12_2016 
from hoadon 
where year(ngayMuahang) = 2016 and month(ngayMuahang) = 12 and trangThai like 'chua thanh toan';
-- cau f
-- Hiển thị mã hoá đơn và số loại sản phẩm được mua trong từng hoá đơn.
select maHoadon as maHoaDon, count(maSanpham) as soLoaiSanPham 
from hoadonchitiet 
group by maHoadon;
-- cau g
-- Hiển thị mã hoá đơn và số loại sản phẩm được mua trong từng hoá đơn. Yêu cầu chỉ hiển thị hàng nào có số loại sản phẩm được mua >=2
select maHoadon as maHoaDon, count(maSanPham) as soLoaiSanPham 
from hoadonchitiet 
group by maHoadon having count(maSanpham) >= 2;
select * 
from hoadonchitiet;
-- cau h
-- Hiển thị thông tin bảng HoaDon gồm các cột maHoaDon, ngayMuaHang, maKhachHang. Sắp xếp theo thứ tự giảm dần của ngayMuaHang
select maHoadon as maHoaDon, ngayMuahang as ngayMuaHang, maKhachhang as maKhachHang 
from hoadon order by ngayMuaHang desc;

-- bai lam them
-- lt 1
-- Liệt kê danh sách khách hàng có địa chỉ email của Yahoo
select * 
from khachhang 
where email like '%@yahoo.com';
-- lt 2 
-- Liệt kê các hóa đơn của khách hàng KH001
select * 
from hoadon 
where maKhachhang like 'kh001';
-- lt 3
-- Liệt kê các hóa đơn chưa thanh toán của khách hàng KH001
select * 
from hoadon 
where maKhachhang like 'kh001' and trangThai like 'chua thanh toan';
-- lt 4
-- Đếm số hóa đơn của khách hàng KH001
select count(maHoadon) as soHoaDon_KH001 
from hoadon 
where maKhachhang like 'KH001';
-- lt 5
-- Xem danh sách tất cả sản phẩm ngoại trừ các sản phẩm có mã là 2
select * 
from sanpham 
where maSanpham not like '2';
-- lt 6
-- Liệt kê mã hóa đơn chi tiết, số lượng bán của sản phẫm có mã sản phẩm là 2
select maHoadonChitiet as maHoaDonChiTiet_SanPham2, soLuong as soLuongBan 
from hoadonchitiet 
where maSanpham like '2';
-- lt 7
-- Liệt kê mã hóa đơn, số lượng bán lớn nhất của sản phẩm có mã sản phẩm là 2
select maHoadon as maHoaDon_SanPham2, max(soLuong) as soLuongBanLonNhat 
from hoadonchitiet 
where maSanpham like '2';
-- lt 8
-- Liệt kê mã sản phẩm, tổng số lượng bán sản phẩm có mã sản phẩm là 2
select maSanpham as maSanPham, sum(soLuong) as soLuongBan_SanPham2 
from hoadonchitiet 
where maSanpham like '2';




  


