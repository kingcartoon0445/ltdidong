<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaDanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
    DB::table('dia_danhs')->insert([
        'Ten' =>'Vịnh Hạ Long',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'1',
        'KinhDo'=>'12345',
        'ViDo'=>'54321',
        'DiaChi'=>'Vịnh Hạ Long',
        'MoTa'=>'Vịnh Hạ Long là một vịnh nhỏ thuộc phần bờ tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo của thành phố Hạ Long thuộc tỉnh Quảng Ninh'
    ]);
    //2
    DB::table('dia_danhs')->insert([
        'Ten' =>'Huế',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'2',
        'KinhDo'=>'12345',
        'ViDo'=>'231231',
        'DiaChi'=>'Huế',
        'MoTa'=>'Huế là thành phố tỉnh lỵ của tỉnh Thừa Thiên Huế, Việt Nam. Huế từng là kinh đô của Việt Nam thời phong kiến dưới triều Tây Sơn và triều Nguyễn. Hiện nay, thành phố là một trong những trung tâm về văn hóa  du lịch, y tế chuyên sâu, giáo dục đào tạo, khoa học công nghệ của Miền Trung Tây Nguyên và cả nước.'
    ]);
    //3
    DB::table('dia_danhs')->insert([
      'Ten' =>'Cà Mau',
      'AnhBia'=>'diadanh.jpg',
      'MaMien'=>'3',
      'KinhDo'=>'132131',
      'ViDo'=>'12313121',
      'DiaChi'=>'Cà Mau',
      'MoTa'=>'Tỉnh Cà Mau mang đặc trưng của khí hậu nhiệt đới gió mùa cận xích đạo, với nền nhiệt độ cao vào loại trung bình trong tất cả các tỉnh Đồng bằng sông Cửu Long. Khí hậu Cà Mau được chia thành 2 mùa là mùa mưa và mùa khô.'
    ]);
    //4
    DB::table('dia_danhs')->insert([
        'Ten' =>'Làng hoa Sa Đéc',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'3',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'Đường Hoa Sa Đéc, Tân Qúy Đông, Sa Đéc, Đồng Tháp, Việt Nam',
        'MoTa'=>'Đồng Tháp là vùng đất nổi tiếng với những di tích lịch sử, văn hóa có giá trị cùng nghệ thuật ẩm thực độc đáo… và đặc biệt là làng hoa kiểng Sa Đéc – thủ phủ hoa của miền Tây. Làng hoa Sa Đéc (tỉnh Đồng Tháp) khởi nguyên là Làng hoa Tân Quy Đông, một làng nghề truyền thống hơn 100 năm tuổi. Nằm bên bờ sông Tiền quanh năm lộng gió, màu mỡ phù sa, ngập tràn ánh nắng, và được mệnh danh là xứ sở của các loài hoa kiểng. Du lịch Đồng Tháp, đến với làng hoa Sa Đéc, bạn sẽ được chiêm ngưỡng cảnh tượng ngoạn mục với muôn vàn loài hoa khoe sắc, tỏa ngát hương thơm.'
      ]);
      //5
      DB::table('dia_danhs')->insert([
        'Ten' =>'Miếu Bà Chúa Xứ',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'3',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'132 Châu Thị Tế, P. Núi Sam, Châu Đốc, An Giang, Việt Nam',
        'MoTa'=>'Miếu Bà Chúa Xứ là một di tích lịch sử tâm linh vô cùng quan trọng của An Giang. Nơi đây còn là một công trình tôn giáo đẹp và tôn nghiêm của miền Tây. Từ ngôi nhà gỗ vách lá ngày xưa, đến nay đã trở thành một ngôi miếu lộng lẫy với nét kiến trúc mang đậm nét văn hóa phương Đông. Mỗi năm, chùa Bà thu hút gần 2 triệu lượt người đến cúng bái, kể cả những du khách nước ngoài đến khám phá.'
      ]);
      //6
      DB::table('dia_danhs')->insert([
        'Ten' =>'Shophouse The Center Địa Trung Hải Phú Quốc',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'3',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'Thị Trấn Địa Trung Hải, Ga Cáp Treo, An Thới, Phú Quốc, Kiên Giang, Việt Nam',
        'MoTa'=>'Lấy cảm hứng từ nét kiến trúc Taormina độc đáo, từng căn nhà tại The Center mở ra một bức tranh tuyệt mỹ nhờ vào những vòm cửa sổ cao, mở rộng hướng biển. Được xây dựng trên triền đồi, từng cảnh quan tại The Center đều lưu giữ chất sống miền Địa Trung Hải với những bậc đá tinh xảo, vườn hoa, đài phun nước lãng mạn đan xen trong từng lối đi. Chú trọng sự tinh tế trong nghệ thuật tạo màu, The Center được sử dụng những bước chuyển màu điêu luyện do các họa sĩ chuyên nghiệp thực hiện biến những bức tường nhà trở nên nền nã hòa quyện với sắc màu thiên nhiên, mang đến sự đối lập tương hỗ khi đặt cạnh cổ trấn Amalfi đối diện.'
      ]);
      //7
      DB::table('dia_danhs')->insert([
        'Ten' =>'Vườn Quốc Gia Mũi Cà Mau',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'3',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'Ngọc Hiển, Cà Mau, Việt Nam',
        'MoTa'=>'Nằm trong quần thể Vườn Quốc Gia Mũi Cà Mau, Mũi Cà Mau là mảnh đất nhô ra biển trên đất liền của cực nam đất nước, nơi đây đặt cột mốc toạ độ quốc gia GPS001 (một trong 4 cột mốc ở 4 cực của đất nước). Đến nơi đây bạn sẽ cảm nhận đất trời bao la, sông nước mênh mang, không khí trong lành với những cánh rừng đước xanh mướt ngút ngàn cùng những đầm tôm, cua ngập nước bao la của những cư dân Cà Mau chất phác, hiền hoà. Ngoài ra, những món ăn ngon đặc sản của vùng đất này bạn không thể bỏ qua như: cua, tôm, sò huyết, cá thòi lòi....Đặc biệt, bạn hãy giành chút thời gian ngắm ráng chiều tại Mũi Cà Mau để nhớ mãi vùng đất thân thương này!'
      ]);
      //8
      DB::table('dia_danhs')->insert([
        'Ten' =>'Bãi Biển Đồi Nhái',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'3',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'95Q4+JHC, Phường 11, Thành phố Vũng Tầu, Bà Rịa - Vũng Tàu, Việt Nam',
        'MoTa'=>'Bãi biển này chưa được khai thác du lịch, rất hoang sơ, vui chơi cắm trại rất phù hợp. Chưa có sự quản lý nện còn vứt rát bừa bải, mình mong mọi người đến đây chơi thì giữ gìn vệ sinh cho môi trường này thật sạch, để mọi người có thể đến chơi và được tắm biển, tổ chức bic nic rất vui. vị trí rất dễ đền, nều ai đi đến đường đô lương thì chỉ cần đi một hướng ra biển là đã đến nơi. Khu vực rộng rãi nên xe lớn nhỏ rất thuận tiện.'
      ]);
      //9
      DB::table('dia_danhs')->insert([
        'Ten' =>'Chùa Cầu - địa điểm du lịch Hội An nổi tiếng',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'2',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'186 Trần Phú, Phường Minh An, Hội An, Quảng Nam, Việt Nam',
        'MoTa'=>'Chùa Cầu được mệnh danh là linh hồn, là biểu tượng của người dân phố Hội. Với nét kiến trúc độc đáo giữa lòng Hội An, chùa Cầu trên dòng sông Hoài thơ mộng đã trở một địa điểm du lịch Hội An đốn tim biết bao du khách.'
      ]);
      //10
      DB::table('dia_danhs')->insert([
        'Ten' =>'Bãi biển Cửa Đại',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'2',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'Hội An, Quang Nam, Việt Nam',
        'MoTa'=>'Bãi biển Cửa Đại là một trong những bãi biển đẹp nhất Việt Nam, sánh ngang với bãi biển Mỹ Khê - Đà Nẵng hay bãi Sao - Phú Quốc. Cho đến thời điểm hiện tại, dù các khu nghỉ dưỡng ở Hội An liên tục xuất hiện nhưng bãi biển Cửa Đại vẫn giữ được không gian tĩnh lặng, yên bình và trong lành vốn có.'
      ]);
      //11
      DB::table('dia_danhs')->insert([
        'Ten' =>'Núi Ngũ Hành Sơn',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'2',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'81 Huyền Trân Công Chúa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng, Việt Nam',
        'MoTa'=>'Điểm tham quan Đà Nẵng Ngũ Hành Sơn là tên gọi 6 ngọn núi, bao gồm: Kim Sơn, Mộc Sơn, Thủy Sơn, Thổ Sơn, Hỏa Sơn (Dương Hỏa Sơn và  m Hỏa Sơn). Những ngọn núi Đá vôi nằm dọc ven biển mang nét đẹp độc đáo hội tụ núi, biển, tâm linh thu hút du khách trong và ngoài nước đến tham quan, khám phá. Ngũ Hành Sơn là một trong 10 địa điểm du lịch Đà Nẵng nổi bật nhất và được công nhận là di tích Lịch sử Văn hóa cấp Quốc gia.'
      ]);
      //12
      DB::table('dia_danhs')->insert([
        'Ten' =>'Thánh địa Mỹ Sơn',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'2',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'Đường vào Mỹ Sơn, Thánh địa Mỹ Sơn, Duy Xuyên, Quảng Nam, Việt Nam',
        'MoTa'=>'Thánh địa Mỹ Sơn là một trong những địa điểm du lịch gần Đà Nẵng hấp dẫn du khách. Nơi đây đã được Unesco công nhận là Di sản Văn hóa Thế giới vào năm 1999. Đến đây, du khách sẽ được chiêm ngưỡng các công trình kiến trúc độc đáo của người Chăm-pa xưa. Tổ hợp đền đài nằm giữa thung lũng, bao quanh là đồi núi, cây cối mang vẻ đẹp huyền bí, lôi cuốn du khách gần xa đến khám phá, tìm hiểu khi tham quan các địa điểm du lịch Đà Nẵng Quảng Nam.  '
      ]);
      //13
      DB::table('dia_danhs')->insert([
        'Ten' =>' Đại nội Huế',
        'AnhBia'=>'diadanh.jpg',
        'MaMien'=>'2',
        'KinhDo'=>'132131',
        'ViDo'=>'12313121',
        'DiaChi'=>'FH9H+9CQ, Phú Hậu, Thành phố Huế, Thừa Thiên Huế, Việt Nam',
        'MoTa'=>'Đại nội Huế là địa điểm du lịch Huế hội tụ các nét đẹp kiến trúc đỉnh cao của thời đại phong kiến nhà Nguyễn, được xây dựng cách đây hàng trăm năm với diện tích vô cùng đồ sộ, có hơn 100 công trình kiến trúc lộng lẫy như: Ngọ Môn, Cung Diên Thọ, Tử Cấm Thành, Điện Thái Hòa được bố trí hài hòa, hợp lý.'
      ]);
      //14
      //15
      //16
    }
}

