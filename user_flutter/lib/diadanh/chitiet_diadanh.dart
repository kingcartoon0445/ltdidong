import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:maps_launcher/maps_launcher.dart';
import 'package:user_flutter/Object/diadanhObject.dart';
import 'package:user_flutter/Provider/DiaDanhProvider.dart';
import 'package:user_flutter/baiviet/ListBaiviet.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/colorplush.dart';
import 'package:user_flutter/diadanh/chiase_baiviet.dart';

class ChiTietDiaDanh extends StatefulWidget {
  final DiaDanhObject DD;
  const ChiTietDiaDanh({Key? key, required this.DD}) : super(key: key);

  @override
  _ChiTietDiaDanhState createState() {
    return _ChiTietDiaDanhState(DD: DD);
  }
}

class _ChiTietDiaDanhState extends State<ChiTietDiaDanh> {
  final DiaDanhObject DD;
  _ChiTietDiaDanhState({required this.DD});
  bool daden = false;
  void daDen() async {
    String kt = '0';

    DiaDanhProvider.KtraDD(DD.Dd_Ma).then((value) {
      kt = value;

      if (kt == '1') {
        setState(() {
          daden = true;
        });
      } else {
        setState(() {
          daden = false;
        });
      }
    });
  }

  @override
  initState() {
    super.initState();
    daDen();
  }

  @override
  Widget build(BuildContext context) {
    const Key centerKey = ValueKey<String>('bottom-sliver-list');
    return Scaffold(
      backgroundColor: Colors.white,
      body: Container(
        padding: EdgeInsets.only(left: 20),
        child: Center(
            child: CustomScrollView(
          center: centerKey,
          slivers: <Widget>[
            SliverList(
              key: centerKey,
              delegate: SliverChildListDelegate([
                ThongTinChiTietDiaDanh(DD: DD),
                Text('Bài viết về địa danh',
                    style: cabin_B(context, Color(0xFF7D82BC), 18.0)),
              ]),
            ),
            Lst_baiviet(
              a: 9,
              ma: DD.Dd_Ma,
            ),
          ],
        )),
      ),
      floatingActionButton: Row(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: [
          Container(
            width: 100.0,
            height: 50.0,
            child: new RawMaterialButton(
              shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10),
                  side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
              elevation: 0.0,
              fillColor: daden == true ? Color(0xFF7D82BC) : Colors.white,
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  daden == true
                      ? Text('Đã đến',
                          style: cabin_B(context, Colors.white, 13.0))
                      : Text('Chưa đến',
                          style: cabin_B(context, Color(0xFF7D82BC), 13.0)),
                  daden == true
                      ? SvgPicture.asset(
                          'assets/imgs/svg/check.svg',
                          height: 25,
                          width: 25,
                          color: Colors.white,
                        )
                      : SvgPicture.asset(
                          'assets/imgs/svg/chuaden.svg',
                          height: 25,
                          width: 25,
                          color: Color(0xFF7D82BC),
                        )
                ],
              ),
              onPressed: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(
                        builder: (context) => ChiaSeBaiViet(
                              TTDD: DD,
                            )));
              },
            ),
          ),
          Container(
            width: 200.0,
            height: 50.0,
            child: new RawMaterialButton(
              shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10),
                  side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
              elevation: 0.0,
              fillColor: Color(0xFF7D82BC),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  Text(
                    '200',
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 13,
                      color: Colors.white,
                    ),
                  ),
                  Icon(Icons.share, color: Colors.white),
                ],
              ),
              onPressed: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(
                        builder: (context) => ChiaSeBaiViet(
                              TTDD: DD,
                            )));
              },
            ),
          )
        ],
      ),
    );
  }
}

class AnhDiaDanh extends StatelessWidget {
  final DiaDanhObject DD;
  const AnhDiaDanh({Key? key, required this.DD}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: EdgeInsets.only(top: 35),
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
                itemCount: DD.ADD.length, //đếm ảnh
                itemBuilder: (context, index) => Stack(
                  children: [
                    Container(
                      child: ListTile(
                        trailing: Opacity(
                            opacity: 0.5,
                            child: Container(
                              child: Text(
                                (index + 1).toString() +
                                    "/" +
                                    (DD.ADD.length).toString(),
                                style: cabin_B(context, Colors.white, 18.0),
                              ),
                              color: Color(0XFF030303),
                            )),
                      ),
                    ),
                    Container(
                      margin: EdgeInsets.only(right: 30),
                      width: double.maxFinite,
                      decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(25),
                          image: DecorationImage(
                            image:
                                NetworkImage(httpsanh + DD.ADD[index].ADD_Anh),
                            fit: BoxFit.cover,
                          )),
                    ),
                  ],
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
  final DiaDanhObject DD;
  const ThongTinChiTietDiaDanh({Key? key, required this.DD}) : super(key: key);

  @override
  _ThongTinChiTietDiaDanhState createState() {
    return _ThongTinChiTietDiaDanhState(DD: DD);
  }
}

class _ThongTinChiTietDiaDanhState extends State<ThongTinChiTietDiaDanh> {
  final DiaDanhObject DD;
  _ThongTinChiTietDiaDanhState({required this.DD});
  @override
  Widget build(BuildContext context) {
    return Container(
      child: Column(
        children: [
          AnhDiaDanh(DD: DD),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Expanded(
                child: Text(
                  DD.Dd_Ten,
                  style: cabin_B(context, Color(0xFF7D82BC), 22.0),
                ),
              )
            ],
          ),
          SizedBox(
            height: 10,
          ),
          ElevatedButton.icon(
            style: ElevatedButton.styleFrom(primary: Color(0xFF7D82BC)),
            onPressed: () => MapsLauncher.launchCoordinates(
              double.parse(DD.Dd_KinhDo),
              double.parse(DD.Dd_ViDo),
              'gg map here',
            ),
            icon: Icon(Icons.location_on, color: Colors.white),
            label: Text(DD.Dd_DiaChi,
                overflow: TextOverflow.ellipsis,
                style: cabin_B(context, Colors.white, 16.0)),
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              RatingBarIndicator(
                rating: DD.Dd_DanhGia - 0.1,
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
              Icon(Icons.description),
              Expanded(
                child: Text(
                  'Mô tả',
                  style: TextStyle(
                    fontSize: 18,
                  ),
                ),
              )
            ],
          ),
          SizedBox(
            height: 3,
          ),
          Row(
            children: [
              Expanded(
                child: Text(
                  DD.Dd_MoTa,
                  style: TextStyle(
                    fontSize: 14,
                  ),
                ),
              ),
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Icon(Icons.class_),
              Expanded(
                child: Text(
                  'Loại hình du lịch',
                  style: TextStyle(
                    fontSize: 18,
                  ),
                ),
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Expanded(
                child: Text(
                  'Tham quan',
                  style: TextStyle(
                    fontSize: 14,
                  ),
                ),
              )
            ],
          ),
          SizedBox(
            height: 5,
          ),
          Row(mainAxisAlignment: MainAxisAlignment.start, children: [
            Icon(Icons.restaurant_outlined),
            Expanded(
              child: Text(
                'Nhà hàng',
                style: TextStyle(
                  fontSize: 18,
                ),
              ),
            )
          ]),
          Row(mainAxisAlignment: MainAxisAlignment.start, children: [
            Expanded(
              child: LayDsNhaHang(DD.Dd_Ma),
            )
          ]),
          SizedBox(
            height: 10,
          ),
          Row(mainAxisAlignment: MainAxisAlignment.start, children: [
            Icon(Icons.hotel_outlined),
            Expanded(
              child: Text(
                'Khách sạn',
                style: TextStyle(
                  fontSize: 18,
                ),
              ),
            )
          ]),
          Row(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [Expanded(child: LayDsKhachSan(DD.Dd_Ma))]),
          SizedBox(
            height: 20,
          ),
        ],
      ),
    );
  }
}
