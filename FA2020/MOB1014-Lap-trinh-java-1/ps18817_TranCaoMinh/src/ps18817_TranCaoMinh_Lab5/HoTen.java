package ps18817_TranCaoMinh_Lab5;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class HoTen {
	// Khai bao bien
	int x,i;
	Scanner s=new Scanner(System.in);
	String hoTen;
	ArrayList<String> mangHoTen=new ArrayList<String>();
	
	// Ham tao
	HoTen()
	{
		
	}
	
	// Nhap ho ten tu ban phim
	void nhapHoTen()
	{
		System.out.print("  + Moi ban nhap ho va ten:\n");
		i=0;
		x=2;
		boolean tiepTuc=true;
		while(tiepTuc==true)
		{
			System.out.printf("  + Ho va ten (%d): ",i+1);
			hoTen= s.nextLine();
			mangHoTen.add(hoTen);
			i++;
			System.out.print("  * Ban co muon nhap tiep khong [1.Khong/2.Co]- nhap so: ");
			x= s.nextInt();
			if(x==1)
			{
				tiepTuc=false;
			}
			else
			{
				s.nextLine();
			}
		}	
	}
	
	// Xuat ho ten da nhap
	void xuatHoTen() 
	{
		for(i=0;i<mangHoTen.size();i++)
		{
			System.out.print(mangHoTen.get(i)+"\n");
		}
	}
	
	// Xuat danh sach ho ten bi dao ngau nhien
	void xuatDanhSachNgauNhien()
	{
		Collections.shuffle(mangHoTen); 
		for(i=0;i<mangHoTen.size();i++)
		{
			System.out.print(mangHoTen.get(i)+"\n");
		}
	}
	
	// Xuat danh sach ho ten da sap xep giam dan
	void xapXepGiamDanVaXuatDanhSach()
	{
		Collections.sort(mangHoTen);
		Collections.reverse(mangHoTen);
		for(i=0;i<mangHoTen.size();i++)
		{
			System.out.print(mangHoTen.get(i)+"\n");
		}
	}
	
	// Xoa ho ten theo lua chon
	void xoaHoTenNhapTuBanPhim()
	{
		s.nextLine();
		System.out.print("  + Moi ban nhap ho ten muon xoa: ");
		hoTen=s.nextLine();
		for(i=0;i<mangHoTen.size();i++)
		{
			if(mangHoTen.get(i).equals(hoTen)) //. so sanh chuoi bang phuong thuc equals hoac equalsIgnoreCase
			{
				mangHoTen.remove(i);
			}
		}
		
	}
}











