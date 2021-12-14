package ps18817_TranCaoMinh_Lab5;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

public class SanPham {
	
	// Khai bao bien toan cuc
	Scanner s=new Scanner(System.in); 
	String tenSanPham; //. bien toan cuc la thuoc tinh
	double giaSanPham;
	
	// Ham tao
	SanPham()
	{
		
	}
	
	// Ham gan bien san pham de cho vao mang
	SanPham(String tenSanPham, double giaSanPham) //. phuong thuc
	{
		this.tenSanPham=tenSanPham;
		this.giaSanPham=giaSanPham;
	}
	
}
