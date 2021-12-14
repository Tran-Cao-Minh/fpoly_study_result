package ps18817_TranCaoMinh_Lab1;

import java.util.Scanner;

public class bai3 {

	public static void main(String[] args) {
		
		Scanner s=new Scanner(System.in);
		System.out.print(" > CHUONG TRINH TINH THE TICH KHOI LAP PHUONG < \n\n"); 
		System.out.print("  + Xin moi ban nhap do dai canh cua [khoi lap phuong]: "); 
		float canh=s.nextFloat();
		float theTich=(float)Math.pow(canh,3); // Truy cap lop math. phuong thuc pow
		System.out.printf("  -> The tich cua khoi lap phuong la: %.2f\n",theTich); 
		s.close();

	}

}
