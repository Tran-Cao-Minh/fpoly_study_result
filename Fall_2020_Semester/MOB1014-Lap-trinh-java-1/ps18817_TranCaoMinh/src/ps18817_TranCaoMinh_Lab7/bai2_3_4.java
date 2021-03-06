package ps18817_TranCaoMinh_Lab7;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.Scanner;

import ps18817_TranCaoMinh_Assignment.NhanVien;

public class bai2_3_4 {
	
	// Khai bao bien toan cuc
	static int thoat,chon,i; //. bien static chiem bo nho. Tranh dung
	static ArrayList<SinhVienPoly> dsSinhVien=new ArrayList<SinhVienPoly>(); //. danh sach mang kieu SinhVienPoly
	static Scanner s=new Scanner(System.in);
	
	// Chuong trinh chinh
	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > QUAN LY SINH VIEN FPOLY\n\n");
		
		// Khai bao bien
		Scanner s=new Scanner(System.in);	
		
		// Thu nghiem
		SinhVienPoly s1,s2,s3;  //. nen tao cac danh sach gia cho test nhanh
		s1=new SinhVienBiz("1",7,7); //. goi bien sau do la ham tao cua class la xong
		dsSinhVien.add(s1);     //. nho add vao mang danh sach nhen
		s2=new SinhVienBiz("2",9,9);
		dsSinhVien.add(s2);
		s3=new SinhVienBiz("3",8,8);
		dsSinhVien.add(s3);
		// Thu nghiem
		
		// Tao menu
		System.out.print("       ...>~DANH SACH CHUONG TRINH~<...          \n" //. tao menu cho dep ty
			       + " +--------------------------------------------------+\n"
			       + " |   (1).Nhap danh sach sinh vien                   |\n"
			       + " |                                                  |\n"
			       + " |   (2).Xuat thong tin danh sach sinh vien         |\n"
			       + " |                                                  |\n"
			       + " |   (3).Xuat danh sach sinh vien co hoc luc Gioi   |\n"
			       + " |                                                  |\n"
			       + " |   (4).Sap xep danh sach sinh vien theo diem      |\n"
			       + " |                                                  |\n"
			       + " |   (5).Ket thuc                                   |\n"
			       + " +--------------------------------------------------+\n");
		
		// Moi chon chuong trinh va thuc hien		
		while(true) 
		{
			thoat=1; //. nen tao bien ngay luc can nhap se logic hon		
			System.out.print("\n - - - - - - - - - - - - - - - - - - - - - - - - -");
			System.out.print("\n  -> Moi ban chon chuong trinh: ");
			// Dung try-catch de bat loi khong mong muon
			try
			{
				s=new Scanner(System.in); // Tao moi bien s tranh loi vong lap vo han
				chon=s.nextInt();
				switch(chon) 
				{
					case 1:				
						nhapThongTin();
						break;
					case 2:
						hienThiThongTin();
						break;
					case 3:
						xuatThongTinSinhVienGioi();
						break;	
					case 4:
						sapXepTheoDiem();
						break;
					case 5:
						System.out.print("  --> Ban co thuc su muon thoat chuong trinh khong [1.Khong/2.Co]_nhap so: ");
						thoat=s.nextInt();	
					    if(thoat == 2) {
							System.out.print("\n  THANKS FOR USING MY PROGRAM _ @CREATED BY TRAN CAO MINH");
							System.exit(0);
						}
					    break;
					default:
						System.out.print("  ** Ban vui long chi nhap so trong pham vi [1 --> 5]\n");
						break;
				}			
			}
			catch(Exception e) //. chi biet catch kieu nay :D
			{
				System.out.print("  ** Ban vui long khong nhap chu\n");
				continue;
			}		
		}		
	}
	
	// Chuong trinh con nhap danh sach sinh vien
	static void nhapThongTin()
	{
		// Khai bao bien
		String hoTen,nganh; //. nen tao bien ngay luc nhap
		double diemJava,diemCss,diemHtml,diemMarketing,diemSales;
		// Xu ly
		System.out.print(" > Ban da chon chuong trinh (1) NHAP DANH SACH SINH VIEN\n\n");
		System.out.print("  + Moi ban nhap thong tin sinh vien: \n\n");
		while(true)
		{
			System.out.print("  + Ho ten: ");
			Scanner s=new Scanner(System.in); // Them lenh truoc khi nhap chu
			hoTen=s.nextLine();
			//Nhap nganh
			nganh="chuaNhap";
			while(nganh.equalsIgnoreCase("it")==false || nganh.equalsIgnoreCase("biz")==false)
			{
				System.out.print("  + Nganh [ IT/Biz ]: ");
				nganh=s.nextLine();
				if(nganh.equalsIgnoreCase("it")==true)
				{
					System.out.print("  + Diem Java: ");
					diemJava=s.nextDouble();
					System.out.print("  + Diem CSS: ");
					diemCss=s.nextDouble();
					System.out.print("  + Diem HTML: ");
					diemHtml=s.nextDouble();
					SinhVienPoly sv=new SinhVienIT(hoTen,diemJava,diemCss,diemHtml);
					dsSinhVien.add(sv);
					break;
				}
				else if(nganh.equalsIgnoreCase("biz")==true)
				{
					System.out.print("  + Diem Marketing: ");
					diemMarketing=s.nextDouble();
					System.out.print("  + Diem Sales: ");
					diemSales=s.nextDouble();
					SinhVienPoly sv=new SinhVienBiz(hoTen,diemMarketing,diemSales);
					dsSinhVien.add(sv);
					break;
				}
				else
				{
					System.out.print(" ** Ban da nhap sai nganh\n");
				}
			}
			System.out.print("  -> Ban co muon nhap tiep khong [1.Khong/2.Co]_nhap so: ");
			thoat=s.nextInt();	
		    if(thoat == 1) {
				break;
			}		
		}
	}
	//1
	
	// Chuong trinh con hien thi danh sach nhan vien
	static void hienThiThongTin()
	{
		System.out.print(" > Ban da chon chuong trinh (2) XUAT THONG TIN DANH SACH SINH VIEN\n\n");
		System.out.print("  + Danh sach thong tin sinh vien: \n");
		for(i=0;i<dsSinhVien.size();i++)
		{
			dsSinhVien.get(i).xuatThongTin(); // Dung class SinhVienPoly- ham xuat thong tin 	
		}
	}
	// 2

	// Chuong tirnh con xuat thong tin sinh vien gioi
	static void xuatThongTinSinhVienGioi()
	{
		System.out.print(" > Ban da chon chuong trinh (3) XUAT DANH SACH SINH VIEN CO HOC LUC GIOI\n\n");
		System.out.print("  + Danh sach sinh vien co hoc luc gioi: ");
		for(i=0;i<dsSinhVien.size();i++)
		{
			if(dsSinhVien.get(i).hocLuc().equals("Gioi")==true) //. trong lop truu tuong nen get.phuongThuc()
			{
				dsSinhVien.get(i).xuatThongTin();
			}
		}
	}
	// 3
	
	// Chuong trinh con sap xep sinh vien theo diem
	static void sapXepTheoDiem()
	{
		System.out.print(" > Ban da chon chuong trinh (4) SAP XEP SINH VIEN THEO DIEM\n\n");		
		Comparator<SinhVienPoly> c=new Comparator<SinhVienPoly>()
		{

			@Override
			public int compare(SinhVienPoly o1, SinhVienPoly o2) {
				// TODO Auto-generated method stub
				return (int)(o1.diemTB()-o2.diemTB()); //. lop truu tuong nen sap theo phuong thuc
			}
	
		};
		Collections.sort(dsSinhVien, c);
		System.out.print("  -> Ban muon sap xep theo kieu nao [1.Giam dan/MacDinh.Tang dan]_nhap so: ");
		chon=s.nextInt();	
		s.nextLine();
	    if(chon == 1) {
	    	Collections.reverse(dsSinhVien);
		}
	}
	// 4
}











