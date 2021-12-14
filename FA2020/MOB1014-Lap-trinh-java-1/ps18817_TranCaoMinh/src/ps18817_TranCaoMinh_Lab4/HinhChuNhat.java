package ps18817_TranCaoMinh_Lab4;

// LOP CHO HINH CHU NHAT
public class HinhChuNhat {
	
	// Khai bao bien cho lop hinh chu nhat
	int dai,rong;
	
	// Ham tao
	HinhChuNhat() //. nen xai them ham tao khong doi so
	{
		dai=rong=1;
	}
	
	// Phuong thuc tinh chu vi hinh chu nhat
	int chuVi()
	{
		int chuVi=(dai+rong)*2;
		return chuVi;
	}
	
	// Phuong thuc tinh dien tich hinh chu nhat
	int dienTich()
	{
		int dienTich=dai*rong;
		return dienTich;
	}
	
	// Nhap thong tin cho hinh chu nhat
	void nhap(int dai, int rong)
	{
		this.dai=dai;
		this.rong=rong;
	}
	
	// Phuong thuc xuat thong tin hinh chu nhat
	void xuat()
	{
		System.out.print("  Chieu dai (1): "+dai
				        +"  Chieu rong (1): "+rong
				        +"  Chu vi: "+chuVi()
				        +"  Dien Tich: "+dienTich());
	}
}
