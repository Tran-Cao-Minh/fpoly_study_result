package ps18817_TranCaoMinh_Lab6;

import java.util.ArrayList;
import java.util.Scanner;

public class bai3 {
	
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > KIEM SOAT DU LIEU SINH VIEN\n\n");
		
		// Khai bao bien
		SinhVien sv=new SinhVien();
		ArrayList<SinhVien> dsSinhVien=new ArrayList<SinhVien>();
		Scanner s=new Scanner(System.in);
		String ten,sdt,email,cmnd,thoat;
		
		// Moi nhap
		System.out.print(" >> Moi ban nhap thong tin sinh vien: \n");
		while(true)
		{
			sv=new SinhVien();
			sv.nhap();
			dsSinhVien.add(sv);
			System.out.print(" * Ban co muon nhap tiep khong [1.Co/2.Khong]: ");
			s=new Scanner(System.in);
			thoat=s.nextLine();
			if(thoat.equalsIgnoreCase("khong") || thoat.equalsIgnoreCase("2"))
			{
				break;
			}
		}
		
	}
}
