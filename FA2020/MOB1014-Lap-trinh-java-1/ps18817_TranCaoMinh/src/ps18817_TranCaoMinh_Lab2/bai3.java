package ps18817_TranCaoMinh_Lab2;

import java.util.Scanner;

public class bai3 {

	public static void main(String[] args) {
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH TINH TIEN DIEN\n\n");
		// Moi nhap so dien su dung cua thang
		Scanner s=new Scanner(System.in);
		System.out.print("  + Xin moi ban nhap vao so dien su dung cua thang: ");
		float soDien=s.nextFloat();
		if(soDien<=0) { // chi can dung while la ok, moi lap trinh nen tu duy hoi kem :D
			System.out.print("  * Ban vui long nhap so dien lon hon 0\n");
			while(soDien<=0) {
				System.out.print("  + Xin moi ban nhap lai: ");
				soDien=s.nextFloat();
			}
		}
		System.out.printf("  -> So dien ban da nhap la %.2f\n",soDien);
		// In ra so tien dien phai tra
		if(soDien<=50) { // Chu y chuong trinh phai than thien voi khach hang
			System.out.print("  -> Ban da su dung dien trong pham vi [0,50] \n");
			System.out.printf("  --> So tien dien ban phai tra la: %.2f vnd\n",(soDien*1000));
		}
		else {
			System.out.print("  -> Ban da su dung dien vuot muc 50 \n");
			System.out.printf("  --> So tien dien ban phai tra la: %.2f vnd\n",((50*1000)+((soDien-50)*1200)));			
		}
        s.close();
	}

}
