use PS18817_TranCaoMinh_ASM_COM2013;

-- Nhap lieu vao cac bang khong co khoa ngoai
insert into loaisach values
('loai1','Van hoc'),
('loai2','Thieu nhi'),
('loai3','Kinh te'),
('loai4','Ky nang song'),
('loai5','Giao duc');
-- chen du lieu vao bang loai sach lan 2
insert into loaisach values
('loai6','Tho ca'),
('loai7','Nguoi lon'),
('loai8','Xa hoi'),
('loai9','Ky nang hoc tap'),
('loai0','Chinh tri');
-- cap nhat them loai sach co ma IT
insert into loaisach values
('IT','Lap trinh');
select * from loaisach;

insert into lop values
('lop01','WD16306'),
('lop02','UD16307'),
('lop03','LT16308'),
('lop04','DH16309');
-- chen du lieu vao bang lop lan 2
insert into lop values
('WD','Thiet Ke Web'),
('UD','Ung Dung Phan Mem'),
('LT','Lap Trinh Di Dong'),
('UC','Lap Trinh Dotnet'),
('PT','Thiet Ke Hinh Anh'),
('DH','Thiet Ke Do Hoa');
select * from lop;

-- Nhap lieu vao cac bang co khoa ngoai cua cac bang da nhap
insert into sach values
('s01','Mat biec','NXB Tre','Nguyen Nhat Anh','300','2',88000,'20130519','Ke 01','loai1'),
('s02','Dao mong mo','NXB Tre','Nguyen Nhat Anh','254','1',39000,'20120929','Ke 02','loai1'),
('s03','De men phieu luu ky','NXB Kim Dong','To Hoai','48','3',54000,'20151210','Ke 01','loai2'),
('s04','Phu thuy xu OZ','NXB Lao Dong','Frank Baum','386','1',95200,'20111016','Ke 04','loai2'),
('s05','Tai chinh doanh nghiep','NXB Kinh Te','Westerfield Jafee','1095','0',659000,'20140125','Ke 02','loai3'),
('s06','Khoi nghiep tinh gon','NXB Tong Hop','Eric Ries','335','0',116000,'20120814','Ke 03','loai3'),
('s07','Dac nhan tam','NXB Tong Hop','Dale Carnegie','320','1',59280,'20111201','Ke 03','loai4'),
('s08','Tuoi tre dang gia bao nhieu','NXB Hoi Nha Van','Rosie Nguyen','292','2',66400,'20130214','Ke 01','loai4'),
('s09','Giao duc gioi tinh','NXB Phu Nu','Moon Ju-Yeong','34','1',35000,'20110617','Ke 04','loai5'),
('s10','Vo cung tan nhan, vo cung yeu thuong','NXB Dan Tri','Sara Imas','420','0',131280,'20150221','Ke 04','loai5');
-- them sach co ma IT
insert into sach values
('s11','Lap trinh ngau het say','NXB The Gioi','Rob Hansen',113,4,74800,'20130415','Ke 03','IT'),
('s12','Code dao ki su','NXB Dan Tri','Pham Huy Hoang',297,5,127200,'20150617','Ke 05','IT'),
('s13','Lap trinh voi C#','NXB Thanh Nien','Pham Quang Huy',382,2,105000,'20170121','Ke 02','IT');
-- Them vao sach co tieu de chua tu khoa SQL
insert into sach values
('s14','SQL can ban','NXB Cao Minh','Tran Cao Minh',115,2,75000,'20170416','Ke 04','IT'),
('s15','SQL nang cao','NXB Thong Minh','Dang Huy Hoang',297,3,125000,'20190517','Ke 06','IT'),
('s16','Nghien cuu SQL','NXB Cao Minh','Tran The Nam',300,1,108000,'20180128','Ke 01','IT');
select * from sach;
drop table sach;

insert into thesinhvien values
('sv01','Tran Cao Minh','20221225','Thiet ke trang web','minhtc@gmail.com','0332340012','lop01'),
('sv02','Nguyen Si Vuong','20220625','Thiet ke trang web','vuongns@gmail.com','0938554624','lop01'),
('sv03','Truong Vinh Nghi','20220712','Thiet ke trang web','nghivt@gmail.com','0162895447','lop01'),
('sv04','Ho Thanh Dat','20220427','Ung dung phan mem','datht@gmail.com','033564235','lop02'),
('sv05','Nguyen Thanh Trung','20220902','Ung dung phan mem','trungnt@gmail.com','0956457855','lop02'),
('sv06','Nguyen Phuong Tin','20221014','Ung dung phan mem','tinnp@gmail.com','0937232139','lop02'),
('sv07','Nguyen Huu Tu','20221209','Lap trinh may tinh','tunh@gmail.com','035658985','lop03'),
('sv08','Nguyen Quang Vu','20220122','Lap trinh may tinh','vunq@gmail.com','0165248597','lop03'),
('sv09','Trinh Dinh Dat','20220817','Lap trinh may tinh','dattd@gmail.com','0935269987','lop03'),
('sv10','Le Thanh Tu','20220323','Thiet ke do hoa','tult@gmail.com','0165549321','lop04'),
('sv11','Le Minh Khang','20220416','Thiet ke do hoa','khangml@gmail.com','033256894','lop04'),
('sv12','Nguyen Trung Kien','20220728','Thiet ke do hoa','kiennt@gmail.com','035479236','lop04');
select * from thesinhvien;

-- Nhap lieu vao bang con lai voi 2 khoa ngoai
insert into phieumuon(ngaymuon,ngaytra,ghichu,soluong,masach,masv) values
('20210215','20210218','Tra dung han','1','s08','sv02'),
('20210216','20210219','Tra dung han','1','s09','sv04'),
('20210215','20210217','Tra dung han','1','s01','sv05'),
('20210214','20210220','Tra muon','1','s02','sv05'),
('20210215','20210216','Tra dung han','1','s05','sv07'),
('20210214','20210215','Tra dung han','1','s05','sv09'),
('20210216','20210218','Tra dung han','1','s04','sv12'),
('20210216','20210222','Tra muon','1','s03','sv11'),
('20210216','20210219','Tra dung han','1','s10','sv05'),
('20210214','20210217','Tra dung han','1','s10','sv01'),
('20210215','20210217','Tra dung han','1','s07','sv03'),
('20210214','20210219','Tra muon','1','s06','sv10');
-- them du lieu vao bang phieu muon de phu hop voi ban gia han
insert into phieumuon values
(13,'20210215','20210218','Tra muon','1','s08','sv05'),
(14,'20210216','20210219','Tra muon','1','s09','sv03'),
(15,'20210215','20210217','Tra muon','1','s01','sv02'),
(16,'20210214','20210220','Tra muon','1','s02','sv01'),
(17,'20210215','20210216','Tra muon','1','s05','sv11'),
(18,'20210214','20210215','Tra muon','1','s05','sv02'),
(19,'20210216','20210218','Tra muon','1','s04','sv10');
-- Cap nhat them phieu muon chua tra
insert into phieumuon(ngaymuon,ghichu,soluong,masach,masv) values
('20210414','Chua tra','1','s11','sv08'),
('20210415','Chua tra','1','s12','sv10'),
('20210413','Chua tra','1','s13','sv01');
select * from phieumuon;
drop table phieumuon;

-- them du lieu vao bang gia han
insert into giahan values
(4,'20210227','Nho tra dung ngay nhe'),
(8,'20210302','Nho tra dung ngay nhe'),
(12,'20210221','Nho tra dung ngay nhe'),
(13,'20210228','Nho tra dung ngay nhe'),
(14,'20210228','Nho tra dung ngay nhe'),
(15,'20210225','Nho tra dung ngay nhe'),
(16,'20210301','Nho tra dung ngay nhe'),
(17,'20210302','Nho tra dung ngay nhe'),
(18,'20210303','Nho tra dung ngay nhe'),
(19,'20210227','Nho tra dung ngay nhe');
select * from giahan;
drop table giahan;

