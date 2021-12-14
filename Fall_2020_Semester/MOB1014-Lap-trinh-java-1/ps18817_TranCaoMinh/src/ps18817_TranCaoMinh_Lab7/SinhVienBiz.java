package ps18817_TranCaoMinh_Lab7;

public class SinhVienBiz extends SinhVienPoly{
	 
	// Khai bao bien
	double diemMarketing,diemSales,diemTB;
	
	// Ham tao co doi so (ham cha da co ham tao khong doi so)
	public SinhVienBiz(String hoTen, double diemMarketing, double diemSales)
	{
		super(hoTen,"Biz");
		this.diemMarketing=diemMarketing;
		this.diemSales=diemSales;
		this.diemTB=diemTB();
	}
	
	// Ghi de phuong thuc Diem cua sinh vien poly
	double diemTB()
	{
		return (2*diemMarketing + diemSales)/3;
	}

}
