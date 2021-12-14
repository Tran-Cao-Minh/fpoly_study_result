package ps18817_TranCaoMinh_Lab3;

import java.util.Arrays;
import java.util.Scanner;

public class bai3 {

	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > KIEM TRA SO NGUYEN TRONG MANG\n\n");
		
		// Moi nhap so luong so nguyen muon nhap
		Scanner s=new Scanner(System.in); 
		System.out.print("  + Moi ban nhap so luong so nguyen: ");
		int soLuongSoNguyen=s.nextInt();
		
		// Moi nhap mang so nguyen tu ban phim
		System.out.print("  -> Moi ban nhap cac so nguyen cua mang:\n");
		int i;
		int mangSoNguyen[]=new int[soLuongSoNguyen]; // .khai bao mang cua java kieu tenBien[]=new kieu[soLuong]
		for(i=0;i<mangSoNguyen.length;i++) // .do dai mang trong java nen dung ham length
		{
			System.out.printf("   - So thu (%d): ",i+1); // bat dau cua mang la i 0 nen phai cong 1
			mangSoNguyen[i]=s.nextInt();
		}
		
		// Sap xep lai mang va xuat ra man hinh
		Arrays.sort(mangSoNguyen); // .dung lop arrays. phuong thuc sort. Nho import thu vien vao
		System.out.print("  -> Mang sau khi duoc sap xep lai la:\n");
		System.out.print("      ");
		for(i=0;i<mangSoNguyen.length;i++)
		{
			System.out.printf("(%d)>",mangSoNguyen[i]);
		}
		System.out.println(""); //. ln la line la xuong dong
		
		// Loc gia tri nho nhat
		int min;
		min=mangSoNguyen[0];
		for(i=1;i<mangSoNguyen.length;i++) //. tim min bang cach dung vong lap co dieu kien
		{
			if(mangSoNguyen[i]<min)
			{
				min=mangSoNguyen[i];
			}
		}
		
		// Tinh toan TB cong cua cac so chia het cho 3 trong mang
		float trungBinhCong=0,demSoChiaHetCho3=0,tong=0;
		for(i=0;i<mangSoNguyen.length;i++)
		{
			if(mangSoNguyen[i] % 3 == 0)
			{
				demSoChiaHetCho3++;
				tong+=mangSoNguyen[i];
			}
		}
		if(demSoChiaHetCho3>0)
		{
			trungBinhCong=tong/demSoChiaHetCho3;
		}
			
		// Xuat ra ket qua
		System.out.printf("  -> Phan tu co gia tri nho nhat cua mang la: %d\n",min);
		System.out.printf("  -> TB cong cac so chia het cho 3 cua mang la: %.2f\n",trungBinhCong);
		s.close();
		
	}

}
