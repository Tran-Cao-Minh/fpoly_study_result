package ps18817_TranCaoMinh_Lab1;

import java.util.Scanner;

public class bai4 {

	public static void main(String[] args) {
		
		Scanner s=new Scanner(System.in);
		System.out.print(" > CHUONG TRINH PHUONG TRINH BAC 2 < \n\n"); 
		System.out.print("  + Xin moi ban nhap he so thu (1) cua phuong trinh bac 2: "); 
		int so1=s.nextInt();
		System.out.print("  + Xin moi ban nhap he so thu (2) cua phuong trinh bac 2: "); 
		int so2=s.nextInt();
		System.out.print("  + Xin moi ban nhap he so thu (3) cua phuong trinh bac 2: "); 
		int so3=s.nextInt();
		double delta=so2*so2-(4*so1*so3);
		if(delta<0) { // Lenh if giong nhu ben c
			delta*=-1;
		}
		double canDelta=Math.sqrt(delta); // truy cap lop math. phuong thuc sqrt
		System.out.printf("  -> Phuong trinh da nhap la: %dx^2 + %dx + %d = 0\n  -> Can delta cua phuong trinh bac 2 da nhap la: %.2f\n",so1,so2,so3,canDelta);
		s.close();
		
    }

}
