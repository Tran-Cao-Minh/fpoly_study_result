package ps18817_TranCaoMinh_Lab7;

public class SinhVienIT extends SinhVienPoly{
	
	// Khai bao bien
	double diemJava,diemCss,diemHtml,diemTB;
	
	// Ham tao co doi so (ham cha da co ham tao khong doi so)
	public SinhVienIT(String hoTen, double diemJava, double diemCss, double diemHtml) //. override (ghi de ne)
	{
		super(hoTen,"IT");
		this.diemJava=diemJava;
		this.diemCss=diemCss;
		this.diemHtml=diemHtml;
		this.diemTB=diemTB();
	}
	
	// Ghi de phuong thuc Diem cua sinh vien poly
	double diemTB()
	{
		return (2*diemJava + diemHtml + diemCss)/4;
	}

}













