package ps18817_TranCaoMinh_Lab8;

public class XPoly {
	
	// Khai bao bien
	static int i;
	
	// Phuong thuc tinh tong cua Tham so bien doi kieu double
	public static double sum (double ...x)
	{
		double tong=0;
		for(i=0; i<x.length; i++)
		{
			tong+=x[i]; //. xu dung bien varargs da truyen vao
		}
		return tong;
	}
	
	// Phuong thuc tim phan tu nho nhat cua Tham so bien doi
	public static double min (double ...x)
	{
		double min=x[0];
		for(i=0; i<x.length; i++)
		{
			if(x[i]<min)
			{
				min=x[i];
			}
		}
		return min;
	}

	// Phuong thuc tim phan tu lon nhat cua Tham so bien doi
	public static double max (double ...x)
	{
		double max=x[0];
		for(int i=0; i<x.length; i++)
		{
			if(x[i]>max)
			{
				max=x[i];
			}
		}
		return max;
	}
	
	// Phuong thuc chuyen doi cac ky tu dau sang hoa
	public String toUpperFirstChar (String chuoi) //. dang fix loi khong tra ve 
	{
		char firstChar;
		String chuoiDaQuaXuLy="";
		String[] words= chuoi.split(" ");
		for(int i=0; i<words.length; i++)
		{
			firstChar= words[i].charAt(0);
			// In hoa first char
			firstChar= String.valueOf(firstChar).toUpperCase().charAt(0);
			words[i]= firstChar + words[i].substring(1);
			chuoiDaQuaXuLy= String.join(words[i]," "); 
		}
		return chuoiDaQuaXuLy;
	}
}












