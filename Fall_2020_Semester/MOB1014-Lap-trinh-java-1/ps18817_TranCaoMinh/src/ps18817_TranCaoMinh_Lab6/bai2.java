package ps18817_TranCaoMinh_Lab6;

import java.util.ArrayList;
import java.util.Scanner;

public class bai2 {
	
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > XUAT THONG TIN HANG NOKIA\n\n");
		
		// Khai bao bien
		SanPham sp=new SanPham(); //. khai bao class SanPham qua bien sp
		ArrayList<SanPham> dsSanPham=new ArrayList<SanPham>(); //. danh sach mang theo kieu class SanPham
		Scanner s=new Scanner(System.in);  
		String thoat;
		int i;
		
		// Moi nhap
		System.out.print(" >> Moi ban nhap thong tin san pham: \n");
		while(true)
		{
			sp=new SanPham(); //. mot cach don gian de add bien vao mang danh sach la tao moi bien con cua class
			sp.nhap();
			dsSanPham.add(sp);
			System.out.print(" * Ban co muon nhap tiep khong [1.Co/2.Khong]: ");
			s=new Scanner(System.in);
			thoat=s.nextLine();
			if(thoat.equalsIgnoreCase("khong") || thoat.equalsIgnoreCase("2"))
			{
				break;
			}
		}
		
		// Xuat thong tin san pham hang Nokia
		for(i=0;i<dsSanPham.size();i++)
		{
			if(dsSanPham.get(i).hang.equalsIgnoreCase("nokia")) //. so sanh chuoi khong phan biet hoa thuong
			dsSanPham.get(i).xuat();
		}
		
	}
}
