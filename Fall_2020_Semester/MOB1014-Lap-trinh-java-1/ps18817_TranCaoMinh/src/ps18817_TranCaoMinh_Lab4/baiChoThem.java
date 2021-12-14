package ps18817_TranCaoMinh_Lab4;

import java.util.Scanner;

public class baiChoThem {

	public static void main(String[] args) 
	{
		// Gioi thieu chuong trinh
		System.out.print(" > BAI CHO THEM HINH CHU NHAT + CON CHO\n\n");
		
		// Moi nhap thong tin hinh chu nhat va con cho
		Scanner s=new Scanner(System.in);
		// Khai bao bien cho con cho
		String tenCho,mauLong;
		int tuoi;
		// Khai bao bien cho hinh chu nhat
		int dai,rong;
		// Tao bien theo class
		ConCho conCho1=new ConCho();
		HinhChuNhat hinhChuNhat1=new HinhChuNhat();
		// Nhap du lieu con cho
		System.out.print("  + Moi ban nhap ten cho (1): ");
		tenCho=s.nextLine();	
		System.out.print("  + Moi ban nhap mau long cho (1): ");
		mauLong=s.nextLine();
		System.out.print("  + Moi ban nhap tuoi cho (1): ");
		tuoi=s.nextInt();
		conCho1.nhap(tenCho, mauLong, tuoi);
		System.out.println("");
		// Nhap du lieu hinh chu nhat
		System.out.print("  + Moi ban chieu dai hinh chu nhat (1): ");
		dai=s.nextInt();	
		System.out.print("  + Moi ban chieu rong hinh chu nhat (1): ");
		rong=s.nextInt();
		hinhChuNhat1.nhap(dai, rong);
		
		// Xuat thong tin hinh chu nhat va con cho
		System.out.print("\n\n  -> Thong tin con cho (1): \n");
		conCho1.xuat();
		System.out.print("\n\n  -> Thong tin hinh chu nhat (1): \n");
		hinhChuNhat1.xuat();
	}
}
