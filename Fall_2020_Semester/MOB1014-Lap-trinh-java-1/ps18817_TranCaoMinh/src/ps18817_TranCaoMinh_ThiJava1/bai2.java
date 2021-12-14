package ps18817_TranCaoMinh_ThiJava1;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class bai2 {
	
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > De Tu Cua Thay Khoa - ps18817 Tran Cao Minh - Mong duoc 10 diem :D\n\n");
		System.out.print(" > BAI 2\n\n");
		
		// Khai bao bien
		Scanner s=new Scanner(System.in);
		ConNguoi conNguoi[]=new ConNguoi[2];
		
		// Moi nhap	 
		System.out.print("  + Moi ban nhap mang 3 con nguoi: ");
		for(int i=0; i<conNguoi.length; i++) // Dung for duyet mang
		{
			System.out.print("  + Moi ban nhap ten nguoi thu "+(i+1)+": ");
			s=new Scanner(System.in); //. Tranh loi khi nhap so xong chu
			conNguoi[i].ten=s.nextLine();
			System.out.print("  + Moi ban nhap ten tuoi thu "+(i+1)+": ");
			conNguoi[i].tuoi=s.nextInt();
		}
		
		// Xuat thong tin
		System.out.print("  + Xuat thong tin mang 3 con nguoi: ");
		for(int i=0; i<conNguoi.length; i++) // Dung for xuat mang
		{
			conNguoi[i].xuat();
		}
	}
	
}
