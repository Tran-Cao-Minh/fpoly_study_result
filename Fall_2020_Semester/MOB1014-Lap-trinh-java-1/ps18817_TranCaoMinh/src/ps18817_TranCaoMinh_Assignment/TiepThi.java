package ps18817_TranCaoMinh_Assignment;

public class TiepThi extends NhanVien{
	
	// Ham tao co doi so 
	TiepThi(String maNV, String hoTen, double luong, double doanhSo, double hueHong)
	{
		super(maNV, hoTen, luong);
		super.doanhSo= doanhSo;
		super.hueHong= hueHong;
		super.chucVu="Tiep thi";
	}
	
	// Ghi de phuong thuc thuNhap cua lop cha NhanVien
	double thuNhap()
	{
		return super.thuNhap() + (doanhSo * hueHong);
	}
	
	// Ham tao truyen chi tiet ghi de cua class NhanVien
	TiepThi(String email, String SDT, String maNV, String hoTen, double luong, double doanhSo, double hueHong)
	{
		this(maNV, hoTen, luong, doanhSo, hueHong);
		this.email= email;
		this.SDT= SDT;
		this.daNhapThongTinChiTiet=true;
	}
	
	// ghi de xuat thong tin chi tiet
	void xuatThongTinChiTiet() //. do viec ghi de phuong thuc nen khong the rut gon (tranh sai thong tin)
	{
		System.out.printf("\n *_________________________"
						 +"\n  |Ma NV: "+maNV
						 +"\n  |Ten NV: "+hoTen
						 +"\n  |Chuc vu: "+chucVu
						 +"\n  |Thu nhap (Da cong them cac khoang khac): "+thuNhap()+"(VND)"
						 +"\n  |Thue thu nhap: "+thueThuNhap()+"(VND)"
						 +"\n  |Luong (Thu nhap - Thue): "+(thuNhap()-thueThuNhap())+"(VND)"
						 +"\n  |Email: "+email
						 +"\n  |SDT: "+SDT
						 +"\n  |Doanh so: "+doanhSo
						 +"\n  |Hue hong: "+hueHong);
	}

}
