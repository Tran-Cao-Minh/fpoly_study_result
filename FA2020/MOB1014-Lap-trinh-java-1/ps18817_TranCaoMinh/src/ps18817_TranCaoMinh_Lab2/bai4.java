package ps18817_TranCaoMinh_Lab2;

import java.util.Scanner;

public class bai4 {
	
	static Scanner s; // .Khi tao menu nen de lop scanner ben ngoai dung chung, hoac tao moi de tranh loi
    // Chuong trinh chinh
	public static void main(String[] args) {
		s=new Scanner(System.in);
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH MENU CAC BAI TAP LAB 2\n\n");
		// Tao menu chuong trinh
		System.out.print("                           ~MENU~                        \n"
				       + " +------------------------------------------------------+\n"
				       + " | 1.Giai phuong trinh bac nhat                         |\n"
				       + " | 2.Giai phuong trinh bac 2                            |\n"
				       + " | 3.Tinh tien dien                                     |\n"
				       + " | 4.Ket thuc                                           |\n"
				       + " +------------------------------------------------------+\n");
		// Moi chon chuong trinh va thuc hien
		int chon; // .Bay gio nghi lai that khai bao int xong nhap luon co phai do ton bo nho khong :D
		do {
			System.out.print("  -> Moi ban chon chuong trinh: ");
			chon=s.nextInt();
			if(chon==1||chon==2||chon==3||chon==4) { // .Hoi do dung if de bat loi, cung tam duoc :)
				switch(chon) { // .Bat dau dung switch case nhu c
				case 1:
					giaiPTB1(); // .Goi cac phuong thuc
					break;
				case 2:
					giaiPTB2(); // .lay cac chuong trinh da viet, tao phuong thuc. Chu y khong ghi main
					break;
				case 3:
					tinhTienDien();
					break;
				default:
					System.out.print("  --> Ban co thuc su muon thoat chuong trinh khong [1.Co/2.Khong]: ");
					byte thoat=s.nextByte(); // .nen dung yes/no, moi dau lam nen vay cung duoc					
				    while(thoat!=1 && thoat!=2) { // .bat loi bang while roi ne :D
						System.out.print("  ** Ban vui long chi chon mot trong cac so [1,2]\n");
						System.out.print("  --> Moi ban chon lai: ");
						thoat=s.nextByte();
					}																					
					if(thoat==1) {
						System.out.println("\n  THANKS FOR USING MY PROGRAM _ @CREATED BY TRAN CAO MINH");
					}
					else {
						chon=0;
					}
				}
			}
			else {
				System.out.print("  ** Ban vui long chon mot trong cac so [1,2,3,4]\n");
			}
		}	
		while(chon!=4); // khi chon bang 4 cho no ngung chay, con nhieu cach lam
	}
	
	// Chuong trinh con 1
	public static void giaiPTB1() { // .phuong thuc no nhu vay ne
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH GIAI PHUONG TRINH BAC 1\n\n");
		// Moi nhap he so thu 1 va thu 2

		System.out.print("  + Xin moi ban nhap he so thu (1): ");
		float heSo1=s.nextFloat();
		System.out.print("  + Xin moi ban nhap he so thu (2): ");
		float heSo2=s.nextFloat();
		// Xu ly phuong trinh da nhap va cho ket qua
		System.out.printf("  -> Phuong trinh [ %.1fx + %.1f = 0 ] ",heSo1,heSo2);
		if(heSo1==0) {
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
	}
	
	// Chuong trinh con 2
	public static void giaiPTB2() {
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH GIAI PHUONG TRINH BAC 2\n\n");
		// Moi nhap he so thu 1, thu 2 va thu 3
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
	}
	
	// Chuong trinh con 3
	public static void tinhTienDien() {
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH TINH TIEN DIEN\n\n");
		// Moi nhap so dien su dung cua thang
		System.out.print("  + Xin moi ban nhap vao so dien su dung cua thang: ");
		float soDien=s.nextFloat();
		if(soDien<=0) {
			System.out.print("  * Ban vui long nhap so dien lon hon 0\n");
			while(soDien<=0) {
				System.out.print("  + Xin moi ban nhap lai: ");
				soDien=s.nextFloat();
			}
		}
		System.out.printf("  -> So dien ban da nhap la %.2f\n",soDien);
		// In ra so tien dien phai tra
		if(soDien<=50) {
			System.out.print("  -> Ban da su dung dien trong pham vi [0,50] \n");
			System.out.printf("  --> So tien dien ban phai tra la: %.2f vnd\n",(soDien*1000));
		}
		else {
			System.out.print("  -> Ban da su dung dien vuot muc 50 \n");
			System.out.printf("  --> So tien dien ban phai tra la: %.2f vnd\n",((50*1000)+((soDien-50)*1200)));			
		}
	}

}
