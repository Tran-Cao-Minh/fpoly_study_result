package ps18817_TranCaoMinh_Lab5;

import java.util.ArrayList; //. package cua  ArrayList
import java.util.Scanner;

public class bai1 {

	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > NHAP SO THUC TUY Y VA TINH TONG\n\n");
		
		// Moi nhap so luong so thuc tuy y
		ArrayList<Double> soThuc=new ArrayList<Double>(); //. khai bao viec lap danh sach theo class double
		Scanner s=new Scanner(System.in); 
		int i=0;
		boolean tiepTuc=true; //. dung cai nay de dung viec nhap danh sach
		while(tiepTuc==true) //. co the xai true sau do dung break
		{
			System.out.printf("  + Moi ban nhap so thuc thu (%d): ",i+1);
			double x= s.nextDouble();
			soThuc.add(x);
			i++;
			System.out.print("  * Ban co muon nhap tiep khong [1.Khong/2.Co]- nhap so: ");
			x= s.nextDouble();
			if(x==1)
			{
				tiepTuc=false;
			}
		}
		
		// Tinh tong cac so thuc va xuat ket qua
		double tong=0;
		for(i=0;i<soThuc.size();i++) //. khac voi mang, mang danh sach dung phuong thuc. size()
		{
			System.out.print(soThuc.get(i)+" ");
			tong+=soThuc.get(i); //. phuong thuc. get() de truy xuat phan tu cua mang danh sach
		}		
		System.out.print("\n  --> Tong cua cac so thuc la: "+tong);
	}

}
