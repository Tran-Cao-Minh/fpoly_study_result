package ps18817_TranCaoMinh_Assignment;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Scanner;

public class AssignmentGD2 {

	static Scanner s; // Khai bao ben ngoai tranh loi
	static ArrayList<NhanVien> dsNV=new ArrayList<NhanVien>(); // Tao danh sach nhan vien
	static NhanVien nv=new NhanVien();
	static String maNV,hoTen;
	static double luong,luongMin,luongMax,thueThuNhap,thuNhap;
	static int thoat,i,chon;
	
	// Chuong trinh chinh
	public static void main(String[] args) {
		
		// Tao danh sach nhan vien Fake thu nghiem
		dsNV.add(new NhanVien("1","a",100));
		dsNV.add(new NhanVien("2","b",200));
		dsNV.add(new NhanVien("3","c",300));
		dsNV.add(new NhanVien("4","d",400));
		dsNV.add(new NhanVien("5","e",500));
		
			
		// Gioi thieu chuong trinh
		System.out.print(" > CHUONG TRINH QUAN LY NHAN SU CONG TY 'RONG VIET'\n\n");
		
		// Tao menu	
		taoMenu();
			
		// Moi chon chuong trinh va thuc hien		
		while(true) 
		{
			thoat=1;		
			System.out.print("\n - - - - - - - - - - - - - - - - - - - - - - - - -");
			System.out.print("\n  -> Moi ban chon chuong trinh: ");
			// Dung try-catch de bat loi khong mong muon
			try
			{
				s=new Scanner(System.in); // Tao moi bien s tranh loi vong lap vo han
				chon=s.nextInt();
				switch(chon) 
				{
					case 0:
						System.out.print("  --> Ban co thuc su muon thoat chuong trinh khong [1.Khong/2.Co]_nhap so: ");
						thoat=s.nextInt();	
					    if(thoat == 2) {
							System.out.print("\n  THANKS FOR USING MY PROGRAM _ @CREATED BY TRAN CAO MINH");
							System.exit(0);
						}
					    break;
					case 1:				
						nhapThongTin();
						break;
					case 2:
						hienThiThongTin();
						break;
					case 3:
						timTheoMaNhap();
						break;	
					case 4:
						xoaTheoMaNhap();
						break;
					case 5:
						capNhatThongTinTheoMaNhap();
						break;
					case 6:
						timTheoKhoangLuong();
						break;
					case 7:
						sapXepTheoHoTen();
						break;
					case 8:
						sapXepTheoThuNhap();
						break;
					case 9:
						xuatThuNhapCaoNhat();
						break;
					case 10:
						taoMenu(); // Tao menu chuong trinh	
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
	// Ket thuc chuong trinh chinh
	
	// Chuong trinh con tao menu
	static void taoMenu() 
	{
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
			       + " |   (5).Cap nhat thong tin nhan vien theo ma nhap       (10).Hien thi menu                            |\n"
			       + " |                                                                                                     |\n"
			       + " |                                   (0).Ket thuc chuong trinh                                         |\n"
			       + " +-----------------------------------------------------------------------------------------------------+\n");
	}
	// 10
	
	// Chuong trinh con nhap danh sach nhan vien
	static void nhapThongTin()
	{
		System.out.print(" > Ban da chon chuong trinh (1) NHAP DANH SACH NHAN VIEN\n\n");
		System.out.print("  + Moi ban nhap thong tin nhan vien: \n\n");
		while(true)
		{
			System.out.print("  + Ma nhan vien: ");
			s = new Scanner(System.in); // Them lenh truoc khi nhap chu
			maNV=s.nextLine();
			System.out.print("  + Ho ten nhan vien: ");
			hoTen=s.nextLine();
			System.out.print("  + Luong nhan vien (Trieu): ");
			luong=s.nextDouble();
			// Dam bao luong >=0
			while(luong <= 0) 
			{
				System.out.print("  + Vui long nhap luong lon hon 0: ");
				luong=s.nextDouble();
			}	
			nv=new NhanVien(maNV, hoTen, luong);
			dsNV.add(nv);
			System.out.print("  -> Ban co muon nhap tiep khong [1.Khong/2.Co]_nhap so: ");
			thoat=s.nextInt();	
		    if(thoat == 1) {
				break;
			}
		}
	}
	// 1
	
	// Chuong trinh con hien thi danh sach nhan vien
	static void hienThiThongTin()
	{
		System.out.print(" > Ban da chon chuong trinh (2) HIEN THI DANH SACH NHAN VIEN\n\n");
		System.out.print("  + Danh sach thong tin nhan vien: \n");
		for(i=0;i<dsNV.size();i++)
		{
			dsNV.get(i).xuatThongTin(); // Dung chuong trinh nhan vien- ham xuat thong tin xuat	
		}
	}
	// 2
	
	// Chuong trinh con tim nhan vien theo ma nhap
	static void timTheoMaNhap()
	{
		System.out.print(" > Ban da chon chuong trinh (3) TIM NHAN VIEN THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon tim: ");
		s = new Scanner(System.in);
		maNV=s.nextLine();
		for(i=0;i<dsNV.size();i++)
		{
			if(dsNV.get(i).maNV.equals(maNV))
			{
				dsNV.get(i).xuatThongTin();
				break;
			}
		}
	}
	// 3
	
	// Chuong trinh con xoa nhan vien theo ma nhap
	static void xoaTheoMaNhap()
	{
		System.out.print(" > Ban da chon chuong trinh (4) XOA NHAN VIEN THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon xoa: ");
		s = new Scanner(System.in);
		maNV=s.nextLine();
		for(i=0;i<dsNV.size();i++)
		{
			if(dsNV.get(i).maNV.equals(maNV))
			{
				dsNV.remove(i);		
				break;
			}
		}
	}
	// 4
	
	// Chuong trinh con cap nhat thong tin nhan vien theo ma nhap
	static void capNhatThongTinTheoMaNhap()
	{
		System.out.print(" > Ban da chon chuong trinh (5) CAP NHAT THONG TIN NHAN VIEN THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon cap nhat thong tin: ");
		s = new Scanner(System.in);
		maNV=s.nextLine();
		for(i=0;i<dsNV.size();i++)
		{
			if(dsNV.get(i).maNV.equals(maNV))
			{
				System.out.print("  + Cap nhat ho ten nhan vien: ");
				hoTen=s.nextLine();
				System.out.print("  + Cap nhat luong nhan vien: ");
				luong=s.nextDouble();
				s.nextLine();
				nv=new NhanVien(maNV, hoTen, luong);
				dsNV.set(i, nv);
				break;
			}
		}
	}
	// 5
	
	// Chuong trinh con tim nhan vien theo khoang luong
	static void timTheoKhoangLuong()
	{
		System.out.print(" > Ban da chon chuong trinh (6) TIM NHAN VIEN THEO KHOANG LUONG\n\n");
		System.out.print("  + Moi ban nhap MIN cua khoang luong: ");
		luongMin=s.nextDouble();
		System.out.print("  + Moi ban nhap MAX cua khoang luong: ");
		luongMax=s.nextDouble();
		s.nextLine();
		for(i=0;i<dsNV.size();i++)
		{
			if(dsNV.get(i).luong >= luongMin  &&  dsNV.get(i).luong <= luongMax)
			{
				dsNV.get(i).xuatThongTin();
			}
		}
	}
	// 6
	
	// Chuong trinh con sap xep nhan vien theo ho ten
	static void sapXepTheoHoTen()
	{
		System.out.print(" > Ban da chon chuong trinh (7) SAP XEP NHAN VIEN THEO HO TEN\n\n");
		Comparator<NhanVien> c=new Comparator<NhanVien>()
		{

			@Override
			public int compare(NhanVien o1, NhanVien o2) {
				// TODO Auto-generated method stub
				return o1.hoTen.compareTo(o2.hoTen);
			}
	
		};
		Collections.sort(dsNV, c);
	}
	// 7
	
	// Chuong trinh con sap xep nhan vien theo thu nhap
	static void sapXepTheoThuNhap()
	{
		System.out.print(" > Ban da chon chuong trinh (8) SAP XEP NHAN VIEN THEO THU NHAP\n\n");		
		Comparator<NhanVien> c=new Comparator<NhanVien>()
		{

			@Override
			public int compare(NhanVien o1, NhanVien o2) {
				// TODO Auto-generated method stub
				return (int)(o1.thuNhap()-o2.thuNhap());
			}
	
		};
		Collections.sort(dsNV, c);
		System.out.print("  -> Ban muon sap xep theo kieu nao [1.Giam dan/MacDinh.Tang dan]_nhap so: ");
		chon=s.nextInt();	
		s.nextLine();
	    if(chon == 1) {
	    	Collections.reverse(dsNV);
		}
	}
	// 8
	
	// Chuong trinh con sap xep nhan vien theo thu nhap
	static void xuatThuNhapCaoNhat()
	{
		System.out.print(" > Ban da chon chuong trinh (9) XUAT 5 NHAN VIEN CO THU NHAP CAO NHAT\n\n");		
		Comparator<NhanVien> c=new Comparator<NhanVien>()
		{

			@Override
			public int compare(NhanVien o1, NhanVien o2) {
				// TODO Auto-generated method stub
				return (int)(o1.thuNhap()-o2.thuNhap());
			}
	
		};
		Collections.sort(dsNV, c);
	    Collections.reverse(dsNV);
	    for(i=0;i<5;i++)
		{
			dsNV.get(i).xuatThongTin(); // Dung chuong trinh nhan vien- ham xuat thong tin xuat	
		}
	}
	// 9
	
}


























