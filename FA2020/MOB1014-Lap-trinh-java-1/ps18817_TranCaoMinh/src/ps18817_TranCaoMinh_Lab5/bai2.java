package ps18817_TranCaoMinh_Lab5;

import java.util.Scanner;

public class bai2 {

	static Scanner s; // Khai bao ben ngoai tranh loi
	
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > XU LY DANH SACH HO VA TEN\n\n");
		
		// Tao menu chuong trinh
		HoTen hoTen=new HoTen();
		System.out.print("         ...>~DANH SACH CHUONG TRINH~<...                        \n"
				       + " +------------------------------------------------+\n"
				       + " |   (1).Nhap danh ho va ten                      |\n"
				       + " |                                                |\n"
				       + " |   (2).Xuat danh sach vua nhap                  |\n"
				       + " |                                                |\n"
				       + " |   (3).Xuat danh sach ngau nhien                |\n"
				       + " |                                                |\n"
				       + " |   (4).Xap sep giam dan va xuat danh sach       |\n"
				       + " |                                                |\n"
				       + " |   (5).Tim va xoa ho ten nhap tu ban phim       |\n"
				       + " |                                                |\n"
				       + " |   (0).Ket thuc                                 |\n"
				       + " +------------------------------------------------+\n");
		
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
						hoTen.nhapHoTen();
						break;
					case 2:
						hoTen.xuatHoTen();
						break;
					case 3:
						hoTen.xuatDanhSachNgauNhien();
						break;	
					case 4:
						hoTen.xapXepGiamDanVaXuatDanhSach();
						break;
					case 5:
						hoTen.xoaHoTenNhapTuBanPhim();
						break;
					default:
						System.out.print("  ** Ban vui long chi nhap so trong pham vi [0 --> 5]\n");
						break;
				}			
			}
			catch(Exception e)
			{
				System.out.print("  ** Ban vui long khong nhap chu\n");
				continue; //. continue de tiep tuc chuong trinh
			}		
		}			
	}
}
