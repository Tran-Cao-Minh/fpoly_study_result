package ps18817_TranCaoMinh_Lab8;

public class suDungXPoly {

	public static void main(String[] args) {
		
		// Khai bao bien su dung cho lab 8
		double[] mangSo= {1,2,3,4};
		String hoTen="tran cao minh";
		XPoly a=new XPoly();
		
		// Su dung class XPoly
		System.out.print("| tong" + a.sum(mangSo)
						+"| min" + a.min(mangSo)
						+"| max" + a.max(mangSo)
						+"| in hoa ho ten: " + a.toUpperFirstChar(hoTen));

	}

}
