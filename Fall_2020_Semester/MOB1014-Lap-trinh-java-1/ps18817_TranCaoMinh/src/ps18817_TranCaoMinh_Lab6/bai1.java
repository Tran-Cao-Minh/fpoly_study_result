package ps18817_TranCaoMinh_Lab6;

import java.util.Scanner;

public class bai1 {
	
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > IN HOA HO TEN\n\n");
		
		// Khai bao bien
		Scanner s=new Scanner(System.in);
		String hoTen,ho,ten,tenDem;
		
		// Moi nhap
			
		System.out.print("  + Moi ban nhap ho va ten: ");
		hoTen=s.nextLine();
		
		// In hoa ho ten
		hoTen.trim(); //. cat khoan trang dau
		ho=hoTen.substring(0, hoTen.indexOf(" ")); //. lay ho tu 0 den khoang trang dau tien
		ten=hoTen.substring(hoTen.lastIndexOf(" "), hoTen.length()); //. lay ten tu khoang trang cuoi cung den het
		ho=ho.toUpperCase(); //. in hoa cai duoc chon
		ten=ten.toUpperCase();
		tenDem=hoTen.substring(hoTen.indexOf(" "), hoTen.lastIndexOf(" "));//.lay tenDem giua 2 khoang trang dau-cuoi
		
		// In ra ket qua
		System.out.print(ho+tenDem+ten);	
		
	}
}
