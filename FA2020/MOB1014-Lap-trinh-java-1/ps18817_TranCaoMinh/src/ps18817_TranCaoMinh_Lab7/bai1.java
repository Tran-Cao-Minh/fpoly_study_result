package ps18817_TranCaoMinh_Lab7;

import java.util.Scanner;

public class bai1 {

	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > KE THUA HINH CHU NHAT LA HINH VUONG\n\n");
		
		// Khai bao bien
		Scanner s=new Scanner(System.in);
		int dai,rong,canh;
		ChuNhat chuNhat,vuong; //. co the dung class da dinh nghia nhu kieu
		
		// Moi nhap	 
		System.out.print("  + Moi ban nhap chieu dai: ");
		dai=s.nextInt();
		System.out.print("  + Moi ban nhap chieu rong: ");
		rong=s.nextInt();
		System.out.print("  + Moi ban nhap chieu canh: ");
		canh=s.nextInt();
		
		// Xuat thong tin
		//
		chuNhat=new ChuNhat(dai,rong); //. su dung them =new va them ham tao phia sau
		chuNhat.xuatThongTin();
		//
		vuong=new Vuong(canh);
		vuong.xuatThongTin();
		
	}

}
