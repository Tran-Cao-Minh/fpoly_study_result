package ps18817_TranCaoMinh_Lab6;

import java.util.Scanner;

public class SanPham {
	// Khai bao bien //. thuoc tinh la bien toan cuc
	Scanner s=new Scanner(System.in);
	String ten,hang;
	double gia;
	
	// Ham tao
	SanPham()
	{
			
	}
	
	// Nhap thong tin
	void nhap()
	{	
		s=new Scanner(System.in);
		System.out.print("  + Ten san pham: ");		
		ten=s.nextLine();
		System.out.print("  + Hang san pham: ");
		hang=s.nextLine();
		System.out.print("  + Gia san pham: ");
		gia=s.nextDouble();
	}
	
	// Xuat thong tin
	void xuat()
	{
		System.out.print("\t"+ten+"\t"+hang+"\t"+gia); //. dung /t cho tab XD
	}
}
