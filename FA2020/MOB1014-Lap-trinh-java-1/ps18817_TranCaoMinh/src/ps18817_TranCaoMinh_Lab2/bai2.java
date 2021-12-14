package ps18817_TranCaoMinh_Lab2;

import java.util.Scanner;

public class bai2 {

	public static void main(String[] args) {
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH GIAI PHUONG TRINH BAC 2\n\n");
		// Moi nhap he so thu 1, thu 2 va thu 3
		Scanner s=new Scanner(System.in);
		System.out.print("  + Xin moi ban nhap he so thu (1): ");
		float heSo1=s.nextFloat();
		System.out.print("  + Xin moi ban nhap he so thu (2): ");
		float heSo2=s.nextFloat();
		System.out.print("  + Xin moi ban nhap he so thu (3): ");
		float heSo3=s.nextFloat();
		// Xu ly phuong trinh da nhap va cho ket qua
		System.out.printf("  -> Phuong trinh [ %.1fx^2 + %.1fx + %.1f = 0 ] ",heSo1,heSo2,heSo3);		
		if(heSo1==0) {
			if(heSo2==0) {
				if(heSo3==0){
					System.out.print("co vo so nghiem\n");
				}
				else{
					System.out.print("vo nghiem\n");
				}
			}
			else {
				float nghiem=(-heSo3)/heSo2;
				System.out.printf("co nghiem la: %.2f\n",nghiem);
			}
		}
		else {
			float delta=(heSo2*heSo2)-(4*heSo1*heSo3);
			if(delta<0) {
				System.out.print("vo nghiem\n");
			}
			else if(delta==0) {
				float nghiemKep=(-heSo2)/(2*heSo1);
				System.out.printf("co nghiem kep la: %.2f\n",nghiemKep);
			}
			else {
				System.out.print("co 2 nghiem phan biet la:\n");
				System.out.printf("      x1= %.2f\n",(-heSo2+(Math.sqrt(delta)))/(2*heSo1));
				System.out.printf("      x2= %.2f\n",(-heSo2-(Math.sqrt(delta)))/(2*heSo1));
			}
		}
		s.close();
	}

}
