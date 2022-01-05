import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:user_flutter/diadanh/chiase_baiviet.dart';

class ChiTietDiaDanh extends StatefulWidget {
  const ChiTietDiaDanh({Key? key}) : super(key: key);

  @override
  _ChiTietDiaDanhState createState() => _ChiTietDiaDanhState();
}

class _ChiTietDiaDanhState extends State<ChiTietDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Material(
        child: Container(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              AnhDiaDanh(),
              ThongTinChiTietDiaDanh(),
            ],
          ),
        ),

        /*Container(
        width: double.maxFinite,
        height: double.maxFinite,
        child: */
        /*Stack(
          children: [*/
        /*  Positioned(
              left: 0,
              right: 0,
              child: Container(
                width: double.maxFinite,
                height: 320,
                decoration: BoxDecoration(
                  image: DecorationImage(
                      image: AssetImage("assets/imgs/diadanh/VungTau.png"),
                      fit: BoxFit.cover),
                ),
              ),
            ), 
            */
      ),
    );
  }
}

class AnhDiaDanh extends StatelessWidget {
  const AnhDiaDanh({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.only(top: 30),
      child: SizedBox(
        width: double.maxFinite,
        height: 200,
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            Expanded(
              flex: 3,
              child: PageView.builder(
                onPageChanged: (value) {},
                controller:
                    PageController(viewportFraction: 0.8, initialPage: 0),
                itemCount: 3, //đếm ảnh
                itemBuilder: (context, index) => Container(
                  margin: EdgeInsets.only(right: 30),
                  width: double.maxFinite,
                  decoration: BoxDecoration(
                      borderRadius: BorderRadius.circular(25),
                      image: DecorationImage(
                        image: AssetImage("assets/imgs/diadanh/VungTau.png"),
                        fit: BoxFit.cover,
                      )),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}

class ThongTinChiTietDiaDanh extends StatefulWidget {
  const ThongTinChiTietDiaDanh({Key? key}) : super(key: key);

  @override
  _ThongTinChiTietDiaDanhState createState() => _ThongTinChiTietDiaDanhState();
}

class _ThongTinChiTietDiaDanhState extends State<ThongTinChiTietDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return Expanded(
      child: Container(
        padding: EdgeInsets.symmetric(horizontal: 12),
        child: ListView(
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text(
                  'Hạ Long',
                  style: TextStyle(
                    fontSize: 22,
                  ),
                ),
                Row(
                  children: [
                    Icon(
                      Icons.remove_red_eye_outlined,
                      color: Color(0xFF7D82BC),
                    ),
                    Text('200'),
                  ],
                ),
              ],
            ),
            SizedBox(
              height: 10,
            ),
            Row(
              children: [
                Icon(Icons.location_on, color: Color(0xFF7D82BC)),
                SizedBox(
                  width: 5,
                ),
                Text(
                  'Hạ Long,Quảng Ninh',
                  style: TextStyle(
                    fontSize: 16,
                  ),
                )
              ],
            ),
            SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                RatingBarIndicator(
                  rating: 4.5,
                  itemBuilder: (_, __) {
                    return Icon(
                      Icons.star,
                      color: Colors.amber,
                    );
                  },
                  itemSize: 25,
                ),
              ],
            ),
            SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                Text(
                  'Mô tả',
                  style: TextStyle(
                    fontSize: 18,
                  ),
                ),
              ],
            ),
            SizedBox(
              height: 3,
            ),
            Text(
              'Vịnh Hạ Long là một vịnh nhỏ thuộc phần bờ Tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo thuộc thành phố Hạ Long, thị xã Cẩm Phả và một phần của huyện đảo Vân Đồn. Vịnh Hạ Long giáp đảo Cát Bà với đường bờ biển dài 120 km cùng gần 2000 hòn đảo lớn nhỏ.',
              style: TextStyle(
                fontSize: 14,
              ),
            ),
            SizedBox(
              height: 10,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                Text(
                  'Loại hình du lịch',
                  style: TextStyle(
                    fontSize: 18,
                  ),
                ),
              ],
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                Text(
                  'Tham quan',
                  style: TextStyle(
                    fontSize: 14,
                  ),
                ),
              ],
            ),
            SizedBox(
              height: 5,
            ),
            Row(mainAxisAlignment: MainAxisAlignment.start, children: [
              Text(
                'Nhà hàng',
                style: TextStyle(
                  fontSize: 18,
                ),
              ),
            ]),
            Row(mainAxisAlignment: MainAxisAlignment.start, children: [
              Text(
                'Nhà hàng Hạ Long',
                style: TextStyle(
                  fontSize: 14,
                ),
              ),
            ]),
            SizedBox(
              height: 10,
            ),
            Row(mainAxisAlignment: MainAxisAlignment.start, children: [
              Text(
                'Khách sạn',
                style: TextStyle(
                  fontSize: 18,
                ),
              ),
            ]),
            Row(mainAxisAlignment: MainAxisAlignment.start, children: [
              Text(
                'Khách sạn Hạ Long',
                style: TextStyle(
                  fontSize: 14,
                ),
              ),
            ]),
            SizedBox(
              height: 20,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                FloatingActionButton.extended(
                  onPressed: () {
                    // Add your onPressed code here!
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "Đã đến",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(
                    Icons.check,
                    color: Color(0xFF7D82BC),
                  ),
                  heroTag: "fab1",
                ),
                FloatingActionButton.extended(
                  onPressed: () {
                    // Add your onPressed code here!
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "Địa chỉ",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(Icons.location_on, color: Color(0xFF7D82BC)),
                  heroTag: "fab2",
                ),
                FloatingActionButton.extended(
                  onPressed: () {
                    // Add your onPressed code here!
                    Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) => ChiaSeBaiViet()));
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "200",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(Icons.share, color: Color(0xFF7D82BC)),
                  heroTag: "fab3",
                ),
              ],
            )
          ],
        ),
      ),
    );
  }
}
