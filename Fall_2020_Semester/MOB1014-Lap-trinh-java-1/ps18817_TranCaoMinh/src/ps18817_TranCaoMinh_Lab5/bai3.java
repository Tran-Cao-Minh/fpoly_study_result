package ps18817_TranCaoMinh_Lab5;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Scanner;

public class bai3 {

	// Khai bao bien tinh
	static Scanner s; // Khai bao ben ngoai tranh loi
	static String tenSanPham; //. day la toi khi moi lap trinh
	static double giaSanPham; //. nen khai bao xong nhap luon, dung bien static gay ton bo nho
	SanPham sanPham=new SanPham();
	static ArrayList<SanPham> dsSanPham=new ArrayList<SanPham>();
	static int i,x;

	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > UNG DUNG QUAN LY SAN PHAM\n\n");
		
		// Tao menu chuong trinh
		HoTen hoTen=new HoTen();
		System.out.print("         ...>~DANH SACH CHUONG TRINH~<...                        \n"
				       + " +------------------------------------------------+\n"
				       + " |   (1).Nhap danh sach san pham                  |\n"
				       + " |                                                |\n"
				       + " |   (2).Xap sep giam dan va xuat danh sach       |\n"
				       + " |                                                |\n"
				       + " |   (3).Tim va xoa san pham nhap tu ban phim     |\n"
				       + " |                                                |\n"
				       + " |   (4).Xuat gia trung binh cua cac san pham     |\n"
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
				s.nextLine();
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
						nhapThongTinSanPham();
						break;
					case 2:
						sapXepGiamDanVaXuatRaManHinh();
						break;
					case 3:
						timVaXoaTheoTenNhap();
						break;	
					case 4:
						xuatGiaTrungBinhCuaCacSanPham();
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
	
	// Ham con de nhap thong tin san pham
	static void nhapThongTinSanPham()
	{
		i=1;
		x=2;
		boolean tiepTuc=true;
		while(tiepTuc==true) {
			System.out.print("  + Moi ban nhap thong tin san pham "+i +"\n");
			i++;
			System.out.print("  + Nhap ten: ");
			tenSanPham=s.nextLine();
			System.out.print("  + Nhap gia: ");
			giaSanPham=s.nextDouble();
			SanPham sp=new SanPham(tenSanPham, giaSanPham);
			dsSanPham.add(sp);
			System.out.print("  * Ban co muon nhap tiep khong [1.Khong/2.Co]- nhap so: ");
			x= s.nextInt();
			s.nextLine();
			if(x==1)
			{
				tiepTuc=false;
			}
		}	
	}
	
	// Ham con sap xep thong tin san pham theo gia giam dan
	static void sapXepGiamDanVaXuatRaManHinh()
	{//.           ten lop  bien de sap xep
		Comparator<SanPham> c=new Comparator<SanPham>() //. cach dung comparator. Viet xong hang nay
		{												//. them {}; sau do di chuyen chuot toi Comparator va import
			@Override
			public int compare(SanPham o1, SanPham o2) {
				// TODO Auto-generated method stub
				return (int)(o1.giaSanPham-o2.giaSanPham); //. con so sanh chu va phuong thuc deu duoc
			}
		};
		Collections.sort(dsSanPham, c);	//. dung class collections nho import thu vien
		Collections.reverse(dsSanPham);
		for(i=0;i<dsSanPham.size();i++)
		{
			System.out.print("  --> Ten san pham: "+dsSanPham.get(i).tenSanPham +"-Gia: "+ dsSanPham.get(i).giaSanPham + "\n");
		}
	}
	
	// Ham con xoa ten san pham nhap tu ban phim
	static void timVaXoaTheoTenNhap()
	{
		System.out.print("  + Moi ban nhap ten san pham muon xoa: ");
		tenSanPham=s.nextLine();
		for(i=0;i<dsSanPham.size();i++)
		{
			if(dsSanPham.get(i).tenSanPham.equals(tenSanPham))
			{
				dsSanPham.remove(i); //. phuong thuc remove de xoa
			}
		}
	}
	
	// Ham con xuat gia trung binh cua cac san pham
	static void xuatGiaTrungBinhCuaCacSanPham()
	{
		double tong=0;
		int soLuong=0;
		for(i=0;i<dsSanPham.size();i++)
		{
			soLuong++;
			tong+=dsSanPham.get(i).giaSanPham;
		}
		System.out.print("  --> Gia trung binh cua cac san pham la: "+ (tong/soLuong));	
	}
	
}










