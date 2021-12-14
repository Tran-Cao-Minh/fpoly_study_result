package ps18817_TranCaoMinh_Lab1;

import java.util.Scanner;

public class bai2 {

	public static void main(String[] args) {
		Scanner s=new Scanner(System.in);
		System.out.print(" > CHUONG TRINH PHAN TICH HINH CHU NHAT < \n\n"); 
		System.out.print("  + Xin moi ban nhap do dai canh thu (1) cua [hinh chu nhat]: "); 
		float canh1=s.nextFloat();
		System.out.print("  + Xin moi ban nhap do dai canh thu (2) cua [hinh chu nhat]: "); 
		float canh2=s.nextFloat();
		float chuVi=(canh1+canh2)*2, 
			dienTich=canh1*canh2, 
			canhNhoNhat=Math.min(canh2, canh1);  // Truy cap lop math co san. phuong thuc min
		System.out.printf("  -> Dien tich cua [hinh chu nhat]: %.2f\n  -> Chu vi cua [hinh chu nhat]: %.2f\n  -> Canh nho nhat cua [hinh chu nhat]: %.2f\n",dienTich,chuVi,canhNhoNhat); 
		s.close();

	}
}
