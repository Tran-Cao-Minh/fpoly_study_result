package ps18817_TranCaoMinh_Lab7;

public class ChuNhat {
	
	// Khai bao bien
	int rong,dai;     //. thuoc tinh ne
	
	// Ham tao khong doi so
	public ChuNhat()
	{
		rong=dai=1; //. gan nhieu bien cung bang mot gia tri
	}
	
	// Ham tao co doi so
	public ChuNhat(int rong, int dai)
	{
		this.rong=rong; //. dung this. de chon bien trong class trung ten voi bien truyen vao
		this.dai=dai;
	}
	
	// Phuong thuc tinh chu vi
	int tinhChuVi()
	{
		return (dai+rong)*2;
	}

	// Phuong thuc tinh dien tich
	int tinhDienTich()
	{
		return dai*rong;
	}
	
	// Phuong thuc xuat thong tin hinh Chu Nhat
	void xuatThongTin()
	{                   //. lam nhu vay voi lenh print cho de nhin
		System.out.print("\nChieu dai: "+dai
						+"  Chieu rong: "+rong
						+"  Chu vi: "+tinhChuVi()
						+"  Dien tich: "+tinhDienTich()
						+"\n");
	}
}














