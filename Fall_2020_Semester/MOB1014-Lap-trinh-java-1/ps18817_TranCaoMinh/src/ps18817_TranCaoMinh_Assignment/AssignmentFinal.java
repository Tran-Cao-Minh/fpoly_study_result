package ps18817_TranCaoMinh_Assignment;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Scanner;

public class AssignmentFinal 
{
	static Scanner s; // Khai bao ben ngoai tranh loi
	static ArrayList<NhanVien> dsNV=new ArrayList<NhanVien>(); // Tao danh sach nhan vien
	static int viTriMaNV; // Thuoc tinh can xai chung
	// Chuong trinh chinh
	public static void main(String[] args) 
	{
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
		XuLyNhapLieu xuLyNhapLieu=new XuLyNhapLieu(); //. khoi tao bien ban dau nen can new
		while(true) 
		{		
			System.out.print("\n - - - - - - - - - - - - - - - - - - - - - - - - -");
			System.out.print("\n  -> Moi ban chon chuong trinh: ");
			// Dung try-catch de bat loi khong mong muon
			try
			{
				s=new Scanner(System.in); // Tao moi bien s tranh loi vong lap vo han
				int chon=s.nextInt();
				switch(chon) 
				{
					case 0:
						System.out.print("  --> Ban co thuc su muon thoat chuong trinh khong [Yes/No]: ");
						xuLyNhapLieu.xuLyYesNo();
						int thoat=xuLyNhapLieu.ketQuaYesNo();
					    if(thoat == 1) // 1 la Co
					    {
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
						capNhatThongTinChiTiet();
						break;
					case 11:
						hienThiThongTinChiTiet();
						break;
					case 12:
						taoMenu(); 	
						break;
					default:
						System.out.print("  ** Ban vui long chi nhap so trong pham vi [0 --> 10]\n");
						break;
				}			
			}
			catch(Exception e)
			{
				System.out.print("  ** Phat sinh loi (Nhap sai loai du lieu, sai ma,....)\n");
				continue;
			}		
		}	
	}
	// Ket thuc chuong trinh chinh
	
	// Chuong trinh con xu ly ma NV va chuyen doi thanh vi tri giup rut don code
	static void xacDinhMaNV()
	{
		viTriMaNV=-1;
		s=new Scanner(System.in);
		String maNV=s.nextLine();
		for(int i=0; i<dsNV.size(); i++)
		{
			if(dsNV.get(i).maNV.equals(maNV))
			{
				viTriMaNV=i;
				break;
			}
		}
		if(viTriMaNV == -1)
		{
			System.out.print("  ** Khong co ma NV trung khop voi ma ban da nhap");
		}
	}
	
	// Chuong trinh con nhap danh sach nhan vien
	static void nhapThongTin()
	{
		// Khai bao bien
		NhanVien nv=null;
		XuLyNhapLieu xuLyNhapLieu=new XuLyNhapLieu();
		// Xu ly
		System.out.print(" > Ban da chon chuong trinh (1) NHAP DANH SACH NHAN VIEN\n\n");
		System.out.print("  + Moi ban nhap thong tin nhan vien: \n\n");
		while(true)
		{
			System.out.print("  + Ma nhan vien: ");
			s=new Scanner(System.in); // Them lenh truoc khi nhap chu
			String maNV=s.nextLine();
			System.out.print("  + Ho ten nhan vien: ");
			String hoTen=s.nextLine();
			System.out.print("  + Luong nhan vien (VND): ");	
			xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
			double luong=xuLyNhapLieu.traVeSoDuongDouble();
			// Phan cap theo chuc vu
			System.out.print("  + Chuc vu [(1) Truong phong| (2) Tiep thi | (Con lai). Nhan vien](Nhap so): ");
			int loai=s.nextInt();
			if(loai == 1)
			{
				System.out.print("  + Luong trach nhiem: ");
				xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
				double luongTrachNhiem=xuLyNhapLieu.traVeSoDuongDouble();
				nv=new TruongPhong(maNV, hoTen, luong, luongTrachNhiem);
				dsNV.add(nv);
			}
			else if(loai == 2)
			{
				System.out.print("  + Doanh so ban hang: ");
				xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
				double doanhSo=xuLyNhapLieu.traVeSoDuongDouble();
				System.out.print("  + Hue hong: ");
				xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
				double hueHong=xuLyNhapLieu.traVeSoDuongDouble();
				nv=new TiepThi(maNV, hoTen, luong, doanhSo, hueHong);
				dsNV.add(nv);
			}
			else // loai 3 (Nhan Vien), neu nhap khac xem day la mac dinh
			{
				nv=new NhanVien(maNV, hoTen, luong);
				dsNV.add(nv);
			}
			// Nhap tiep hay khong
			System.out.print("  -> Ban co muon nhap tiep khong [Yes/No]: ");
			xuLyNhapLieu.xuLyYesNo();
			int thoat=xuLyNhapLieu.ketQuaYesNo();	
		    if(thoat == 2) // 2 la Khong
		    {
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
		for(int i=0;i<dsNV.size();i++)
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
		xacDinhMaNV();
		if(viTriMaNV != -1)
		{
			dsNV.get(viTriMaNV).xuatThongTin();
		}
	}
	// 3
	
	// Chuong trinh con xoa nhan vien theo ma nhap
	static void xoaTheoMaNhap()
	{
		System.out.print(" > Ban da chon chuong trinh (4) XOA NHAN VIEN THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon xoa: ");
		xacDinhMaNV();
		if(viTriMaNV != -1)
		{
			System.out.print("   -> Da xoa nhan vien co ma: "+(viTriMaNV+1));
			dsNV.remove(viTriMaNV);
		}
	}
	// 4
	
	// Chuong trinh con cap nhat thong tin nhan vien theo ma nhap
	static void capNhatThongTinTheoMaNhap()
	{
		// Khai bao bien
		NhanVien nv=null;
		XuLyNhapLieu xuLyNhapLieu=new XuLyNhapLieu();
		// Xu ly
		System.out.print(" > Ban da chon chuong trinh (5) CAP NHAT THONG TIN NHAN VIEN THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon cap nhat thong tin: ");
		xacDinhMaNV();
		if(viTriMaNV != -1)
		{
			System.out.print("  + Cap nhat ho ten nhan vien: ");
			String hoTen=s.nextLine();
			System.out.print("  + Cap nhat luong nhan vien (VND): ");
			xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
			double luong=xuLyNhapLieu.traVeSoDuongDouble();
			// Cap nhat thong tin theo chuc vu
			System.out.print("  + Chuc vu [(1) Truong phong| (2) Tiep thi | (Con lai). Nhan vien](Nhap so): ");
			int loai;
			loai=s.nextInt();
			if(loai == 1)
			{
				System.out.print("  + Luong trach nhiem: ");
				xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
				double luongTrachNhiem=xuLyNhapLieu.traVeSoDuongDouble();
				nv=new TruongPhong(dsNV.get(viTriMaNV).maNV, hoTen, luong, luongTrachNhiem);
				dsNV.set(viTriMaNV, nv);
			}
			else if(loai == 2)
			{
				System.out.print("  + Doanh so ban hang: ");
				xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
				double doanhSo=xuLyNhapLieu.traVeSoDuongDouble();
				System.out.print("  + Hue hong: ");
				xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
				double hueHong=xuLyNhapLieu.traVeSoDuongDouble();
				nv=new TiepThi(dsNV.get(viTriMaNV).maNV, hoTen, luong, doanhSo, hueHong);
				dsNV.set(viTriMaNV, nv);
			}
			else
			{
				nv=new NhanVien(dsNV.get(viTriMaNV).maNV, hoTen, luong);
				dsNV.set(viTriMaNV, nv);
			}
		}
	}
	// 5
	
	// Chuong trinh con tim nhan vien theo khoang luong
	static void timTheoKhoangLuong()
	{
		XuLyNhapLieu xuLyNhapLieu=new XuLyNhapLieu();
		System.out.print(" > Ban da chon chuong trinh (6) TIM NHAN VIEN THEO KHOANG LUONG\n\n");
		System.out.print("  + Moi ban nhap MIN cua khoang luong: ");
		xuLyNhapLieu.damBaoSoDuongKieuDouble(); // Dam bao so duong bang class XuLyNhapLieu
		double luongMin=xuLyNhapLieu.traVeSoDuongDouble();
		System.out.print("  + Moi ban nhap MAX cua khoang luong: ");
		double luongMax=s.nextDouble();
		while(luongMax <= luongMin)
		{
			System.out.print("  ** Vui long nhap max lon hon min: ");
			luongMax=s.nextDouble();
		}
		for(int i=0;i<dsNV.size();i++)
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
		int chon=s.nextInt();
	    if(chon == 1) {
	    	Collections.reverse(dsNV);
		}
	}
	// 8
	
	// Chuong trinh con xuat 5 nhan vien co thu nhap cao nhat
	static void xuatThuNhapCaoNhat()
	{
		System.out.print(" > Ban da chon chuong trinh (9) XUAT 5 NHAN VIEN CO THU NHAP CAO NHAT\n\n");		
		Comparator<NhanVien> c=new Comparator<NhanVien>()
		{

			@Override
			public int compare(NhanVien o1, NhanVien o2) {
				// TODO Auto-generated method stub
				return (int)(o2.thuNhap()-o1.thuNhap()); // Dao o1 va o2 de ket qua giam dan
			}
	
		};
		Collections.sort(dsNV, c);
	    for(int i=0;i<5;i++)
		{
			dsNV.get(i).xuatThongTin(); // Dung chuong trinh nhan vien- ham xuat thong tin xuat	
		}
	}
	// 9
	
	// Chuong trinh con cap nhat thong tin chi tiet theo ma nhap
	static void capNhatThongTinChiTiet()
	{
		// Khai bao bien
		NhanVien nv=null;
		XuLyNhapLieu xuLyNhapLieu=new XuLyNhapLieu();
		// Xu ly
		System.out.print(" > Ban da chon chuong trinh (10) CAP NHAT EMAIL,SDT THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon cap nhat thong tin chi tiet: ");
		xacDinhMaNV();
		if(viTriMaNV != -1)
		{
			xuLyNhapLieu.xuLyEmailVaSDT();
			String email=xuLyNhapLieu.ketQuaEmail();
			String SDT=xuLyNhapLieu.ketQuaSDT();
			if(dsNV.get(viTriMaNV).chucVu.equals("Nhan vien"))
			{
				nv=new NhanVien(email, SDT,
						dsNV.get(viTriMaNV).maNV, dsNV.get(viTriMaNV).hoTen, dsNV.get(viTriMaNV).luong);
			}
			else if(dsNV.get(viTriMaNV).chucVu.equals("Truong phong"))
			{
				nv=new TruongPhong(email, SDT,
						dsNV.get(viTriMaNV).maNV, dsNV.get(viTriMaNV).hoTen, dsNV.get(viTriMaNV).luong,
						dsNV.get(viTriMaNV).luongTrachNhiem);
			}
			else if(dsNV.get(viTriMaNV).chucVu.equals("Tiep thi"))
			{
				nv=new TiepThi(email, SDT,
						dsNV.get(viTriMaNV).maNV, dsNV.get(viTriMaNV).hoTen, dsNV.get(viTriMaNV).luong,
						dsNV.get(viTriMaNV).doanhSo,dsNV.get(viTriMaNV).hueHong);
			}
			dsNV.set(viTriMaNV, nv);
		}
	}
	// 10
	
	// Chuong trinh hien thi thong tin chi tiet theo ma nhap
	static void hienThiThongTinChiTiet()
	{
		System.out.print(" > Ban da chon chuong trinh (11) HIEN THI THONG TIN CHI TIET THEO MA NHAP\n\n");
		System.out.print("  + Moi ban nhap Ma nhan vien muon hien thi thong tin chi tiet: ");
		xacDinhMaNV();
		if(dsNV.get(viTriMaNV).daNhapThongTinChiTiet==true && viTriMaNV != -1)
		{
				dsNV.get(viTriMaNV).xuatThongTinChiTiet();
		}
		else if(dsNV.get(viTriMaNV).daNhapThongTinChiTiet==false && viTriMaNV != -1)
		{
			System.out.print("  ** Ma NV dung nhung 'chua' nhap thong tin chi tiet");
		}
	}
	// 11
	
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
			       + " |   (5).Cap nhat thong tin nhan vien theo ma nhap       (10).Cap nhat email,sdt theo ma nhap          |\n"
			       + " |                                                                                                     |\n"
			       + " |   (11).Hien thi thong tin chi tiet theo ma nhap       (12).Hien thi menu                            |\n"
			       + " |                                                                                                     |\n"
			       + " |                                   (0).Ket thuc chuong trinh                                [Nhap so]|\n"
			       + " +-----------------------------------------------------------------------------------------------------+\n");
	}
	// 12
}


























