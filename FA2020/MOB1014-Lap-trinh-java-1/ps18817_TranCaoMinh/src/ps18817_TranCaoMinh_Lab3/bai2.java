package ps18817_TranCaoMinh_Lab3;

public class bai2 {

	public static void main(String[] args) 
	{

		// Gioi thieu chuong trinh
		System.out.print(" > XUAT RA BANG CUU CHUONG\n\n");
		
		// Xu ly va xuat ra bang cuu chuong
		int i,j;
		for(i=1;i<=9;i++) // hai vong lap for long nhau
		{
			for(j=1;j<=10;j++)
			{
				System.out.printf("%d x %d =%d\t",i,j,i*j);
			}
			System.out.print("\n");
		}

	}

}
