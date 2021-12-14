package ps18817_TranCaoMinh_Assignment;

import java.util.Scanner;

public class XuLyNhapLieu {
	
	// Khai bao bien
	double soDuong;
	Scanner s=new Scanner(System.in);
	int xacDinhYesNo;
	String SDT,email;
	
	// Combo xu ly nhap lieu dam bao so duong
		// Nhap so lon hon 0
		void damBaoSoDuongKieuDouble()
		{
			double x=0;
			// Dam bao mot so x >=0
			x=s.nextDouble();
			while(x <= 0) 
			{
				System.out.print("  + Vui long nhap mot so lon hon 0: ");
				x=s.nextDouble();
			}
			soDuong=x;
		}
		// Tra ve so lon hon 0
		double traVeSoDuongDouble()
		{
			return soDuong;
		}
	// Ket thuc Combo xu ly nhap lieu dam bao so duong

	// Combo xu ly thong tin yes no
		// Xu ly thong tin Yes/No
		void xuLyYesNo()
		{
			xacDinhYesNo=0;
			s=new Scanner(System.in);
			while(xacDinhYesNo == 0)
			{
				String x=s.nextLine();
				if(x.startsWith("y")==true || x.startsWith("Y")==true)
				{
					xacDinhYesNo=1;
					break;
				}
				else if(x.startsWith("n")==true || x.startsWith("N")==true)
				{
					xacDinhYesNo=2;
					break;
				}
				else
				{
					System.out.print("   ** Moi ban nhap lai [Y/N]: ");
				}
			}	
		}
		// Tra ve ket qua Yes/No duoi dang int
		int ketQuaYesNo()
		{
			return xacDinhYesNo;
		}
	// Ket thuc Combo xu ly thong tin yes no
		
	// Combo xu ly nhap email,sdt
		// Xu ly dinh dang email,sdt
		void xuLyEmailVaSDT()
		{
			s=new Scanner(System.in);
			System.out.print("  + SDT: ");
			SDT=s.nextLine();
			while(SDT.matches("0\\d{9,10}")==false)
			{
				System.out.print("  ** Sai dinh dang (Vd: 0937232138)=> Nhap lai: ");
				SDT=s.nextLine();
			}
			System.out.print("  + Email: ");		
			email=s.nextLine();
			while(email.matches("\\w+@gmail.com")==false)
			{
				System.out.print("  ** Sai dinh dang (Vd: minh@gmail.com)=> Nhap lai: ");
				email=s.nextLine();
			}
		}
		// Tra ve ket qua SDT chuan
		String ketQuaSDT()
		{
			return SDT;
		}
		// Tra ve ket qua email chuan
		String ketQuaEmail()
		{
			return email;
		}
	// Ket thuc Combo xu ly nhap email
		
}












