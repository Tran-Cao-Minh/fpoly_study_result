package ps18817_TranCaoMinh_ThiJava1;

public class ConNguoi {
	
	// Khai bao thuoc tinh
	String ten;
	int tuoi;
	
	// Ham tao khong doi so
	ConNguoi()
	{
		ten="chua co ten";
		tuoi=0;
	}
	
	// Ham nhap ten va tuoi
	void nhap(String ten, int tuoi)
	{
		this.ten=ten;
		this.tuoi=tuoi;
	}
	
	// Ham xuat thong tin ve ten va tuoi
	void xuat()
	{
		System.out.print("   Ten: "+ten
						+"   Tuoi: "+tuoi);
	}

}
