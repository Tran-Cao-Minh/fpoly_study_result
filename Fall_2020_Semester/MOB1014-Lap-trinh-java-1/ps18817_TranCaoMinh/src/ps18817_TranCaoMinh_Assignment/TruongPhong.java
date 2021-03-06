package ps18817_TranCaoMinh_Assignment;

public class TruongPhong extends NhanVien{
	
	// Ham tao co doi so
	TruongPhong(String maNV, String hoTen, double luong, double luongTrachNhiem)
	{
		super(maNV, hoTen, luong);
		super.luongTrachNhiem= luongTrachNhiem;
		super.chucVu="Truong phong";
	}
	
	// Ghi de phuong thuc thuNhap cua lop cha NhanVien
	double thuNhap()
	{
		return super.thuNhap() + luongTrachNhiem;
	}
	
	// Ham tao truyen chi tiet ghi de cua class NhanVien
	TruongPhong(String email, String SDT, String maNV, String hoTen, double luong, double luongTrachNhiem)
	{
		this(maNV, hoTen, luong, luongTrachNhiem);
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
						 +"\n  |Luong trach nhiem: "+luongTrachNhiem);
	}

}
