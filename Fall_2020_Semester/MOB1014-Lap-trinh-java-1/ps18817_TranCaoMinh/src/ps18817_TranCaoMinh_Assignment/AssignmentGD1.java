package ps18817_TranCaoMinh_Assignment;

import java.util.Scanner;

public class AssignmentGD1 {

	static Scanner s; // Khai bao ben ngoai tranh loi
	
	// CHUONG TRINH CHINH
	public static void main(String[] args) {
			
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH QUAN LY NHAN SU CONG TY 'RONG VIET'\n\n");
		
		// Tao menu chuong trinh		
		System.out.print("                                  ...>~DANH SACH CHUONG TRINH~<...                        \n"
				       + " +-----------------------------------------------------------------------------------------------------+\n"
				       + " |   (1).Nhap danh sach nhan vien                        (6).Tim nhan vien theo khoang luong           |\n"
				       + " |                                                                                                     |\n"
				       + " |   (2).Hien thi danh sach nhan vien                    (7).Sap xep nhan vien theo ho ten             |\n"
				       + " |                                                                                                     |\n"
				       + " |   (3).Tim nhan vien theo ma nhap                      (8).Sap xep nhan vien theo thu nhap           |\n"
				       + " |                                                                                                     |\n"
				       + " |   (4).Xoa nhan vien theo ma nhap                      (9).Xuat 5 nhan vien co thu nhap cao nhat     |\n"
				       + " |                                                                                                     |\n"
				       + " |   (5).Cap nhat thong tin nhan vien theo ma nhap       (0).Ket thuc chuong trinh                     |\n"
				       + " +-----------------------------------------------------------------------------------------------------+\n");
		
		// Moi chon chuong trinh va thuc hien
		int thoat=1;	
		while(true) 
		{
			int chon;
			System.out.print("  -> Moi ban chon chuong trinh: ");
			// Dung try-catch de bat loi khong mong muon
			try
			{
				s=new Scanner(System.in); // Tao moi bien s tranh loi vong lap vo han
				chon=s.nextInt();	
				switch(chon) 
				{
					case 0:
						System.out.print("  --> Ban co thuc su muon thoat chuong trinh khong [1.Khong/2.Co]: ");
						thoat=s.nextInt();										    
					    if(thoat == 2) {
							System.out.print("\n  THANKS FOR USING MY PROGRAM _ @CREATED BY TRAN CAO MINH");
							System.exit(0);
						}
					    break;
					case 1:
						System.out.print(" > Ban da chon chuong trinh (1)\n\n");
						break;
					case 2:
						System.out.print(" > Ban da chon chuong trinh (2)\n\n");
						break;
					case 3:
						System.out.print(" > Ban da chon chuong trinh (3)\n\n");
						break;	
					case 4:
						System.out.print(" > Ban da chon chuong trinh (4)\n\n");
						break;
					case 5:
						System.out.print(" > Ban da chon chuong trinh (5)\n\n");
						break;
					case 6:
						System.out.print(" > Ban da chon chuong trinh (6)\n\n");
						break;
					case 7:
						System.out.print(" > Ban da chon chuong trinh (7)\n\n");
						break;
					case 8:
						System.out.print(" > Ban da chon chuong trinh (8)\n\n");
						break;
					case 9:
						System.out.print(" > Ban da chon chuong trinh (9)\n\n");
						break;
					default:
						System.out.print("  ** Ban vui long chi nhap so trong pham vi [0 --> 10]\n");
						break;
				}			
			}
			catch(Exception e)
			{
				System.out.print("  ** Ban vui long khong nhap chu\n");
				continue;
			}		
		}
		
	}
	
}

