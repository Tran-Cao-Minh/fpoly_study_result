package ps18817_TranCaoMinh_Lab4;

// LOP CHO SAN PHAM
public class SanPham {
	
	// Khai bao bien cho lop san pham
	String tenSp;
	double donGia,giamGia;
	
	// Ham tao
	SanPham()
	{
		tenSp="chua nhap ten sp";
		donGia=giamGia=0;
	}
	
	// Phuong thuc tinh thue nhap khau
	double tinhThueNhapKhau() //. ham chi co tra
	{
		double thueNhapKhau=donGia*0.1;
		return thueNhapKhau;
	}
	
	// Phuong thuc nhap thong tin san pham
	void nhap(String tenSp, double donGia, double giamGia) //. ham chi co truyen
	{
		this.tenSp=tenSp;
		this.donGia=donGia;
		this.giamGia=giamGia;
	}
	
	// Phuong thuc xuat thong tin san pham
	void xuat() //. ham khong tra cung khong truyen
	{
		System.out.println("  -> Ten san pham: "+ this.tenSp);
		System.out.println("  -> Don gia:"+ this.donGia);
		System.out.println("  -> Giam gia: "+ this.giamGia);
		System.out.println("  -> Thue nhap khau: "+ tinhThueNhapKhau());
	}
	

}
