use ps18817_qlbds_lab3;
-- nhap lieu vao table van phong va chusohuu vi 2 bang nay khong co khoa ngoai
insert into vanphong values 
	('vp1','Ha Noi'),
	('vp2','TP Ho Chi Minh'),
	('vp3','Da Nang'),
	('vp4','Hai Phong'),
	('vp5','Can Tho');
select * from vanphong;
insert into chusohuu values 
	('csh1','Tran Cao','Minh','Dong Nai','0332340012'),
	('csh2','Than Hoang','Loc','TP Ho Chi Minh','0936547899'),
	('csh3','Chau Kim','Phuong','Da Nang','033785442'),
	('csh4','Doan Cong','Khanh','Ba Ria - Vung Tau','0937236125'),
	('csh5','Ha Van','Cu','Nghe An','0164568778');
select * from chusohuu;
-- nhap lieu vao cac table chi co khoa ngoai thuoc 2 bang vanphong va chusohuu
insert into batdongsan values
	('bds1','Thai Binh','vp1','csh5'),
    ('bds2','Son La','vp3','csh2'),
    ('bds3','Hoa Binh','vp4','csh1'),
    ('bds4','Yen Bai','vp2','csh3'),
    ('bds5','Buon Me Thuot','vp5','csh4'),
    ('bds6','Thanh Hoa','vp4','csh3'),
    ('bds7','Hue','vp2','csh5');
select * from batdongsan;
insert into nhanvien values
	(1,'Le Vinh','Ky','vp1'),
    (2,'Hoang Phuoc','Nguyen','vp2'),
    (3,'Nguyen Phi','Hung','vp3'),
    (4,'Tran Minh','Tri','vp4'),
    (5,'Nguyen Hung','Huy','vp5');
select * from nhanvien;
-- Nhap du lieu vao cac table co chua khoa ngoai thuoc bang nhanvien va vanphong
insert into truongphong values
	(1,'vp1'),
    (2,'vp2'),
    (3,'vp3'),
    (4,'vp4'),
    (5,'vp5');
select * from truongphong;
insert into thannhan values
	('tn1','Le Vinh','Long','19870512','Cha',1),
    ('tn2','Pham Dang','Hoa','19851215','Me',2),
    ('tn3','Nguyen Phu','Nhan','19890429','Chu',3),
    ('tn4','Le Thi','Tuyet','19540213','Ba Ngoai',4),
    ('tn5','Nguyen Long','Phu','19880818','Cha Nuoi',5);
select * from thannhan;