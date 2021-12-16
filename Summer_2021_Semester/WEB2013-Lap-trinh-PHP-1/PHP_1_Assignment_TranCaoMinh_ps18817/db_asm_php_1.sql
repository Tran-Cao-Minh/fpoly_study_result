-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 03:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asm_php_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_binh_luan` int(11) NOT NULL,
  `noi_dung` varchar(200) NOT NULL,
  `ma_khach_hang` int(11) NOT NULL,
  `ma_san_pham` varchar(10) NOT NULL,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_binh_luan`, `noi_dung`, `ma_khach_hang`, `ma_san_pham`, `ngay_tao`) VALUES
(1, 'Cảm ơn cô Châu Kim Phượng đã tặng em quyển sách này ạ. Nhờ nó mà em bắt đầu có thói quen đọc sách giấy và luôn cố gắng rèn luyện bản thân mình.', 4, 'KNS_005', '2021-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `so_hoa_don` varchar(10) NOT NULL,
  `ma_san_pham` varchar(10) NOT NULL,
  `so_luong_mua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_danh_muc` varchar(10) NOT NULL COMMENT 'Mã danh mục',
  `ten_danh_muc` varchar(100) NOT NULL COMMENT 'Tên danh mục',
  `ngay_tao` date NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`ma_danh_muc`, `ten_danh_muc`, `ngay_tao`) VALUES
('KNS', 'kỹ năng sống', '2021-07-18'),
('KT', 'kinh tế', '2021-07-18'),
('TL', 'tâm lý', '2021-07-24'),
('TN', 'thiếu nhi', '2021-07-18'),
('VH', 'văn học', '2021-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `so_hoa_don` varchar(10) NOT NULL,
  `ma_khach_hang` int(11) NOT NULL,
  `ngay_tao` date NOT NULL DEFAULT current_timestamp(),
  `id_trang_thai` varchar(10) NOT NULL,
  `ghi_chu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_khach_hang` int(11) NOT NULL,
  `tai_khoan` varchar(20) NOT NULL,
  `mat_khau` varchar(32) NOT NULL,
  `ten_khach_hang` varchar(100) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quan_tri_vien` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Là quản trị viên, \r\n1: Là khách hàng bình thường'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_khach_hang`, `tai_khoan`, `mat_khau`, `ten_khach_hang`, `dia_chi`, `so_dien_thoai`, `email`, `quan_tri_vien`) VALUES
(2, 'vancong', '74b87337454200d4d33f80c4663dc5e5', 'Trần Văn Công', 'Đồng Nai Việt Nam', '0123456789', 'congtv@gmail.com', 0),
(4, 'caominh', '74b87337454200d4d33f80c4663dc5e5', 'Trần Cao Minh', 'Đồng Nai Việt Nam', '0332340012', 'a@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_danh_muc` varchar(10) NOT NULL COMMENT 'Mã danh mục',
  `ma_san_pham` varchar(10) NOT NULL COMMENT 'Mã sản phẩm',
  `ten_san_pham` varchar(100) NOT NULL COMMENT 'Tên sản phẩm',
  `don_gia` int(11) NOT NULL DEFAULT 1000 COMMENT 'Đơn giá (VND)',
  `don_vi_tinh` varchar(100) NOT NULL DEFAULT 'Đơn vị tính' COMMENT 'Đơn vị tính',
  `nha_xuat_ban` varchar(100) NOT NULL COMMENT 'Nhà xuất bản',
  `ten_file_anh` varchar(100) NOT NULL COMMENT 'Tên file ảnh',
  `mo_ta` varchar(999) NOT NULL COMMENT 'Mô tả',
  `ngay_tao` date NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượt xem',
  `so_luong_da_ban` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượng đã bán',
  `so_luong_con_lai` int(11) NOT NULL COMMENT 'Số lượng còn lại',
  `phan_tram_giam_gia` int(11) NOT NULL COMMENT 'Phần trăm giảm giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_danh_muc`, `ma_san_pham`, `ten_san_pham`, `don_gia`, `don_vi_tinh`, `nha_xuat_ban`, `ten_file_anh`, `mo_ta`, `ngay_tao`, `so_luot_xem`, `so_luong_da_ban`, `so_luong_con_lai`, `phan_tram_giam_gia`) VALUES
('KNS', 'KNS_001', 'Ba Người Thầy Vĩ Đại', 66500, 'Quyển sách', 'Lao Động', '3-nguoi-thay-vi-dai.jpg', '“Cuốn sách này là một tác phẩm hư cấu. Đây là câu chuyện về một người đàn ông có tên Jack Valentine mà đường đời có nhiều điểm giống với tôi. Có cảm nhận rất không đầy đủ với tư cách một con người, anh ấy lên kế hoạch tìm kiếm tri thức để sống một cuộc sống hạnh phúc hơn, khoẻ khoắn hơn và đẹp hơn.”\r\n\r\nNhững “Câu hỏi cuối cùng” là một điều kì lạ mà Jack nghe được từ người bệnh nhân già nằm cùng phòng với anh – ông Cal. Chỉ sau một buổi tối trò chuyện cùng ông, Jack đã nhận thấy những sự thay đổi đang diễn ra trong mình. Và từ đây, chuyến hành trình đến Rome, Hawaii và New York cùng những khám phá mới mẻ mà anh học được từ ba người thầy vĩ đại trong cuộc đời đã giúp anh trả lời được ba câu hỏi mà cha anh – Cal Valentine đã nói trước khi ông qua đời.', '2021-08-12', 382, 52, 130, 19),
('KNS', 'KNS_002', 'Chủ Nghĩa Khắc Kỷ', 100000, 'Quyển sách', 'Công Thương', 'chu-nghia-khac-ky.jpg', 'Các học giả đồng nghiệp của tôi có thể hứng thú với cuốn sách này; chẳng hạn họ tò mò xem tôi diễn giải những phát biểu của chủ nghĩa Khắc kỷ như thế nào. Tuy nhiên, đối tượng độc giả chính mà tôi hướng đến là những cá nhân bình thường, những người băn khoăn không biết bản thân có đang sống lầm lỗi hay không. Đối tượng này gồm những người dần nhận ra rằng họ thiếu một triết lý sống nhất quán và hậu quả là họ đang lúng túng trong các hoạt động thường ngày của mình: những thành quả họ đạt được ngày hôm nay lại phủi sạch những thành quả đã đạt được ngày hôm trước. Đồng thời, tôi cũng hướng đến những người đã có một triết lý sống nhưng lo ngại rằng triết lý đó phần nào khiếm khuyết.\r\n\r\nTrong quá trình viết cuốn sách này, tôi luôn đặt ra trong đầu câu hỏi: Nếu các nhà Khắc kỷ cổ đại đảm nhận trọng trách viết một cuốn sách hướng dẫn cho những người sống ở thế kỷ hai mốt – một cuốn sách chỉ cho chúng ta cách có được một cuộc sống tốt đẹp – thì cuốn sách đó sẽ như thế nào.', '2021-08-10', 226, 36, 372, 22),
('KNS', 'KNS_003', 'Sức Mạnh Của Ngôn Từ ', 76800, 'Quyển sách', 'Thanh Niên', 'suc-manh-cua-ngon-tu.jpg', 'Cuốn sách này còn bao gồm các trích dẫn hữu ích từ lĩnh vực Nhân văn học, đặc biệt là những câu nói kinh điển của các bậc thánh hiền ở phương Đông và phương Tây. Nhân văn học khám phá ngôn từ sâu sắc hơn và tiếp cận chúng một cách tinh tế hơn bất kỳ môn học nào khác. Tuy nhiên, mục tiêu cuối cùng không nằm ở ngôn từ. Thay vào đó, lời nói chính là một phương tiện để thực hiện mơ ước thay đổi bản thân và thế giới.\r\n\r\nWilliam Carlos Williams đã từng nói: “Điều bạn nói không quan trọng mà quan trọng là cách bạn nói”. Giao tiếp là kỹ năng mà bạn có thể học hỏi và rèn luyện được. Nó cũng giống như khi bạn tập múa, tập đi xe. Chỉ cần bạn sẵn sàng bỏ thời gian và công sức vì nó, bạn có thể thành công.\r\n\r\n“Lẽ nào cuộc đời mỗi người không thể trở thành một tác phẩm nghệ thuật?\r\n\r\nMột ngôi nhà cũng có thể trở thành đối tượng của nghệ thuật, vậy tại sao cuộc đời của chúng ta lại không thể?”', '2021-08-09', 272, 94, 212, 19),
('KNS', 'KNS_004', 'Tinh Hoa Trí Tuệ Do Thái', 78100, 'Quyển sách', 'Hồng Đức', 'tinh-hoa-tri-tue-do-thai.jpg', 'Sách là tác phẩm được lưu truyền rộng rãi và được đánh giá rất cao vì nó kết tinh trí tuệ của một dân tộc mà định mệnh ngặt nghèo cũng như năng lực sáng tạo đã trở thành huyền thoại.\r\nTrong lịch sử nhân loại, có thể nói không một dân tộc nào nhiều khổ nạn phải lìa bỏ quê hương xứ sở phiêu bạt khắp nơi… mà vẫn viết nên những trang sử văn minh rực rỡ như dân tộc Do Thái.\r\nSách đề cập đến những khía cạnh tinh hoa của Talmud, qua những câu chuyện sinh động ở mọi lĩnh vực: văn hóa, khoa học, nghệ thuật, kinh doanh, giáo dục, đối nhân xử thế…\r\nTalmud không chỉ là một tác phẩm kinh điển mà còn là một cuốn bách khoa thư, đã đồng hành cùng dân tộc Do Thái qua hàng ngàn năm thăng trầm như một minh chứng cho trí tuệ sáng láng và ý chí sống còn mãnh liệt của con người.', '2021-08-13', 681, 79, 279, 19),
('KNS', 'KNS_005', 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 78200, 'Quyển sách', 'Hội Nhà Văn', 'tuoi-tre-dang-gia-bao-nhieu.jpg', '“Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ.\r\nBạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.\r\nBạn có chết mòn nơi xó tường với những ước mơ dang dở, đó không phải là việc của họ.\r\nSuy cho cùng, quyết định là ở bạn. Muốn có điều gì hay không là tùy bạn.\r\nNên hãy làm những điều bạn thích. Hãy đi theo tiếng nói trái tim. Hãy sống theo cách bạn cho là mình nên sống.\r\nVì sau tất cả, chẳng ai quan tâm.”\r\n\r\n“Tôi đã đọc quyển sách này một cách thích thú. Có nhiều kiến thức và kinh nghiệm hữu ích, những điều mới mẻ ngay cả với người gần trung niên như tôi.\r\nTuổi trẻ đáng giá bao nhiêu? được tác giả chia làm 3 phần: HỌC, LÀM, ĐI.\r\nNhưng tôi thấy cuốn sách còn thể hiện một phần thứ tư nữa, đó là ĐỌC.\r\nHãy đọc sách, nếu bạn đọc sách một cách bền bỉ, sẽ đến lúc bạn bị thôi thúc không ngừng bởi ý muốn viết nên cuốn sách của riêng mình.\"', '2021-08-11', 510, 16, 291, 24),
('KT', 'KT_001', 'Dạy Con Làm Giàu - Tập 1', 55100, 'Quyển sách', 'Trẻ', 'day-con-lam-giau-tap-1.jpg', 'Người giàu không làm việc vì tiền. Họ bắt tiền làm việc cho họ. Chấp nhận thất bại là bước đầu của thành công? Quyền lực của sự lựa chọn! Những bài học không có trong nhà trường. Hãy bắt đầu từ hôm nay “để không có tiền vẫn tạo ra tiền”….', '2021-07-20', 552, 29, 195, 16),
('KT', 'KT_002', 'Nghĩ Giàu & Làm Giàu', 54900, 'Quyển sách', 'Tổng Hợp TPHCM', 'nghi-giau-lam-giau.jpg', 'Think and Grow Rich - Nghĩ giàu và làm giàu là một trong những cuốn sách bán chạy nhất mọi thời đại. Đã hơn 60 triệu bản được phát hành với gần trăm ngôn ngữ trên toàn thế giới và được công nhận là cuốn sách tạo ra nhiều triệu phú, một cuốn sách truyền cảm hứng thành công nhiều hơn bất cứ cuốn sách kinh doanh nào trong lịch sử.\r\n\r\nTác phẩm này đã giúp tác giả của nó, Napoleon Hill, được tôn vinh bằng danh hiệu “người tạo ra những nhà triệu phú”. Đây cũng là cuốn sách hiếm hoi được đứng trong top của rất nhiều bình chọn theo nhiều tiêu chí khác nhau - bình chọn của độc giả, của giới chuyên môn, của báo chí. Lý do để Think and Grow Rich - Nghĩ giàu và làm giàu có được vinh quang này thật hiển nhiên và dễ hiểu: Bằng việc đọc và áp dụng những phương pháp đơn giản, cô đọng này vào đời sống của mỗi cá nhân mà đã có hàng ngàn người trên thế giới trở thành triệu phú và thành công bền vững.', '2021-07-21', 676, 91, 400, 14),
('KT', 'KT_003', 'Nhà Lãnh Đạo Không Chức Danh', 71000, 'Quyển sách', 'Trẻ', 'nha-lanh-dao-khong-chuc-danh.jpg', 'Trong cuốn sách Nhà Lãnh Đạo Không Chức Danh, bạn sẽ học được:\r\n\r\nLàm thế nào để làm việc và tạo ảnh hưởng với mọi người như một siêu sao, bất chấp bạn đang ở vị trí nào\r\nMột phương pháp để nhận biết và nắm bắt cơ hội vào những thời điểm thay đổi\r\nNhững bí mật thật sự của sự đổi mới\r\nMột chiến lược tức thời để xây dựng đội nhóm tuyệt vời và trở thành một nhà cung cấp ngoạn mục của khách hàng\r\nNhững thủ thuật cứng rắn giúp trở nên mạnh mẽ cả về thể chất lẫn tinh thần để có thể đi đầu trong lĩnh vực của bạn\r\nNhững phương thức thực tế để đánh bại sự căng thẳng, xây dựng một ý chí bất bại, giải phóng năng lượng, và cân bằng cuộc sống cá nhân.', '2021-07-22', 261, 29, 270, 15),
('KT', 'KT_004', 'Nuốt Cá Lớn - Eating The Big Fish', 299000, 'Quyển sách', 'Thế Giới', 'nuot-ca-lon.jpg', 'Tác giả Adam Morgan đã đưa ra những lời khuyên thực tế cùng những ví dụ đa dạng, dễ làm theo để cho người đọc thấy những Thương hiệu Thách thức đã giành lấy sự chú ý và “lấy cắp” khách hàng từ những đối thủ cạnh tranh có ngân sách quảng cáo và marketing lớn hơn họ nhiều lần như thế nào.\r\n\r\nĐồng thời giới thiệu 8 Nguyên tắc Thách thức - nhấn mạnh vào việc mang lại một cái nhìn mới về thị trường; xây dựng một Nhận diện nổi bật, thu hút và đầy cảm xúc; triển khai một chiến lược truyền thông có tính thâm nhập; và tập trung chú ý vào các ý tưởng hơn là người tiêu dùng.', '2021-07-23', 775, 48, 115, 15),
('KT', 'KT_005', 'Tiền Đẻ Ra Tiền - Đầu Tư Tài Chính Thông Minh', 78000, 'Quyển sách', 'Hồng Đức', 'tien-de-ra-tien.jpg', 'Điều đặc biệt so với những cuốn sách khác ông từng viết trước đây, đó là cuốn sách này không nói về chuyện làm giàu, cũng là một phần trong chuỗi câu chuyện “Bí quyết thành công của triệu phú Anh” nhưng nó bàn đến việc kiểm soát tiền bạc. Đến với cuối cuốn sách, bạn sẽ có sự tự tin để đưa ra những quyết định đúng đắn cho bản thân mình và những kỹ năng để khiến đồng tiền của mình đi xa hơn, có hiệu quả dù nền kinh tế có ra sao đi chăng nữa.\r\n\r\nNó sẽ bàn tới những khía cạnh, những thành tố cốt yếu của tài chính và mối quan hệ cốt lõi của bạn với đồng tiền.', '2021-07-24', 622, 11, 292, 14),
('TL', 'TL_001', 'Không Giới Hạn - Khám Phá Oponopono', 126600, 'Quyển sách', 'Thế Giới', 'khong-gioi-han.jpg', '\"KHÔNG GIỚI HẠN là câu chuyện về sự trở về trạng thái zero, nơi không một thứ gì tồn tại nhưng mọi thứ đều khả dĩ. Ở trạng thái zero, không còn tư tưởng, ngôn từ, hành vi, ký ức, chương trình, niềm tin hoặc bất kỳ điều gì khác. Chẳng có gì cả.\" (Bí mật của vũ trụ)\r\n\r\nCó phải bạn đang làm việc quá sức và quá căng thẳng?\r\n\r\nCó phải bạn đang làm hết sức nhưng vẫn chẳng thành công trong sự nghiệp và cuộc sống cá nhân?\r\n\r\nNếu bạn đang cố gắng vất vả nhưng chưa đạt được kết quả như ý thì có lẽ vấn để nằm ở bên trong bạn. Có lẽ điều đang cản trở bạn nằm bên trong bạn chứ không phải ở bên ngoài. Không giới hạn đưa đến cho bạn một phương pháp đột phá để vượt qua những giới hạn nội tại và đạt được những mục tiêu mơ ước.\r\n\r\nOponopono là một hệ thống bí quyết tâm linh cổ xưa của người Hawaii, một phương pháp trị liệu vô cùng hiệu quả để giải phóng tâm thức, loại bỏ những trở ngại tinh thần, giúp bạn đạt đến mục tiêu không giới hạn trong công việc lẫn cuộc sống.', '2021-07-25', 622, 84, 104, 21),
('TL', 'TL_002', 'Kiếp Nào Ta Cũng Tìm Thấy Nhau', 72200, 'Quyển sách', 'Lao Động', 'kiep-nao-ta-cung-tim-thay-nhau.jpg', 'Kiếp nào ta cũng tìm thấy nhau là cuốn sách thứ ba của Brain L. Weiss – một nhà tâm thần học có tiếng. Trước đó ông đã viết hai cuốn sách: cuốn đầu tiên là Ám ảnh từ kiếp trước, cuốn sách mô tả câu chuyện có thật về một bệnh nhân trẻ tuổi cùng với những liệu pháp thôi miên về kiếp trước đã làm thay đổi cả cuộc đời tác giả lẫn cô ấy. Cuốn sách đã bán chạy trên toàn thế giới với hơn 2 triệu bản in và được dịch sang hơn 20 ngôn ngữ. Cuốn sách thứ hai Through  Time  into  Healing (Đi  qua  thời  gian  để chữa lành), mô tả những gì tác giả đã học được về tiềm năng chữa bệnh của liệu pháp hồi quy tiền kiếp. Trong cuốn sách đều là những câu chuyện người thật việc thật. Nhưng  câu  chuyện  hấp  dẫn  nhất lại  nằm  trong cuốn sách thứ ba.', '2021-07-26', 526, 72, 290, 17),
('TL', 'TL_003', 'Tâm Thức', 87300, 'Quyển sách', 'Thanh Niên', 'tam-thuc.jpg', 'Cách bạn tập trung chú ý, cởi mở nhận thức để hướng tới những mục tiêu tốt đẹp và cao cả - cũng giúp làm tăng nhận thức về hạnh phúc, kết nối với những người xung quanh (dưới dạng sự cảm thông và lòng trắc ẩn được tăng cường), cân bằng trong cảm xúc và sự kiên cường khi đối diện với thử thách. Các nghiên cứu đã chỉ ra rằng khi nhận thức về ý nghĩa và mục đích tăng lên, thì sự thanh thản trong cuộc sống cũng sẽ tăng lên.\r\n\r\nCơ hội chỉ ưu ái cho những kẻ có sự chuẩn bị, việc trải nghiệm bài tập “Bánh xe nhận thức” trong cuốn sách này sẽ giúp bạn có được sự chuẩn bị cho những cơ hội mà cuộc sống đem lại. Khi đã thành thạo trong việc sử dụng công cụ này, bạn sẽ nhận thấy bản thân có khả năng vượt qua được bão tố trong cuộc sống một cách dễ dàng hơn và sống cuộc đời của mình trọn vẹn hơn, cởi mở hơn với bất kỳ trải nghiệm nào, dù là tích cực hay tiêu cực.', '2021-07-27', 314, 73, 242, 17),
('TL', 'TL_004', 'Tử Huyệt Cảm Xúc', 118400, 'Quyển sách', 'Hà Nội', 'tu-huyet-cam-xuc.jpg', 'Đây là một cuốn sách viết về Tử Huyệt Cảm Xúc - những “điểm yếu chết người” trong tính cách của mỗi chúng ta. Tử Huyệt Cảm Xúc có thể giúp chúng ta đạt được hạnh phúc và thành công tột đỉnh, nhưng cũng có thể khiến chúng rơi vào bi kịch như Achilles!', '2021-07-28', 584, 31, 196, 20),
('TL', 'TL_005', 'Vòng Xoáy Đi Lên - Đảo Chiều Trầm Cảm Từ Những Thay Đổi Nhỏ', 104300, 'Quyển sách', 'Hà Nội', 'vong-xoay-di-len.jpg', 'Trầm cảm là một vòng xoáy tiêu cực. Hẳn ai cũng biết cảm giác mắc kẹt trong một vòng xoáy tiêu cực hay vòng xoáy đi xuống là như thế nào. Vòng xoáy tiêu cực xuất hiện là do những sự kiện xảy đến với bạn và những quyết định của bạn đã làm thay đổi hoạt động trong não bộ. Nếu hoạt động trong não bộ thay đổi theo hướng tồi tệ hơn, điều này sẽ lại tiếp tục khiến mọi thứ dần vượt kiểm soát, những thứ vượt kiểm soát đến lượt chúng lại tiếp tục tác động tới não bộ theo hướng tiêu cực...\r\n\r\nNhưng sẽ thế nào nếu cuộc đời bạn đi theo chiều hướng xoáy lên thay vì xoáy xuống? Sẽ thế nào nếu bỗng nhiên bạn trở nên sung sức hơn, ngủ ngon hơn, giao lưu với bạn bè nhiều hơn và cảm thấy hạnh phúc hơn? Thường thì chỉ cần một vài cảm xúc tích cực để khởi động quá trình này, và rồi nó sẽ thúc đẩy những thay đổi tích cực trong các lĩnh vực khác của cuộc sống – đây chính là vòng xoáy tích cực hay vòng xoáy đi lên, và hiệu quả ưu việt của nó đã được chứng minh nhiều lần, trong hàng trăm nghiên cứu khoa học.', '2021-07-29', 352, 79, 133, 20),
('TN', 'TN_001', 'Bác Sĩ Aibôlít', 27000, 'Quyển sách', 'Kim Đồng', 'bac-si-aibolit.jpg', 'Tác phẩm “Bác sĩ Aibôlít” của Chukovsky vừa viết bằng văn xuôi vừa viết bằng truyện thơ được trẻ em vô cùng yêu thích. Tên ông luôn được các bạn nhỏ Liên Xô thời ấy gọi một cách trìu mến là Trucôsa. Và từ tiếng Nga “Aibôlít” (có nghĩa là “Ôi đau quá!”) đã trở thành danh từ riêng quen thuộc với các bạn nhỏ trên thế giới cho tới tận ngày nay.', '2021-07-30', 389, 59, 152, 25),
('TN', 'TN_002', 'Dế Mèn Phiêu Lưu Ký', 37500, 'Quyển sách', 'Kim Đồng', 'de-men-phieu-luu-ky.jpg', 'Ấn bản minh họa màu đặc biệt của Dế Mèn phiêu lưu ký, với phần tranh ruột được in hai màu xanh - đen ấn tượng, gợi không khí đồng thoại.\r\n\r\n“Một con dế đã từ tay ông thả ra chu du thế giới tìm những điều tốt đẹp cho loài người. Và con dế ấy đã mang tên tuổi ông đi cùng trên những chặng đường phiêu lưu đến với cộng đồng những con vật trong văn học thế giới, đến với những xứ sở thiên nhiên và văn hóa của các quốc gia khác. Dế Mèn Tô Hoài đã lại sinh ra Tô Hoài Dế Mèn, một nhà văn trẻ mãi không già trong văn chương...” - Nhà phê bình Phạm Xuân Nguyên.\r\n\r\n“Ông rất hiểu tư duy trẻ thơ, kể với chúng theo cách nghĩ của chúng, lí giải sự vật theo lô gích của trẻ. Hơn thế, với biệt tài miêu tả loài vật, Tô Hoài dựng lên một thế giới gần gũi với trẻ thơ. Khi cần, ông biết đem vào chất du ký khiến cho độc giả nhỏ tuổi vừa hồi hộp theo dõi, vừa thích thú khám phá.” - TS Nguyễn Đăng Điệp.', '2021-07-31', 303, 18, 201, 25),
('TN', 'TN_003', 'Hoàng Tử Bé', 36800, 'Quyển sách', 'Thanh Niên', 'hoang-tu-be.jpg', 'Câu chuyện về một phi công phải hạ cánh khẩn cấp trong sa mạc. Anh gặp một cậu bé, người hóa ra là một hoàng tử từ hành tinh khác đến. Hoàng tử kể về những cuộc phiêu lưu của em trên Trái Đất và về bông hồng quí giá trên hành tinh của em. Em thất vọng khi phát hiện ra hoa hồng là loài bình thường như bao loài khác trên Trái Đất. Một con cáo sa mạc khuyên em nên yêu thương chính bông hồng của em và hãy tìm kiếm trong đó ý nghĩa của cuộc đời mình. Nhận ra điều ấy, hoàng tử quay trở về hành tinh của em.', '2021-08-01', 468, 20, 171, 23),
('TN', 'TN_004', 'Nghìn Lẻ Một Đêm', 151700, 'Quyển sách', 'Văn Học', 'nghin-le-mot-dem.jpg', 'Nghìn lẻ một đêm, tác phẩm vĩ đại bậc nhất của nền văn học Ả Rập từ cổ chí kim, là một trong những công trình sáng tạo đồ sộ và tuyệt diệu của nền văn học thế giới. Macxim Gorki từng ca ngợi: “Trong các di sản tuyệt diệu của sáng tác truyền khẩu dân gian, các câu chuyện cổ tích của nàng Sêhêrazát là di sản đồ sộ nhất.\r\n\r\nNhững câu chuyện này thể hiện ở mức hoàn hảo diệu kỳ, xu hướng của người dân lao động muốn buông mình theo “phép nhiệm mầu của những ảo giác êm đẹp”, trong sự kết hợp phóng khoáng của những ngôn từ mang sức mạnh tưởng tượng huyền ảo của các dân tộc phương Đông - Ả Rập, Ba Tư, Ấn Độ. Công trình thêu hoa dệt gấm bằng từ ngữ này đã xuất hiện từ rất xa xưa, nhưng đến nay những sợi tơ muôn màu của nó vẫn lan khắp bốn phương, phủ lên trái đất một tấm thảm ngôn từ đẹp đẽ lạ lùng.”', '2021-08-02', 232, 75, 164, 21),
('TN', 'TN_005', 'Xóm Bờ Giậu', 101500, 'Quyển sách', 'Kim Đồng', 'xom-bo-giau.jpg', 'Xóm Bờ Giậu gần gũi thân thuộc, mang trong mình hình bóng của bao làng quê yêu dấu. Đến Xóm Bờ Giậu, bạn sẽ được làm quen với những nhân vật rất thú vị: cụ giáo Cóc thông thái về hưu, nhạc sĩ trứ danh Dế Lửa, chú thợ săn nhiều tâm sự Thằn Lằn, cô người mẫu đáng yêu Ốc Sên, chuyên gia dự báo thời tiết Tắc Kè, vận động viên bận bịu Nhái Xanh, cô nàng điệu đàng Hoa Cúc Áo, thi sĩ nghiệp dư lãng mạn Dế Còm... Nhân vật nào cũng dễ thương. Và nhân vật nào cũng sẵn sàng kể cho bạn nghe một câu chuyện hấp dẫn.', '2021-08-03', 248, 40, 182, 23),
('VH', 'VH_001', '5 Centimet Trên Giây', 39500, 'Quyển sách', 'Văn Học', '5-centimet-tren-giay.jpg', 'Bằng giọng văn tinh tế, truyền cảm, Năm centimet trên giây mang đến những khắc họa mới về tâm hồn và khả năng tồn tại của cảm xúc, bắt đầu từ tình yêu trong sáng, ngọt ngào của một cô bé và cậu bé. Ba giai đoạn, ba mảnh ghép, ba ngôi kể chuyện khác nhau nhưng đều xoay quanh nhân vật nam chính, người luôn bị ám ảnh bởi kí ức và những điều đã qua…\r\n\r\nKhác với những câu chuyện cuốn bạn chạy một mạch, truyện này khó mà đọc nhanh. Ngón tay bạn hẳn sẽ ngừng lại cả trăm lần trên mỗi trang sách. Chỉ vì một cử động rất khẽ, một câu thoại, hay một xúc cảm bất chợt có thể sẽ đánh thức những điều tưởng chừng đã ngủ quên trong tiềm thức, như ngọn đèn vừa được bật sáng trong tâm trí bạn. Và rồi có lúc nó vượt quá giới hạn chịu đựng, bạn quyết định gấp cuốn sách lại chỉ để tận hưởng chút ánh sáng từ ngọn đèn, hay đơn giản là để vết thương trong lòng mình có thời gian tự tìm xoa dịu. ', '2021-08-04', 450, 54, 188, 18),
('VH', 'VH_002', 'Cảm Ơn Người Lớn', 88000, 'Quyển sách', 'Trẻ', 'cam-on-nguoi-lon.jpg', 'Cảm ơn người lớn - một áng văn lãng mạn trong giọng hài hước đặc biệt “dành cho trẻ em, và những ai từng là trẻ em”..\r\n\r\nBạn sẽ gặp lại Mùi, Tủn, Tí sún, Hải cò… của Cho tôi xin một vé đi tuổi thơ, cùng chơi những trò chơi quen thuộc, và được đắm mình vào những ước mơ điên rồ, ngốc nghếch nhưng trong veo của tuổi mới lớn hồn nhiên và đầy ắp dự định.\r\n\r\nVà cả khi họ đã trưởng thành, bạo chúa thời gian đã vùng vẫy thế nào trong cuộc đời của những nhân vật mà bạn yêu quý…Hãy bắt đầu đọc từ bất cứ trang nào, có thể đọc bất cứ lúc nào, và cùng với bất cứ ai. Bạn sẽ nhận được món quà “n trong 1” của nhà văn Nguyễn Nhật Ánh: sẽ n lần thổn thức qua 1 cuốn sách 19 chương đầy ắp tình bạn ngây thơ, tình xóm giềng tốt lành nhân ái, tình yêu đắm đuối ngọt ngào…\r\nCảm ơn người lớn được Nguyễn Nhật Ánh đặt bút viết đúng sau 10 năm ra đời Cho tôi xin một vé đi tuổi thơ – cuốn sách bán chạy tới nay đã 400.000 bản.', '2021-08-05', 255, 36, 264, 16),
('VH', 'VH_003', 'Kiêu Hãnh Và Định Kiến', 91000, 'Quyển sách', 'Văn Học', 'kieu-hanh-va-dinh-kien.jpg', 'Bằng tài quan sát nhạy bén, bút pháp trào lộng tinh vi và giọng văn dí dỏm, Jane Austen cuốn hút độc giả theo từng diễn biến trong câu chuyện xoay quanh số phận và con đường tình duyên của năm cô thiếu nữ chưa chồng nhà Bennet trên nền một xã hội đề cao địa vị và gia sản trong quan hệ hôn nhân. Ở trung tâm của thế giới ấy, hai nhân vật chính Elizabeth Bennet và Fitzwilliam Darcy dường như là một cặp đôi lý tưởng, nhưng ngăn cách giữa họ không chỉ là địa vị chênh lệch cùng mưu toan ngáng trở của người ngoài, mà còn là những hiểu lầm sâu sắc xuất phát từ bản tính của đôi bên. \r\n\r\nPhản ánh chân thực cuộc sống của tầng lớp trung lưu thế kỷ 19 đồng thời khắc họa sinh động những lát cắt thú vị trong bản chất muôn thuở của con người, Kiêu hãnh và định kiến từ lâu đã khẳng định vị trí vững vàng trong tốp những tiểu thuyết được yêu mến nhất mọi thời đại, chiếm được cảm tình của đông đảo độc giả phổ thông cũng như giới học giả.', '2021-08-06', 301, 31, 159, 22),
('VH', 'VH_004', 'Nhà Giả Kim', 55200, 'Quyển sách', 'Hội Nhà Văn', 'nha-gia-kim.jpg', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.', '2021-08-07', 791, 40, 227, 24),
('VH', 'VH_005', 'Phía Tây Không Có Gì Lạ', 40900, 'Quyển sách', 'Văn Học', 'phia-tay-khong-co-gi-la.jpg', 'Thế chiến thứ nhất nổ ra, những chàng trai đang ngồi trên ghế nhà trường bị chuyển thẳng ra mặt trận. Tại đây sự khốc liệt của chiến tranh đã khiến họ tê dại khi bom đạn không chỉ tước đi những phần cơ thể mà còn cả tâm hồn. Thế nên chưa kịp trưởng thành họ đã trở nên già nua, bởi gần với cái chết hơn là sự sống. Họ cũng chẳng còn tin tưởng ai, chẳng thiết tha điều gì, kể cả ngày trở về.\r\n\r\nCho nên khi tất cả đồng đội cùng trang lứa đã ngã xuống, cái chết đối với những chàng trai ấy là sự giải thoát. Họ nằm xuống nhẹ nhangfm thanh than đến độ tưởng như chẳng hề may may lay động đến thứ gì xung quanh, dù chỉ là một ngọn cỏ. Mặt trận hoàn toàn yên tĩnh, bản báo cáo chiến trường chỉ ghi vẻn vẹn một câu: “Ở phía Tây, không có gì lạ.” Phải, chẳng có gì lạ, chỉ có một người vừa rời khỏi cuộc đời khi độ tuổi mới chớm đôi mươi.', '2021-08-08', 223, 83, 248, 18);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_hoa_don`
--

CREATE TABLE `trang_thai_hoa_don` (
  `id_trang_thai` varchar(1) NOT NULL,
  `ten_trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_binh_luan`),
  ADD KEY `bl_kh` (`ma_khach_hang`),
  ADD KEY `bl_sp` (`ma_san_pham`);

--
-- Indexes for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`so_hoa_don`,`ma_san_pham`),
  ADD KEY `cthd_sp` (`ma_san_pham`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_danh_muc`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`so_hoa_don`),
  ADD KEY `hd_tthd` (`id_trang_thai`),
  ADD KEY `hd_kh` (`ma_khach_hang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_khach_hang`),
  ADD UNIQUE KEY `tai_khoan` (`tai_khoan`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_san_pham`),
  ADD KEY `sp_dm` (`ma_danh_muc`);

--
-- Indexes for table `trang_thai_hoa_don`
--
ALTER TABLE `trang_thai_hoa_don`
  ADD PRIMARY KEY (`id_trang_thai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `bl_kh` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bl_sp` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `cthd_hd` FOREIGN KEY (`so_hoa_don`) REFERENCES `hoa_don` (`so_hoa_don`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cthd_sp` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hd_kh` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hd_tthd` FOREIGN KEY (`id_trang_thai`) REFERENCES `trang_thai_hoa_don` (`id_trang_thai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `sp_dm` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`ma_danh_muc`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
