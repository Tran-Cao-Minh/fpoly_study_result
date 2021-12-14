package ps18817_TranCaoMinh_Lab3;

import java.util.Scanner;

public class bai4 {

	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > SAP XEP THONG TIN SINH VIEN\n\n");
		
		// Moi nhap so luong sinh vien muon dien thong tin
		Scanner s=new Scanner(System.in); 
		System.out.print("  + Moi ban nhap so luong sinh vien muon nhap thong tin: ");
		int soLuongSinhVien=s.nextInt();
		s.nextLine(); // them sau khi nhap so de tranh loi nhung co cach khac hay hon la dung s=new... xem o phan sau
		
		// Moi nhap thong tin sinh vien tu ban phim
		System.out.print("  -> Moi ban nhap thong tin cua tung sinh vien:\n");
		int i;
		String hoTenSinhVien[]=new String[soLuongSinhVien]; // cach khai bao mang cua java
		String hocLucSinhVien[]=new String[soLuongSinhVien];
		float diemSinhVien[]=new float[soLuongSinhVien];
		for(i=0;i<soLuongSinhVien;i++)
		{
			System.out.printf("   - Ho va ten sinh vien thu (%d): ",i+1);
			hoTenSinhVien[i]=s.nextLine();
			System.out.printf("   - Diem cua sinh vien thu (%d): ",i+1);
			diemSinhVien[i]=s.nextFloat();
			while(diemSinhVien[i] < 0 ||  diemSinhVien[i] > 10) 
			{
				System.out.print("  ** Vui long nhap lai diem sinh vien trong pham vi [1,10]: ");
				diemSinhVien[i]=s.nextFloat();				
			}
			s.nextLine();
			// Xu ly hoc luc cua sinh vien
			if(diemSinhVien[i] <= 10 &&  diemSinhVien[i] >= 9) 
			{
				hocLucSinhVien[i]="Xuat sac";
			}
			else if(diemSinhVien[i] < 9 &&  diemSinhVien[i] >= 7.5) 
			{
				hocLucSinhVien[i]="Gioi";
			}
			else if(diemSinhVien[i] < 7.5 &&  diemSinhVien[i] >= 6.5) 
			{
				hocLucSinhVien[i]="Kha";
			}
			else if(diemSinhVien[i] < 6.5 &&  diemSinhVien[i] >= 5) 
			{
				hocLucSinhVien[i]="Trung binh";
			}
			else
			{
				hocLucSinhVien[i]="Yeu";
			}			
		}
		
		// Sap xep thong tin sinh vien theo diem tang dan
		String chuoiTam;
		int j;
		float soTam;
		for(i=0;i<soLuongSinhVien-1;i++) // sap xep lai thu tu theo i j
		{
			for(j=1;j<soLuongSinhVien;j++)
			{
				if(diemSinhVien[i] > diemSinhVien[j])
				{
					// Hoan doi diem
					soTam=diemSinhVien[i];
					diemSinhVien[i]=diemSinhVien[j];
					diemSinhVien[j]=soTam;
					// Hoan doi ho ten
					chuoiTam=hoTenSinhVien[i];
					hoTenSinhVien[i]=hoTenSinhVien[j];
					hoTenSinhVien[j]=chuoiTam;
					// Hoan doi hoc luc
					chuoiTam=hocLucSinhVien[i];
					hocLucSinhVien[i]=hocLucSinhVien[j];
					hocLucSinhVien[j]=chuoiTam;					
				}
			}
		}
		
		// In ra ket qua sau khi sap xep
		System.out.print("  -> Thong tin cua sinh vien sau khi sap xep theo diem tang dan la:\n");
		for(i=0;i<soLuongSinhVien;i++)
		{
			System.out.printf("   %s  | %.2f | %s\n",hoTenSinhVien[i],diemSinhVien[i],hocLucSinhVien[i]);
		}

	}

}
