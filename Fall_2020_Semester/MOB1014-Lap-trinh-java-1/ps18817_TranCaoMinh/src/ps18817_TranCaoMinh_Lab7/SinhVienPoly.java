package ps18817_TranCaoMinh_Lab7;

abstract public class SinhVienPoly {
	
	// Khai bao bien
	String hoTen,nganh; //. thuoc tinh
	double diemTB;
	
	// Ham tao khong doi so
	public SinhVienPoly()
	{
		hoTen=nganh="Chua nhap"; //. gan cho string
	}
	
	// Ham tao co doi so
	public SinhVienPoly(String hoTen, String nganh) //. overload(nap chong ne)
	{
		this.hoTen=hoTen;
		this.nganh=nganh;
	}
	
	// Phuong thuc Truu Tuong diem sinh vien
	abstract double diemTB(); //. phuong thuc truu tuong chi nhu vay la du
	
	// Phuong thuc xu ly Hoc Luc sinh vien
	String hocLuc() //. co the return tung truong hop thong qua if else
	{
		if(diemTB() >= 9)
		{
			return "Xuat sac";
		}
		else if(diemTB() < 9 && diemTB() >= 7.5)
		{
			return "Gioi";
		}
		else if(diemTB() < 7.5 && diemTB() >= 6.5)
		{
			return "Kha";
		}
		else if(diemTB() < 6.5 && diemTB() >= 5)
		{
			return "Trung binh";
		}
		else
		{
			return "Yeu";
		}
	}
	
	// Phuong thuc xuat thong tin
	void xuatThongTin()
	{
		System.out.print("\n"
						+"*| Ho ten: "+hoTen
						+" | Nganh: "+nganh
						+" | Diem TB: "+diemTB()
						+" | Hoc luc: "+hocLuc()
						+"\n");
	}

}











