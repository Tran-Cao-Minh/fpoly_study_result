package ps18817_TranCaoMinh_Assignment;

public class NhanVien {

	// Khai bao thuoc tinh
	String maNV,hoTen,chucVu,email,SDT;
	double luong,luongTrachNhiem,doanhSo,hueHong;
	boolean daNhapThongTinChiTiet;
	
	// Ham tao mac dinh
	NhanVien()
	{
		
	}
	
	// Ham tao co truyen binh thuong
	NhanVien(String maNV, String hoTen, double luong)
	{
		this.maNV=maNV;
		this.hoTen=hoTen;
		this.luong=luong;
		this.chucVu="Nhan vien";
		this.daNhapThongTinChiTiet=false;
	}
	
	// Ham tao truyen chi tiet
	NhanVien(String email, String SDT, String maNV, String hoTen, double luong)
	{
		this(maNV, hoTen, luong);
		this.email= email;
		this.SDT= SDT;
		this.daNhapThongTinChiTiet=true;
	}
	
	// Tinh thue thu nhap
	double thueThuNhap()
	{
		double thueThuNhap=0; // da xu ly de thu nhap >0 tai class XuLyNhapLieu nen truong hop =0 la mac dinh
		if(thuNhap() >= 9000000  && thuNhap() <= 15000000)
		{
			thueThuNhap=thuNhap()*0.1;
		}
		else if(thuNhap() > 15000000)
		{
			thueThuNhap=thuNhap()*0.12;
		}
		return thueThuNhap;
	}

	
	// Tinh thu nhap
	double thuNhap()
	{
		return luong;
	}	
	
	// Xuat thong tin nhan vien 
	void xuatThongTin()
	{
		System.out.print("\n  *__________________________________________________________________________________________________________________________________________"
						+"\n   | Ma NV: "+maNV+" | Ten NV: "+hoTen+" | Thu nhap: "+thuNhap()+"(VND) | Thue thu nhap: "+thueThuNhap()+"(VND) | Luong: "+(thuNhap()-thueThuNhap())+"(VND) ");                              
	}
	
	// Xuat thong tin nhan vien chi tiet
	void xuatThongTinChiTiet()
	{
		System.out.printf("\n *_________________________"
						 +"\n  |Ma NV: "+maNV
						 +"\n  |Ten NV: "+hoTen
						 +"\n  |Chuc vu: "+chucVu
						 +"\n  |Thu nhap (Da cong them cac khoang khac): "+thuNhap()+"(VND)"
						 +"\n  |Thue thu nhap: "+thueThuNhap()+"(VND)"
						 +"\n  |Luong (Thu nhap - Thue): "+(thuNhap()-thueThuNhap())+"(VND)"
						 +"\n  |Email: "+email
						 +"\n  |SDT: "+SDT);
	}
	
}


















