package ps18817_TranCaoMinh_Lab2;

import java.util.Scanner;

public class bai1 {

	public static void main(String[] args) {
		// Gioi thieu chuong trinh // Viet code nen comment nhieu vao
		System.out.print(" > CHUONG TRINH GIAI PHUONG TRINH BAC 1\n\n");
		// Moi nhap he so thu 1 va thu 2
		Scanner s=new Scanner(System.in); // Truy cap lop (class) Scanner
		System.out.print("  + Xin moi ban nhap he so thu (1): ");
		float heSo1=s.nextFloat();
		System.out.print("  + Xin moi ban nhap he so thu (2): ");
		float heSo2=s.nextFloat();
		// Xu ly phuong trinh da nhap va cho ket qua
		System.out.printf("  -> Phuong trinh [ %.1fx + %.1f = 0 ] ",heSo1,heSo2);
		if(heSo1==0) { // Bat dau dung if else long nhau phuc tap hon ty
			if(heSo2==0){
				System.out.print("co vo so nghiem\n");
			}
			else{
				System.out.print("vo nghiem\n");
			}
		}
		else {
			float nghiem=(-heSo2)/heSo1;
			System.out.printf("co nghiem la: %.2f\n",nghiem);
		}
		s.close();
    }

}
