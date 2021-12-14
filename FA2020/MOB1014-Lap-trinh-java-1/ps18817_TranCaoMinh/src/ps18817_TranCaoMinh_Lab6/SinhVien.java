package ps18817_TranCaoMinh_Lab6;

import java.util.Scanner;

public class SinhVien {

	// Khai bao bien
	Scanner s=new Scanner(System.in);
	String ten,sdt,email,cmnd,mauSdt,mauEmail,mauCmnd;
	
	// Ham tao
	SinhVien()
	{
			
	}
	
	// Nhap thong tin
	void nhap()
	{	
		// Tao dinh dang
		mauSdt="0\\d{9,10}"; //. \d la so \truoc nua de khu \ sau
		mauEmail="\\w+@\\w+.\\w+"; //. tuong tu nhung dau + la 1 den vo han ky tu. \1 de khu \2, \2 de khu .
		mauCmnd="\\d{9}"; //. w la chu
		// Nhap theo dinh dang
		s=new Scanner(System.in);
		System.out.print("  + Ten: ");		
		ten=s.nextLine();
		System.out.print("  + SDT: ");
		sdt=s.nextLine();
		while(sdt.matches(mauSdt)==false) //. dung matches de so sanh voi mau
		{
			System.out.print("  ** Ban vui long nhap dung dinh dang");
			sdt=s.nextLine();
		}
		System.out.print("  + Email: ");		
		email=s.nextLine();
		while(email.matches(mauEmail)==false)
		{
			System.out.print("  ** Ban vui long nhap dung dinh dang");
			email=s.nextLine();
		}
		System.out.print("  + So CMND: ");
		cmnd=s.nextLine();
		while(cmnd.matches(mauCmnd)==false)
		{
			System.out.print("  ** Ban vui long nhap dung dinh dang: ");
			cmnd=s.nextLine();
		}
	}
	
	// Xuat thong tin
	void xuat()
	{
		System.out.print("\t");
	}
}
