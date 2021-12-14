package ps18817_TranCaoMinh_Lab7;

public class Vuong extends ChuNhat { //. thua ke tu lop cha ChuNhat

	// Khai bao bien 
	int canh;
	
	// Ham tao khong doi so
	public Vuong()
	{
		super(); //. goi ham tao khong doi so cua lop cha
	}
	
	// Ham tao co doi so
	public Vuong(int canh)
	{
		dai=rong=this.canh=canh; //. co the goi ra cac bien da co cua lop cha		
	}
	
	// Phuong thuc xuat thong tin hinh Vuong ke thua hinh Chu Nhat
	void xuatThongTin()
	{
		System.out.print("\nCanh: "+canh
						+"  Chu vi: "+tinhChuVi()
						+"  Dien tich: "+tinhDienTich()
						+"\n");
	}
}









