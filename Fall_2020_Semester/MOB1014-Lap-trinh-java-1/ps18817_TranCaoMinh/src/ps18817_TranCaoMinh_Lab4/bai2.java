package ps18817_TranCaoMinh_Lab4;

import java.util.Scanner;

public class bai2 {

	public static void main(String[] args) 
	{
		// Gioi thieu chuong trinh
		System.out.print(" > NHAP XUAT THONG TIN SAN PHAM 2\n\n");
		
		// Moi nhap thong tin san pham 1 va 2
		Scanner s=new Scanner(System.in); 
		String tenSp;
		double donGia,giamGia;
		SanPham sp1=new SanPham(); //. tao bien dua tren class SanPham nhu Scanner
		SanPham sp2=new SanPham();
		// sp1
		System.out.print("  + Moi ban nhap ten san pham (1): ");
		tenSp=s.nextLine();	
		System.out.print("  + Moi ban nhap don gia san pham (1): ");
		donGia=s.nextDouble();
		System.out.print("  + Moi ban nhap giam gia san pham (1): ");
		giamGia=s.nextDouble();
		s.nextLine(); // Tranh loi (Nhap so xong khong nhap chu duoc
		sp1.nhap(tenSp, donGia, giamGia); //. truyen du lieu vao phuong thuc nhap cua class SanPham gian tiep 
		// sp2
		System.out.print("  + Moi ban nhap ten san pham (2): ");
		tenSp=s.nextLine();	
		System.out.print("  + Moi ban nhap don gia san pham (2): ");
		donGia=s.nextDouble();
		System.out.print("  + Moi ban nhap giam gia san pham (2): ");
		giamGia=s.nextDouble();
		sp2.nhap(tenSp, donGia, giamGia);
		
		// Xuat thong tin san pham 
		sp1.xuat(); //. su dung phuong thuc xuat cua class SanPham gian tiep qua bien sp1
		sp2.xuat();			
	}

}
