package ps18817_TranCaoMinh_Lab4;

// LOP CHO CON CHO
public class ConCho {
	
	// Khai bao bien cho lop con cho
	String tenCho,mauLong;
	int tuoi;
	
	// Ham tao
	ConCho()
	{
		tenCho="chua nhap ten cho";
		mauLong="trui lui";
		tuoi=1;
	}
	
	// Phuong thuc xac dinh hanh dong cho
	void hanhDongCho()
	{
		System.out.print("  Gau Gau \n");
	}
	
	// Nhap thong tin cho con cho
	void nhap(String tenCho, String mauLong, int tuoi)
	{
		this.tenCho=tenCho;
		this.mauLong=mauLong;
		this.tuoi=tuoi;
	}
	
	// Xuat thong tin cho
	void xuat()
	{
		System.out.print("  Ten cho (1): "+tenCho
				        +"  Mau long: "+mauLong
				        +"  Tuoi: "+tuoi);
	}
	
}
