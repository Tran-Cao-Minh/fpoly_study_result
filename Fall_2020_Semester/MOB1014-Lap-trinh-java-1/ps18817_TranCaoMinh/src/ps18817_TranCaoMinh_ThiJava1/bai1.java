package ps18817_TranCaoMinh_ThiJava1;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class bai1 {
	
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > De Tu Cua Thay Khoa - ps18817 Tran Cao Minh - Mong duoc 10 diem :D\n\n");
		System.out.print(" > BAI 1   \n\n");
		
		// Khai bao bien
		Scanner s=new Scanner(System.in);
		int mangSoNguyen[]=new int[4],tong=0;
			
		// Moi nhap	 
		System.out.print("  + Moi ban nhap mang 5 so nguyen: ");
		for(int i=0; i<mangSoNguyen.length; i++) // Dung for duyet mang
		{
			System.out.print("  + Moi ban nhap so thu "+(i+1)+": ");
			mangSoNguyen[i]=s.nextInt();
			tong+=mangSoNguyen[i];
		}
		System.out.print("  + Tong cua 5 so nguyen vua nhap la: "+tong);
		
	}
	
}
