-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2021 lúc 07:27 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitelinhkien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slide1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `slide`, `slide1`, `ads`, `created_at`, `updated_at`) VALUES
(10, 'pv-banner-1222x465-eada7.jpg', 'banner4.jpg', 'ads1.jpg', NULL, NULL),
(11, NULL, 'banner1.jpg', 'ads2.jpg', NULL, NULL),
(13, NULL, 'banner3.jpg', '', '2020-12-24 02:27:12', '2020-12-24 02:27:12'),
(14, NULL, 'banner.jpg', '', '2020-12-24 02:27:33', '2020-12-24 02:27:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `customerID` int(11) UNSIGNED NOT NULL,
  `date_order` datetime NOT NULL,
  `total` double NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa xử lí',
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codevnpay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `quantily` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `cate_description`, `created_at`, `updated_at`) VALUES
(1, 'Mainboard', '<h4 class=\"mb-3\" style=\"margin: auto;\">Những điều cơ bản cần lưu ý khi chọn mua mainboard</h4>\r\n      <p>Có thể nói mainboard là cột sống của chiếc máy tính, bởi lẽ toàn bộ các linh kiện đều phải giao tiếp với nhau thông qua mainboard, hơn nữa mainboard cũng là một trong những yếu tố quan trọng quyết định khả năng nâng cấp/ mở rộng về lâu dài của một chiếc máy tính. Tuy nhiên, việc lựa chọn một chiếc mainboard hợp lý không phải là một điều dễ dàng, bởi vì có quá nhiều sự lựa chọn ở các phân khúc khác nhau, khiến cho người mua rất dễ đưa ra quyết định sai lầm.\r\n\r\n      \r\n        Trong bài viết này, Phong Vũ sẽ chỉ ra những điểm cần lưu ý cơ bản khi lựa chọn mainboard, giúp bạn đưa ra được quyết định 1 cách chính xác và dễ dàng hơn khi chọn mua một chiếc mainboard.</p>\r\n      <ul>\r\n        <h5>1. Socket</h5>\r\n      <p>Đầu tiên bạn sẽ phải xác định xem mình muốn mua CPU của Intel hay AMD để lựa chọn mainboard có socket phù hợp. Ở thời điểm hiện tại thì các CPU phổ biến của Intel đang sử dụng socket LGA 1151-v2 và LGA 2066.</p>\r\n      <img src=\"../public/frontend/image/gt/intel.png\" alt=\"\" style=\"height: 400px\" ;=\"\">\r\n      <div class=\"collapse\">\r\n    <p>Đối với AMD thì 2 socket phổ biến sẽ là PGA AM4 và LGA TR4.</p>\r\n    <ul>\r\n<img src=\"../public/frontend/image/gt/amd.png\" alt=\"\" style=\"height: 400px\" ;=\"\">\r\n    </ul>\r\n    \r\n     <p>Việc lựa chọn chính xác loại socket hỗ trợ cho CPU mà bạn muốn mua là rất quan trọng, chọn sai socket với CPU sẽ khiến cho mainboard không nhận diện được CPU, thậm chí là gây ra các hư hại đáng tiếc về phần cứng. Để biết được socket của mainboard có tương thích với CPU hay không, bạn nên tham khảo kĩ thông tin từ các nhà sản xuất CPU là Intel, AMD và các nhà sản xuất mainboard như ASUS, ASRock, GIGABYTE, EVGA, MSI, hoặc tham khảo các kĩ thuật viên để có được thông tin chính xác nhất nhé.</p>\r\n      <h5>2. Chi phí</h5>\r\n      <p>Tiếp đến sẽ là đương nhiên sẽ là việc bạn muốn chi bao nhiêu tiền vào mainboard, tuy nhiên việc này là 1 điều không hề đơn giản. Quá mắc sẽ làm bạn phải cắt giảm chi phí của các linh kiện khác, quá rẻ thì khả năng nâng cấp sẽ bị giới hạn đi đáng kể.\r\n\r\n        Đầu tiên bạn sẽ phải dựa vào nhu cầu sử dụng của mình, bạn có nhu cầu chơi các tựa game cấu hình cao ko, có ép xung ko, có sử dụng để chạy máy ảo, render, biên tập video không hay bạn đơn giản chỉ có nhu cầu giải trí nhẹ nhàng.\r\n        \r\n        Nếu như chỉ sử dụng đơn giản với giải trí nhẹ nhàng thì bất kì mainboard nào sử dụng chipset A320 (AMD) hay H310 (Intel) đều sẽ đáp ứng tốt nhu cầu của bạn. Trong khi đó, nếu bạn là 1 game thủ gạo cội, luôn muốn trải nghiệm những tựa game đình đám nhất thì những dòng mainboard sử dụng chipset B350, B450 (AMD) hoặc B360, B365, H370 (Intel) là đã quá đủ cho nhu cầu chơi game của bạn trong khi vẫn đảm bảo khả năng hỗ trợ phần cứng về lâu dài  </p>\r\n     <p>Còn nếu bạn là một người yêu công nghệ, luôn muốn được trải nghiệm công nghệ mới và đặc biệt yêu thích ép xung thì những mainboard sử dụng chipset X370, X470 (AMD) và Z370, Z390 (Intel) chắc chắn sẽ làm bạn hài lòng. Trường hợp bạn là một người làm việc chuyên nghiệp với các ứng dụng chạy máy ảo, render, biên tập video thì những mainboard sử dụng chipset X399 (AMD) và X299 (Intel) là lựa chọn phù hợp nhất với khả năng hỗ trợ những CPU có khả năng xử lý mạnh mẽ.</p>\r\n      \r\n      \r\n      <h5>3. Khả năng hỗ trợ</h5>\r\n      <p>Khả năng hỗ trợ của mainboard là khá quan trọng, nhưng cũng đừng vì thế mà chọn mua 1 chiếc mainboard cao cấp chuyên dụng cho ép xung và có số lượng lớn các cổng cắm (SATA, PCI) trong khi bạn chỉ sử dụng để chơi game. Hay nếu như chỉ vì cố gắng tiết kiệm càng nhiều càng tốt, bạn vô tình chọn 1 chiếc mainboard có khả năng hỗ trợ rất ít để rồi sau 1 thời gian sử dụng mới phát hiện ra rằng bạn không thể gắn thêm M.2 SSD hay card mở rộng.\r\n\r\n\r\n\r\n        Trong thời gian vừa rồi, ở phân khúc này có rất nhiều lựa chọn khá hấp dẫn như RTX 2070, 2060 thậm chí là ngay cả GTX 1080 và 1070Ti vẫn đem lại hiệu năng trên 1440p rất tốt. Cho tới khi AMD cho ra mắt 2 đại diện của kiến trúc Navi là RX 5700XT và 5700 tại E3 2019 thì cục diện đã thay đổi khá nhiều với hiệu năng chơi game trên 1440p vượt mặt cả RTX 2060 lẫn 2070, tạo nên sức ép khá lớn lên NVIDIA.</p>\r\n      <h5>4. Kích thước</h5>\r\n      <ul>\r\n      <img src=\"../public/frontend/image/gt/mini.jpg\" alt=\"\" style=\"height:400px; float: left;\">  \r\n    </ul>\r\n      <p>Dù bạn có sử dụng platform của AMD, Intel hay bất kì hãng nào đi nữa thì cũng sẽ chỉ có 4 loại kích thước mainboard phổ biến trên thị trường hiện nay là mini-ITX, micro-ATX, ATX và E-ATX. Việc chọn kích thước mainboard náo sẽ phụ thuộc rất nhiều vào khả năng hỗ trợ của case máy tính và số lượng thiết bị mà bạn cần sử dụng.\r\n\r\n        Đối với đa số người sử dụng sẽ lựa chọn 2 loại kích thước micro-ATX và ATX do khả năng hỗ trợ gắn thêm linh kiện rất tốt đồng thời vẫn giữ được kích thước phù hợp và tương thích với hầu hết các case máy tính hiện nay..\r\n             \r\n        Trong khi đó, mini-ITX và E-ATX chỉ phù hợp với một số người dùng nhất định. Mini-ITX thường sẽ chỉ phù hợp với các bộ máy nhỏ gọn, đánh đổi lại khả năng mở rộng rất hạn chế, trong khi E-ATX lại hướng tới những người sử dụng cao cấp và đa phần người sử dụng bình thường gần như không thể sử dụng hết khả năng mở rộng của những chiếc mainboard này.</p>\r\n      </div></ul>', '2020-12-07 14:08:28', '2021-01-14 22:51:06'),
(2, 'Cpu', '<h4 class=\"mb-3\" style=\"text-align: center; margin: auto;\"><b>Cách chọn CPU – Tổng quan về CPU </b></h4>\r\n     <h5>Cho dù bạn đã có PC cho bản thân, hay vẫn đang tìm hiểu để sắm cho mình một dàn thì đây là một số điều cần lưu ý:</h5>\r\n     <ul>\r\n       <li><h6>Chỉ có thể là AMD hoặc Intel:</h6> Quanh ta vẫn là những cuộc tranh luận nảy lửa về hiệu năng của 2 ông lớn trong nghành sản xuất CPU. Xét trên quan điểm đại đa số người dùng với Intel làm tốt hơn một chút về chơi game và AMD thì lấn lướt Intel trong các tác vụ như chỉnh sửa, xử lý video.</li>\r\n       <li><h6>Xung nhịp hay số nhân bạn cần ưu tiên:</h6> Tốc độ xung nhịp cao hơn chuyển thành hiệu suất nhanh hơn trong các tác vụ đơn giản, phổ biến như chơi game. Trong khi nhiều nhân hơn sẽ giúp bạn vượt qua khối lượng công việc tốn nhiều thời gian nhanh chóng hơn.</li>\r\n       <li><h6>Thế hệ CPU mới nhất:</h6> Mua chip cũ để sử dụng lâu dài không phải là một cách tiết kiệm hay.</li>\r\n       <li><h6>Một bộ PC hoàn hảo:</h6> Không phải là một hệ thống đắt tiền, mà là khi tất cả các linh kiện cùng chung đẳng cấp với nhau. Không nên tồn tại việc một CPU hiệu năng ” bàn thờ” nhưng lại “đi bộ” vì các linh kiện còn lại không đủ sức hộ tống theo.</li>\r\n       <li><h6>Ép xung không dành cho tất cả mọi người:</h6> Đối với hầu hết mọi người, sẽ hợp lý hơn khi chi thêm 4 trăm – 1 triêu và mua chip cao cấp hơn thay vì tự mày mò ép xung.</li>\r\n       <img src=\"../public/frontend/image/gt/CPU-Ryzen-Intel.png\" alt=\"\" style=\"height: 300px;\">\r\n     </ul>\r\n<div class=\"collapse\">\r\n     <h6>NHU CẦU CƠ BẢN:</h6>\r\n     <p>Nếu bạn chỉ cần một CPU cho phép bạn xem video, duyệt Web và thực hiện các tác vụ năng suất cơ bản như Microsorf Office, thì một con chip có hai hoặc bốn nhân như Intel Celeron hoặc AMD Athlon là thứ bạn cần. Nhưng nếu nhu cầu bạn nhiều hơn một chút, tốt hơn là nên bạo dạn xem xét đến dòng AMD Ryzen 3 , hoặc Intel Pentium hay Intel i3 để vẫn có thể chiến game e-sport ở phân khúc này.</p>\r\n     <h6>CHUYÊN GAME:</h6>\r\n     <p>Nếu bạn chủ yếu quan tâm đến hiệu năng chơi game, bạn cần ít nhất là CPU Intel Core i5 hoặc AMD Ryzen 5 tầm trung. Xem xét thêm cả card đồ họa cũng quan trọng ngang ngửa so với bộ xử lý để chơi game, với nhu cầu ở mức chơi game thì cũng không nhất thiết phải sở hữu chip Intel Core i7 hoặc Ryzen 7.</p>\r\n     <h6>SẢN XUẤT NỘI DUNG ĐA PHƯƠNG TIỆN HOẶC ÉP XUNG:</h6>\r\n     <p>Nếu bạn muốn có nhiều nhân hoặc tốc độ hơn cho những tác vụ đòi hỏi đa nhân như chỉnh sửa video hay đơn thuần là chỉ muốn một dàn PC với phản hồi siêu nhanh thì bạn cần phải vung tiền vào các dòng CPU cao cấp như chip Intel Core i7, Core i9 hoặc Ryzen 7. Đây cũng là những con chip đưa bạn đến với công nghệ ép xung,</p>\r\n     <h6>PC “TAY TO” NHƯ MÁY TRẠM, CÁC CÔNG VIỆC ĐẶC THÙ:</h6>\r\n     <p>Nếu bạn đang lãng phí hàng giờ để xử lý hoạt hình 3D hoặc video 4K, hay bạn đang xử lý các cơ sở dữ liệu lớn và công trình toán học phức tạp, thì hãy trang bị ngay cho mình dòng chip “kéo pháo” CPU Intel Core X hoặc AMD Threadripper . Những con thú này cung cấp số lượng lớn các nhân vật lý (lên đến 18 khi viết bài này) để đa nhiệm nặng độ hoặc các tác vụ tính toán tốn thời gian. Người dùng doanh nghiệp có thể xem xét bộ xử lý Intel Xeon hoặc AMD EPYC (nhưng con chip không được nhiều người tiêu dùng biết tới).</p>\r\n    </div>', '2020-12-07 14:15:04', '2021-01-12 15:40:19'),
(4, 'RAM', '<h4 class=\"mb-3\" style=\"margin: auto;\">RAM là gì ? RAM hoạt động thế nào? Nên chọn RAM ra sao ?</h4>\r\n      <h5>Cùng tìm hiểu về RAM - bộ nhớ đệm cực kì quan trọng trong mỗi chiếc máy tính.</h5>\r\n      <p>Có lẽ chúng ta vẫn luôn hiểu rằng một bộ máy tính với lượng RAM trang bị càng lớn thì đương nhiên khả năng đa nhiệm của nó càng cao và đôi khi với các mẫu RAM với các thông số khác nhau về BUS hay CAS chúng ta sẽ có được tốc độ trải nghiệm khác nhau.  Trong bài viết này , nếu bạn nào vẫn còn mơ hồ về các khái niệm này thì hãy để Teknews làm rõ hơn cho các bạn nhé.</p>\r\n      <ul>\r\n      <img src=\"../public/frontend/image/gt/ram.jpg\" alt=\"\" style=\"height: 400px\" ;=\"\">\r\n    <p></p>\r\n    <div class=\"collapse\">\r\n    <h5>RAM là gì ?</h5>\r\n    \r\n     <p>Theo nhiều cách nghĩ, kí ức làm nên con người chúng ta, giúp chúng ta có thể ghi nhớ , học và duy trì các kĩ năng và quá khứ , và mỗi khi chúng ta cần sử dụng những kí ức đó , nó lại chuyển ra và để sẵn vào một nơi nào đó cho tới khi chúng ta sử dụng xong rồi mới tiếp tục biến mất vào sâu trong trí nhớ . Với Máy tính, cách chúng được xây dựng là theo Logic của con người vậy, và nơi để chúng ta để máy tính được tạm ghi nhớ mọi thứ đó là RAM ( Random Access Memory )\r\n\r\n      RAM là một dạng bộ nhớ trong của máy tính, chỉ hoạt động khi thiết bị đang hoạt động. Nếu tắt đi, tất cả các dữ liệu nằm trên đây sẽ được chuyển tới nơi khác hoặc biến mất.</p>\r\n     \r\n      <h5>Chọn RAM sao cho phù hợp với PC?</h5>\r\n      <p>Sau khi đã có  những kiến thức cần thiết về RAM , việc lựa chọn RAM cho PC của mình trở nên dễ dàng hơn nhiều đúng không ? Nhưng để chọn được RAM chúng ta còn phải lưu ý khi chọn các linh kiện khác nữa. Và đôi khi chúng ta chọn RAM lại không tương thích với PC hay không sử dụng tối ưu được nó cũng là một điều khá đáng tiếc. Vậy nên trước khi đi mua RAM, các bạn hãy đọc qua phần dưới đây nhé.\r\n\r\n        Khi chúng ta build PC, điều đầu tiên chúng ta phải chú ý đó là Bus RAM hỗ trợ của Mainboard và CPU. VÍ dụ khi chúng ta mua một chiếc Mainboard và CPU có hỗ trợ Bus RAM là 2400Mhz thế nhưng RAM chúng ta mua lại có BUS 2666Mhz thì chiếc RAM của chúng ta chỉ chạy ở Xung tối đa là 2400Mhz và nếu như ngược lại khi RAM có bus 2400 và Mainboard có bus 2666 thì Bộ nhớ đệm cũng sẽ chỉ chạy ở 2400Mhz mà thôi.\r\n        \r\n        Có nghĩa là khi cả 3 linh kiện này được build trên một dàn PC, thì Tần số Xung Bus của Bộ nhớ đệm sẽ hoạt động là Tần số bé nhất mà cả 3 linh kiện này hỗ trợ. Vì vậy các bạn phải chú ý ngay từ khi Build máy nhé.\r\n        \r\n        Ngoài ra, các bạn nên xác định nhu cầu sử dụng PC của mình ở mức nào để mua RAM cho phù hợp. Về cơ bản, điều đầu tiên chúng ta luôn phải quan tâm là ví tiền của chúng ta sẽ cho phép chúng ta làm gì? Nếu bạn là một người khá dư thừa hầu bao thì đừng ngại đầu tư bộ RAM với dung lượng 16GB để có thể hoàn toàn làm chủ được mọi công việc từ tần suất thấp cho đến cao.\r\n        \r\n        Và đương nhiên một điều không thể không quan tâm mỗi khi build case là tối ưu hóa tốc độ bằng công nghệ Dual Channel. Công nghệ này có thể hiểu đơn giản là khi bạn sử dụng 2 chiếc ram y hệt nhau và cắm vào 2 khe RAM có sử dụng một công nghệ mà có thể tăng gấp đôi tốc độ nhập xuất dữ liệu của RAM và đồng thời là sẽ giảm độ trễ của quá trình này đi đáng kể.\r\n        \r\n        Trên lí thuyết là thế nhưng khi áp dụng 2 thanh 4gb so với 1 thanh 8GB thì sự ảnh hưởng của nó tới các quá trình khác chỉ hơn tầm 5-10% mà giá lại đắt hơn tầm 300k. Liệu có đáng để đầu tư cho sự tối ưu hóa này không , các bạn sẽ là những người quyết định cuối cùng nhé.</p>\r\n      </div></ul>', '2020-12-07 22:39:20', '2021-01-14 22:54:52'),
(5, 'Ổ cứng', '<h4 class=\"mb-3\" style=\"margin: auto;\">Cách chọn ổ cứng phù hợp với nhu cầu và ngân sách của bạn.</h4>\r\n     \r\n      <p>Ổ cứng là thiết bị lưu trữ tối quan trọng đối với bất kỳ hệ thống nào mà bạn sử dụng hiện nay: máy tính PC, laptop, camera giám sát, camera hành trình, điện thoại, dữ liệu ảnh, video.... Việc mua được 1 ổ cứng tốt và phù hợp với thiết bị hiện có của bạn, không phải ai cũng biết. Có 3 tiêu chí bạn cầm xem xét thật kỹ trước khi mua đó là: mục đích sử dụng, nhà sản xuất và P/P (hiệu năng / giá thành của sản phẩm)</p>\r\n      <ul>\r\n      <img src=\"../public/frontend/image/gt/ocung.jpg\" alt=\"\" style=\"height: 400px\" ;=\"\">\r\n    <p></p>\r\n    <h5>1. Mục đích sử dụng</h5>\r\n    <div class=\"collapse\">\r\n     <p> Hiện tại ổ cứng có công dụng chủ yếu vẫn là lưu trữ dữ liệu, tuy nhiên đối với mỗi hệ thống khác nhau - đáp ứng mục đích sử dụng khác nhau nên cần lựa chọn ổ cứng phù hợp. Cùng xem xét một số ví dụ phổ biến sau đây\r\n\r\n      <br> Ví dụ:  <br>\r\n      \r\n      - Ổ cứng để cài hệ điều hành lắp trong PC: nên lựa chọn SSD để tối ưu tốc độ load win, đem lại trải nghiệm mượt mà hơn rất nhiều so với dòng HDD truyền thống - rất ỳ ạch khi load win <br>\r\n      \r\n      - Ổ cứng để lưu trữ dữ liệu bình thường: bạn nên lựa chọn các dòng ổ cứng HDD giá rẻ, đồng bộ với các phần mềm lưu trữ cloud như Dropbox, Google drive,... <br>\r\n      \r\n      - Ổ cứng để lưu trữ dữ liệu nặng, lớn như phim, ảnh, video: Nên lựa chọn các dòng HDD có dung lượng lớn, hãng uy tín có bảo hành dài như Seagate, Toshiba, Samsung...</p>\r\n      <h5>2. Nhà sản xuất</h5>\r\n      <p> Ổ cứng Western Digital, Ổ cứng Toshiba, Crucial, Ổ cứng Seagate, Samsung, Intel là 6 dòng ổ cứng đang được ưa chuộng nhất trên thị trường hiện nay. Tuy nhiên bạn đặc biệt lưu ý nên mua sản phẩm tại các đơn vi uy tín, được sự ủy quyền chính hãng để nhận được bảo hành và hậu mãi tốt nhất. Tránh mua phải hàng nhái, hàng giả, hàng dựng lại... bởi rủi ro tiền mất tật mang là rất lớn đối với những loại hàng này.</p>\r\n    </div></ul>', '2020-12-07 23:07:43', '2021-01-14 22:56:01'),
(6, 'Card', '<h4 class=\"mb-3\" style=\"margin: auto;\">Những điều cơ bản cần lưu ý khi chọn mua card màn hình</h4>\r\n      <p>Đối với game thủ thì card màn hình được xem là linh kiện quan trọng nhất trong 1 cấu hình chơi game. Tuy nhiên, với sự thay đổi công nghệ liên tục cộng thêm việc có rất nhiều mẫu mã và khiến cho việc lựa chọn card màn hình như hiện nay, việc chọn đúng chiếc card mong muốn không phải là 1 điều dễ dàng.</p>\r\n      <h5>1. Hiệu năng chơi game</h5>\r\n      <p>Đương nhiên đây là một điều cực kì hiển nhiên mà bất kì ai cũng nghĩ tới khi nói về một chiếc card màn hình. Tuy nhiên, không phải ai cũng chọn được cho mình một chiếc card phù hợp, chắc chắn bạn sẽ không muốn rơi vào trường hợp lãng phí như mua RTX 2080 về chỉ để chơi game ở 1080p hoặc quá sức như dùng GTX 1660 để gồng gánh game ở 1440p. Việc biết được các dòng card nào phù hợp cho tùy từng độ phân giải khi chơi game là một điều rất quan trọng mà rất nhiều người bỏ qua.</p>\r\n      <div class=\"collapse\">\r\n      <h5>Độ phân giải 4K (3840 x 2160)</h5>\r\n      <p>Nếu bạn đang sử dụng một chiếc màn hình 4K thì một chiếc card màn hình mạnh mẽ như RTX 2080Ti là rất phù hợp. Với việc là chiếc card chơi game mạnh nhất hiện nay, RTX 2080Ti chắc chắn sẽ đem lại cho bạn trải nghiệm chơi game tuyệt vời với các công nghệ đồ họa mới nhất từ NVIDIA như Ray tracing, DLSS, VRS.Bên cạnh RTX 2080Ti, bạn còn có lựa chọn khác là RTX 2080, tuy hiệu năng chơi game chắc chắn sẽ không thể bằng RTX 2080Ti nhưng bạn sẽ tiết kiệm được 1 số tiền kha khá khi mua RTX 2080 và vẫn đảm bảo đem lại hiệu năng chơi game trên độ phân giải 4K tốt với điều kiện bạn sẽ phải giảm 1 vài thiết lập đồ họa xuống đôi chút.</p>\r\n     \r\n      <img src=\"../public/frontend/image/gt/RTX-2080Ti-wccftech-1.jpg\" alt=\"\" style=\"height:400px; float: left;\"> \r\n      <p>Nếu bạn chủ yếu quan tâm đến hiệu năng chơi game, bạn cần ít nhất là CPU Intel Core i5 hoặc AMD Ryzen 5 tầm trung. Xem xét thêm cả card đồ họa cũng quan trọng ngang ngửa so với bộ xử lý để chơi game, với nhu cầu ở mức chơi game thì cũng không nhất thiết phải sở hữu chip Intel Core i7 hoặc Ryzen 7.</p>\r\n      <h6>Độ phân giải 1440p (2560 x 1440)</h6>\r\n      <p>Mặc dù đem lại trải nghiệm hình ảnh chân thực và sắc nét, nhưng vẫn tồn tại một rào cản khá lớn để có được trải nghiệm chơi game trên độ phân giải 4K chính là giá thành. Cũng vì lý do này mà vẫn rất nhiều người lựa chọn 1440p làm độ phân giải lý tưởng khi chơi game bởi khả năng đem lại chất lượng hình ảnh xuất sắc hơn rất nhiều so với 1080p nhưng lại không yêu cầu phần cứng quá nhiều như 4K.\r\n\r\n        Trong thời gian vừa rồi, ở phân khúc này có rất nhiều lựa chọn khá hấp dẫn như RTX 2070, 2060 thậm chí là ngay cả GTX 1080 và 1070Ti vẫn đem lại hiệu năng trên 1440p rất tốt. Cho tới khi AMD cho ra mắt 2 đại diện của kiến trúc Navi là RX 5700XT và 5700 tại E3 2019 thì cục diện đã thay đổi khá nhiều với hiệu năng chơi game trên 1440p vượt mặt cả RTX 2060 lẫn 2070, tạo nên sức ép khá lớn lên NVIDIA.</p>\r\n      <h6>Độ phân giải 1080p (1920 x 1080)</h6>\r\n      <img src=\"../public/frontend/image/gt/GIGABYTE-GTX-1660Ti-winfuture.jpg\" alt=\"\" style=\"height:400px; float: left;\">  \r\n      <p>Có thể nói độ phân giải 1080p vẫn là lựa chọn của đại đa số game thủ, đặc biệt là những game thủ hard core cần tần số phản hồi nhanh thì độ phân giải 1080p hiện vẫn đang là lựa chọn số 1. Ở phân khúc này, hiện nay GTX 1660Ti là lựa chọn tốt nhất mà game thủ có thể có được, mặc dù không hỗ trợ các công nghệ mới như Ray tracing và DLSS nhưng đổi lại với hiệu năng tương đương với GTX 1070, bạn sẽ có được trải nghiệm chơi game trên 1080p cực kì mượt mà đặc biệt trên những chiếc màn hình có tần số phản hồi nhanh.\r\n             \r\n        Theo sau GTX 1660Ti là GTX 1660 với hiệu năng chơi game trên 1080p rất tốt, tuy hiệu năng sẽ không thể nào bằng được GTX 1660Ti, nhưng GTX 1660 vẫn có hiệu năng được cải thiện rất nhiều so với thế hệ đàn anh GTX 1060 6GB, đủ sức để đem lại cho bạn mãn nhãn khi chơi game ở 1080p.</p>\r\n        <h6>Phân khúc phổ thông</h6>\r\n        <p>Không phải bất kì game thủ nào cũng có điều kiện để tậu cho mình 1 bộ nguồn máy tính có công suất lớn, nên những dòng card màn hình không cần sử dụng nguồn phụ như GTX 1650 là một lựa chọn rất hợp lý. Tuy không thể so sánh với RX 570 về hiệu năng, nhưng với công suất tiêu thụ chỉ ở mức 75W, GTX 1650 vẫn đem lại hiệu năng chơi game khá thuyết phục ở độ phân giải full HD (1080p), cao hơn GTX 1050Ti xấp xỉ 25%. Đem lại trải nghiệm mượt mà ở thiết lập trung bình với phần lớn tựa game ở độ phân giải full HD.</p>\r\n      </div>', '2020-12-07 23:13:53', '2021-01-14 22:57:08'),
(7, 'Vỏ Case', '<h4 class=\"mb-3\" style=\"margin: auto;\">Case máy tính – tầm quan trọng và hướng dẫn chọn lựa</h4>\r\n\r\n      \r\n\r\n      <p>Dạo qua một lượt các mặt báo liên quan đến chủ đề Build PC hiếm khi thấy một bài viết hướng dẫn chọn mua Case máy tính hoàn chỉnh. Phải chăng vì nó vô chi vô giác nhất và vẫn mang tiếng là cái “vỏ” nên anh em build PC quan tâm sau cùng. Biết bao trường hợp dở mếu dở cười đã xảy ra như: vỏ case không khớp main, case máy tính bị bí, case không tương thích với các giải pháp lưu trữ và tản nhiệt…vậy tốt nhất các bạn nên đề phòng.</p>\r\n\r\n      <ul>\r\n\r\n      <img src=\"../public/frontend/image/gt/case.jpg\" alt=\"\" style=\"height: 400px\" ;=\"\">\r\n\r\n    <p>Khác hoàn toàn so với việc bạn mua máy tính đồng bộ, tự build PC là một công việc đem lại rất nhiều trải nghiệm thích thú và đòi hỏi nhiều kinh nghiệm khi phải cân đối từng chút một. Vài yếu tố chủ chốt có thể tạm liệt kê khi chọn mua thùng máy như: kích cỡ, mẫu mã, hình dáng, trường phái, giá thành…cũng khiến newbie cảm thấy đau đầu. Sai một li là đi cả dàn, chính vì vậy bài viết dưới đây sẽ trang bị cho bạn những kiến thức hữu ích giúp cho bạn để tìm mua cho mình một chiếc thùng máy như mong đợi.</p>\r\n\r\n\r\n\r\n    <div class=\"collapse\">\r\n\r\n     <h5>Cách chọn mua Case máy tính</h5>\r\n\r\n\r\n\r\n      <p>Một khi đã lựa chọn đầy đủ linh kiện thiết yếu cho bộ máy tính chơi game, bạn cần một vỏ case để gắn tât cả mọi người vào trong. Chức năng chính của case là để gắn và bảo vệ linh kiện bên trong, hơn nữa là tính thẩm mỹ. Trong phần này, chúng ta sẽ thảo luận 3 bước</p>\r\n\r\n      <h5>BƯỚC 1: CHỌN KÍCH CỠ VỎ CÂY</h5>\r\n\r\n      <p>Yếu tố quan trọng nhất khi chọn vỏ cây là phải xác định vỏ loại nào chứa vừa các linh kiện bạn đã mua. Kích cỡ của case phụ thuộc kích cỡ của mainboard. Có các loại kích cỡ thông thường đối với vỏ cây như sau: ATX, ATX Full Tower, ATX Mid Tower, ATX Mini Tower, MicroATX, MicroATX Mid Tower, Micro ATX Mini Tower, MicroATX Slim Case, Mini-ITX Tower, Mini-ITX Desktop.</p>\r\n\r\n    <ul>\r\n\r\n      <img src=\"../public/frontend/image/gt/case1.PNG\" alt=\"\">\r\n\r\n      <p></p>\r\n\r\n      <h5>BƯỚC 2: XEM XÉT CÁC VỎ CÂY NHIỀU TẢN NHIỆT, LÀM MÁT TỐT</h5>\r\n\r\n      <p>Đừng quá hoảng loạn với cả tá loại vỏ cây như trên vì bạn thông thường chỉ chọn ATX hoặc MicroATX cho các PC chơi game. Thông thường khi chọn mainboard bạn có thể chọn cỡ vỏ case luôn bằng cách nhìn vào tên của main. Ví dụ main Gigabyte B250M Gaming 3 cần vỏ case MicroATX, nhưng main MSI B250 Bazooka cần vỏ case ATX. Khả năng tản nhiệt và thông gió là hai yếu quan trọng khi lựa chọn vỏ case cho máy tính chơi game. Thông thường nếu bạn muốn tản nhiệt đủ làm mát hệ thống, hãy tìm một vỏ Mid Tower đơn giản với vài quạt. Trừ khi bạn định ép xung CPU thì nghiên cứu mua thêm tản nhiệt CPU. Nếu bạn phân vân không biết vỏ cây mình định mua có đủ làm mát cho toàn bộ hệ thống PC hay không thì hãy tìm các review trên mạng để có thêm thông tin.</p>\r\n\r\n      <h5>BƯỚC 3: TÍNH THẨM MỸ – BẠN MUỐN VỎ PC CỦA MÌNH TRÔNG THẾ NÀO?</h5>\r\n\r\n      <p>Một khi đã chọn loại vỏ case PC đạt yêu cầu kỹ thuật thì đến lúc chọn xem vỏ nào đẹp và bạn ưng ý nhất. Vỏ case có nhiều màu sắc, góc cạnh khác nhau và có thể gồm cả hệ thống đèn led sáng.</p>\r\n\r\n    <img src=\"../public/frontend/image/gt/case3.jpg\" alt=\"\">\r\n\r\n    </ul>\r\n\r\n  </div></ul>', '2020-12-07 23:14:14', '2021-01-14 22:59:02'),
(8, 'Tản nhiệt', NULL, '2020-12-07 23:14:29', '2020-12-07 23:14:29'),
(9, 'Màn hình', NULL, '2020-12-11 11:17:31', '2020-12-11 11:17:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `productID`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ba đời nhà tôi mua hàng on mà chưa thấy sản phẩm nào tốt như sản phẩm này !', 20, 1, '2021-01-06 04:29:14', '2021-01-06 04:29:14'),
(3, 'admin', 'alo', 20, 1, '2021-01-06 04:35:55', '2021-01-06 04:35:55'),
(5, 'admin', 'test', 19, 1, '2021-01-06 04:43:20', '2021-01-06 04:43:20'),
(6, 'phuc', 'sản phẩm tốt', 20, 2, '2021-01-18 11:16:18', '2021-01-18 11:16:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_12_07_132053_create_categories_table', 1),
(4, '2020_12_07_132151_create_products_table', 1),
(5, '2020_12_08_062736_create_products_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2020_12_20_060054_create_bills_table', 4),
(8, '2020_12_20_060151_create_bill_details_table', 4),
(9, '2020_12_20_085208_create_customers_table', 5),
(10, '2020_12_22_194654_create_bills_table', 6),
(11, '2020_12_22_194752_create_bill_details_table', 6),
(12, '2020_12_22_194901_create_customers_table', 6),
(13, '2020_12_23_034626_create_bills_table', 7),
(14, '2020_12_23_034753_create_bill_details_table', 7),
(15, '2020_12_23_034941_create_customers_table', 7),
(16, '2020_12_24_052010_create_banner_table', 8),
(17, '2020_12_27_001651_create_replies_table', 9),
(18, '2020_12_27_001843_create_comments_table', 9),
(19, '2021_01_10_090247_create_productdetails_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetails`
--

CREATE TABLE `productdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productID` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productImage2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productImage3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetails`
--

INSERT INTO `productdetails` (`id`, `productID`, `brand`, `guarantee`, `productImage1`, `productImage2`, `productImage3`, `description`, `created_at`, `updated_at`) VALUES
(2, 19, 'INTEL', '36', 'cpui7.webp', 'cpui7-2.webp', 'cpui7-3.webp', '<h4 class=\"font-weight-bold mb-4\">Hiệu suất ở cấp độ mới</h4>\r\n         <p>Bộ xử lý Intel Core i7-9700 thế hệ thứ 9 đưa hiệu năng máy tính để bàn chính lên một cấp độ hoàn toàn mới. i7-9700 với bộ nhớ cache 12MB và công nghệ Intel® Turbo Boost 2.0 điều chỉnh tần số turbo tối đa lên tới 4.70 GHz. Hỗ trợ đa nhiệm với 8 luồng hiệu suất cao được cung cấp bởi 8 lõi với công nghệ siêu phân luồng Intel® (Công nghệ Intel® HT) để giải quyết khối lượng công việc đòi hỏi khắt khe nhất.</p>\r\n              <img src=\"cpu.jpg\" alt=\"\" class=\"img-fluid mx-auto d-block\">\r\n              <h4 class=\"font-weight-bold mb-4\">Các tính năng chính trên Intel Core i7-9700:</h4>\r\n              <ul>\r\n                <li>Tăng tốc dữ liệu khi được ghép nối với bộ nhớ Intel® Optane ™ để truy xuất dữ liệu bạn sử dụng nhiều nhất một cách nhanh chóng.</li>\r\n                <li>Hỗ trợ công nghệ bộ nhớ RAM DDR4, cho phép các hệ thống có thể nâng cấp lên tới 64GB và tốc độ truyền tải lên tới 2666 MT/s.</li>\r\n                <li>Hỗ trợ chipset Intel® Z390 bao gồm khả năng kết nối chưa từng có với tất cả các thiết bị của bạn có tích hợp USB 3.1 Gen 2, Intel® Wireless-AC và hỗ trợ tốc độ Gigabit Wi-Fi.</li>\r\n                <li>Tương thích với chipset Intel® 300 series</li>\r\n              </ul>\r\n              \r\n\r\n  \r\n<div class=\"collapse\">\r\n  <h4 class=\"font-weight-bold mb-4\">Cung cấp sức mạnh xử lý tối ưu</h4>\r\n  <p>Intel Core i7-9700 cung cấp sức mạnh xử lý mạnh mẽ để chơi game, ghi hình hoặc livestream vượt trội hơn so với các thế hệ trước. Công nghệ Intel® Quick Sync Video để phát livestream trực tuyến, ghi hình và xử lý đa nhiệm mà không bị gián đoạn. Khởi động hệ thống với công nghệ bộ nhớ Intel® Optane™ giúp tăng tốc tải và khởi chạy các ứng dụng và trò chơi chỉ trong vài giây.</p>\r\n  <p>Intel Core i7-9700 còn được tích hợp các công nghệ truyền thông tiên tiến mang lại nội dung chất lượng cao cho máy tính để bàn của bạn, bao gồm:</p>\r\n  <p>- Mã hóa/giải mã 10-bit HEVC, giải mã 10-bit VP9:</p>\r\n  <ul>\r\n    <li>Truyền phát trực tiếp các nội dung 4K cao cấp một cách mượt mà từ các nhà cung cấp trực tuyến hàng đầu.</li>\r\n    <li>Cung cấp trải nghiệm xem video 4K trên màn hình kích thước lớn của bạn.</li>\r\n  </ul>\r\n  <p>- Dải động cao (HDR) và Rec. 2020 (Gam màu rộng) cung cấp trải nghiệm xem hình ảnh và video nâng cao.</p>\r\n</div>', '2021-01-10 04:22:53', '2021-01-12 15:20:04'),
(3, 20, 'INTEL', '36', 'cpui5.webp', 'cpui52.webp', 'cpui5-3.webp', '<h3 style=\"text-align: center; \"><b>Giới thiệu về sản phẩm</b></h3><h5 style=\"text-align: center; \">CPU intel Core&nbsp;<a href=\"https://phongvu.vn/bo-vi-xu-ly-cpu-intel-core-i5-9400f-9m-cache-up-to-4-10ghz-p36902.html\" style=\"color: rgb(13, 110, 253); text-decoration-line: underline; font-family: Roboto, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51);\">i5-9400F</span></a><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;đã lên kệ tại Phong Vũ với 6 nhân thuộc dòng Coffee Lake Refresh và được sản xuất trên tiến trình xử lý 14nm của hãng. CPU Intel Core i5-9400F với hậu tố F khá mới mẻ đến từ việc lược giản GPU onboard với I5-9400.&nbsp;CPU Intel Core i5-9400F hướng đến phục vụ các PC hiệu năng trung bình có nhu cầu khai thác khoảng&nbsp;6 nhân vật lý và sở hữu card màn hình rời.&nbsp;</span></h5><p style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: center;\"><br></p><h5 style=\"text-align: center;\"><span style=\"text-align: justify;\"><font color=\"#333333\" face=\"Roboto, sans-serif\" style=\"\"><br></font></span></h5><h5 style=\"text-align: center; \"><b><br></b></h5>\r\n\r\n<img src=\"../public/frontend/image/gt/79.-CPU-Intel-i5-9400F.jpg\" alt=\"\" style=\"height:400px; float: left;\">  \r\n<div class=\"collapse\">\r\nCPU Core i5-9400F có nhân nhưng không có Hyper-Threading (siêu phân luồng) hoạt động ở mức 2.9 – 4.1 GHz, 9 MB cache – bộ nhớ đệm. Hỗ trợ bộ nhớ RAM DDR4-2666 và đòi hỏi công suất TDP là 65 W. Core i5-9400F là một trong những bộ xử lý sáu nhân phổ thông của Intel dành cho máy tính để bàn và do đó sẽ là một trong những CPU rẻ nhất có sáu nhân.\r\n\r\nTrở lại vào tháng 10, Intel đã chính thức công bố ba bộ xử lý Gen Core thứ 9 cho máy tính để bàn: Core i9-9900K và Core i7-9700K tám nhân, cũng như Core i5-9600K sáu nhân. Có giá chát chúa như thường lệ, những CPU này đa nhân, tần số cao và mở khóa ép xung nhắm đến những người đam mê có xu hướng chi tiêu rất nhiều cho phần cứng nói chung. Ngược lại, Core i5-9400F đi kèm với hệ số nhân bị khóa và TDP 65 W, do đó nhắm đến các dàn máy tính PC phổ thông với các card đồ họa rời.\r\n\r\n\r\n </div>', '2021-01-10 04:40:33', '2021-01-14 23:58:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` bigint(20) UNSIGNED NOT NULL,
  `categoryID` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listPrice` int(11) NOT NULL,
  `discountPercent` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productName`, `productImage`, `listPrice`, `discountPercent`, `description`, `created_at`, `updated_at`) VALUES
(19, 2, 'CPU INTEL Core i7-9700 (8C/8T, 3.00 GHz up to 4.70 GHz, 12MB) - 1151-v2', 'cpu.jpg', 8990000, 20, '<ul><li><b>Socket: 1151-v2, Intel Core thế hệ thứ 9</b></li><li><b>Tốc độ: 3.00 GHz up to 4.70 GHz (8nhân, 8 luồng)</b></li><li><b>Bộ nhớ đệm: 12MB</b></li><li><b>Chip đồ họa tích hợp: Intel UHD Graphics 630</b><br><br><br><br></li></ul>', '2020-12-11 09:32:29', '2021-01-12 14:35:27'),
(20, 2, 'CPU Intel Core i5-9400F (6C/6T, 2.9 - 4.1 GHz, 9MB) - LGA 1151-v2', 'cpu1.jpg', 3790000, 2, '<ul><li><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><b>Socket: LGA 1151-v2 , Intel Core thế hệ thứ 9</b></span></li><li><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><b>Tốc độ xử lý: 2.9 - 4.1 GHz ( 6 nhân, 6 luồng</b></span></li><li><span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><b>Bộ nhớ đệm: 9MB<br></b></span><br></li></ul>', '2020-12-11 09:38:35', '2021-01-14 23:36:11'),
(21, 1, 'Mainboard GIGABYTE B365M AORUS ELITE', 'main1.png', 2350000, 8, NULL, '2020-12-11 09:40:01', '2020-12-11 09:40:01'),
(22, 1, 'Mainboard GIGABYTE GA-A320M-S2H', 'main5.jpg', 1290000, 3, NULL, '2020-12-11 09:41:17', '2020-12-11 11:16:40'),
(23, 6, 'Card màn hình ASUS ROG Strix RTX 2060 8GB GAMING', 'vga.jpg', 12990000, 3, NULL, '2020-12-11 09:44:16', '2020-12-11 09:44:16'),
(24, 6, 'Card màn hình MSI GeForce GTX 1050Ti 4GB GDDR5 OCV1', 'vga2.jpg', 4890000, 2, NULL, '2020-12-11 09:47:52', '2020-12-11 09:47:52'),
(25, 9, 'Màn hình Acer 21.5\" HA220QA', 'monitor.jpg', 2910000, 3, NULL, '2020-12-11 10:30:34', '2020-12-11 11:19:58'),
(26, 9, 'Màn Hình HP 21.5\" 22fw 3KS61AA', 'monitor2.jpg', 3290000, 20, NULL, '2020-12-11 10:32:06', '2020-12-11 11:21:32'),
(31, 9, 'Màn Hình cong Samsung 23.5\" LC24F390FHEXXV ', 'mn7.jpg', 3190000, 2, NULL, '2020-12-25 05:23:08', '2020-12-25 06:57:58'),
(32, 9, 'Màn Hình cong Samsung 27\" LC27F397FHEXXV ', 'mn4.jpg', 4790000, 2, '<p><br></p>', '2020-12-25 05:26:05', '2020-12-25 05:26:05'),
(33, 7, 'Case máy tính Sama Jax 10', 'case8.jpg', 690000, 6, NULL, '2020-12-25 05:32:33', '2020-12-25 05:32:33'),
(34, 7, 'Case máy tính Sama M1', 'case7.jpg', 490000, 6, NULL, '2020-12-25 05:35:06', '2020-12-25 05:35:06'),
(35, 7, 'Case máy tính Sama Shadow', 'case3.jpg', 890000, 6, NULL, '2020-12-25 05:36:28', '2020-12-25 05:41:08'),
(36, 7, 'Case máy tính XIGMATEK Gemini Queen - Mid Tower (Hồng)', 'case4.png', 790000, 10, NULL, '2020-12-25 05:38:21', '2020-12-25 05:38:21'),
(41, 1, 'Mainboard MSI H310M PRO-VDH PLUS', 'main33.jpg', 1600000, 10, NULL, '2021-01-14 23:12:01', '2021-01-14 23:12:01'),
(42, 1, 'Mainboard GIGABYTE B365M-DS3H', 'main2.jpg', 1690000, 2, NULL, '2021-01-14 23:13:28', '2021-01-14 23:13:28'),
(43, 1, 'Mainboard ASUS EX-H310M-V3 R2.0', 'main6.jfif', 1690000, 2, NULL, '2021-01-14 23:14:20', '2021-01-14 23:14:20'),
(44, 1, 'Mainboard GIGABYTE GA-H81M-DS2', 'main7.jpg', 2210000, 2, NULL, '2021-01-14 23:15:06', '2021-01-14 23:15:06'),
(45, 1, 'Mainboard MSI B450 TOMAHAWK MAX', 'main8.jfif', 1190000, 2, NULL, '2021-01-14 23:15:49', '2021-01-14 23:15:49'),
(46, 1, 'Mainboard GIGABYTE GA-A320M-S2H SKU: 1810767', 'main5.jpg', 1790000, 2, NULL, '2021-01-14 23:17:13', '2021-01-14 23:17:13'),
(47, 2, 'CPU Intel Core i3-9100F(4C/4T, 3.60 GHz)', 'cpu3.jpg', 2100000, 2, NULL, '2021-01-14 23:18:28', '2021-01-14 23:18:28'),
(48, 2, 'CPU Intel Pentium G5400 (2C/4T, 3.7 GHz, 4MB)', 'cpu2.jpg', 1600000, 2, NULL, '2021-01-14 23:19:17', '2021-01-14 23:20:20'),
(49, 2, 'CPU INTEL Core i5-10400 (6C/12T, 2.90 GHz Up to 4.30 GHz, 12MB) - 1200', 'cpu4.jpg', 2999999, 2, NULL, '2021-01-14 23:21:13', '2021-01-14 23:21:13'),
(50, 2, 'CPU AMD Ryzen 3 3200G (4C/4T, 3.6 GHz - 4.0 GHz', 'cpu5.jfif', 3090000, 2, NULL, '2021-01-14 23:21:52', '2021-01-14 23:24:28'),
(51, 2, 'CPU INTEL Core i7-9200 (8C/8T, 3.00 GHz up to 4.7', 'cpu11.jpeg', 2900000, 2, NULL, '2021-01-14 23:23:05', '2021-01-14 23:23:05'),
(52, 2, 'CPU AMD Ryzen 5 3400G (4C/8T, 3.7 GHz - 4.2 GHz, 4MB) - AM4', 'cpu7.jpeg', 3290000, 2, NULL, '2021-01-14 23:23:38', '2021-01-14 23:26:04'),
(53, 6, 'Card màn hình MSI GeForce GTX 1050Ti 4GB GDDR5', 'card1.jpg', 9000000, 2, NULL, '2021-01-14 23:31:11', '2021-01-14 23:31:11'),
(54, 6, 'Card màn hình GIGABYTE GeForce GTX 1650 4GB', 'card2.png', 11000000, 2, NULL, '2021-01-14 23:32:05', '2021-01-14 23:32:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `name`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'admin', 'ok bạn nhé', 1, '2021-01-12 13:30:40', '2021-01-12 13:30:40'),
(2, 5, 'admin', 'ok', 1, '2021-01-12 13:31:33', '2021-01-12 13:31:33'),
(3, 1, 'phuc', 'tôi cũng vậy', 2, '2021-01-18 11:17:02', '2021-01-18 11:17:02'),
(4, 3, 'phuc', 'ola', 2, '2021-01-18 11:48:13', '2021-01-18 11:48:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeuser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `typeuser`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ieifSEbYK4IyUMlA7yCWbOnnnu3g71kTeMHoNXJULkzb.8gKOQkfi', NULL, 'admin', NULL, '2020-12-22 13:50:54'),
(2, 'phuc', 'phuc@gmail.com', NULL, '$2y$10$MNF4H9AlUpmjl2rmCcMn.O3ZvwbpScxY9Pj4LJYFpRLUApMl8N3fm', NULL, 'user', NULL, '2020-12-19 17:47:11'),
(5, 'nam', 'nam@gmail.com', NULL, '$2y$10$FR7LihhkCMEchaC2kd1vgu7VBM1q.Za/OvgzibhGCd2ZXqYqOqZ7G', NULL, 'user', '2020-12-26 14:48:24', '2020-12-26 14:48:24'),
(7, 'Duy Tân', 'ndtan.19it6@vku.udn.vn', NULL, '$2y$10$U3inBlRKheRlXW20XT6d1eFOZbPiyLJYRHQGjhj9EjYIZ5CrTLGPe', NULL, 'user', '2021-01-18 15:54:30', '2021-01-18 15:54:30');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_category`
-- (See below for the actual view)
--
CREATE TABLE `v_category` (
`countcate` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_quantity`
-- (See below for the actual view)
--
CREATE TABLE `v_quantity` (
`categoryName` varchar(255)
,`quantity` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_category`
--
DROP TABLE IF EXISTS `v_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_category`  AS  select count(`categories`.`categoryID`) AS `countcate` from `categories` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_quantity`
--
DROP TABLE IF EXISTS `v_quantity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_quantity`  AS  select `categories`.`categoryName` AS `categoryName`,count(`products`.`productID`) AS `quantity` from (`categories` join `products` on(`products`.`categoryID` = `categories`.`categoryID`)) group by `categories`.`categoryName` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `customerID` (`customerID`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `products_categoryid_foreign` (`categoryID`);

--
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `bill_details_ibfk_3` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`bill_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
