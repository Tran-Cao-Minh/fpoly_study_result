package ps18817_TranCaoMinh_Lab1;

import java.util.Scanner;

public class bai1 {

	public static void main(String[] args) {
		
		Scanner s=new Scanner(System.in); //Tao bien doi tuong tren lop co san scanner de nhap. Nho "import" thu vien
		System.out.print(" > CHUONG TRINH NHAP HO TEN VA DIEM CUA SINH VIEN < \n\n"); // in ra 
		System.out.print("  + Xin moi ban nhap Ho va Ten cua sinh vien: "); 
		String hoTen=s.nextLine(); // dung line voi bien loai string
		System.out.print("  + Xin moi ban nhap Diem TB cua sinh vien: "); 
		float diem=s.nextFloat();  // float voi float
		System.out.printf("  -> Ho va ten: %s \n  -> Diem TB: %.2f\n",hoTen,diem); // printf nhu c
		s.close(); // Dung de dong bien s nhung thay bao khong can lam

    }

}
