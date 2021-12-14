package ps18817_TranCaoMinh_Lab3;

import java.util.Scanner;

public class bai1 {

	public static void main(String[] args) 
	{	
		// Gioi thieu chuong trinh
		System.out.print(" > KIEM TRA SO NGUYEN\n\n");
		
		// Moi nhap so nguyen
		Scanner s=new Scanner(System.in);
		System.out.print("  + Xin moi ban nhap mot so nguyen: ");
		int soNguyen=s.nextInt();
		
		// Kiem tra so vua nhap co phai la so nguyen to hay khong
		boolean xacDinhSoNguyen = true;
		for(int i=2;i<soNguyen-1;i++) //Vong lap for nhu c
		{
			if(soNguyen % i == 0)
			{
				xacDinhSoNguyen=false;
				break;
			}
		}
		
		// Xuat ra ket qua
		if(xacDinhSoNguyen==true)
		{
			System.out.printf("  -> (%d) la so nguyen to \n",soNguyen);
		}
		else
		{
			System.out.printf("  -> (%d) khong phai la so nguyen to \n",soNguyen);
		}
		s.close();
	
	}

}
