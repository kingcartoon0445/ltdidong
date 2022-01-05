import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/baiviet/ListBaiviet.dart';
import 'package:user_flutter/class_chung.dart';

class ChiTiet extends StatefulWidget {
  final BaiVietObject Bai;
  const ChiTiet({Key? key, required this.Bai}) : super(key: key);

  @override
  _ChiTietState createState() {
    return _ChiTietState(Bai: Bai);
  }
}

class _ChiTietState extends State<ChiTiet> {
  final BaiVietObject Bai;
  _ChiTietState({required this.Bai});
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.white,
        elevation: 0.0,
      ),
      body: Material(
        child: Container(
          child: Stack(children: [
            Container(
                height: size.height * 227 / 640,
                width: double.maxFinite,
                decoration: BoxDecoration(),
                child: PageView.builder(
                  itemCount: 3,
                  itemBuilder: (context, index) => Container(
                    width: double.maxFinite,
                    decoration: BoxDecoration(
                        image: DecorationImage(
                      image: AssetImage("assets/imgs/baiviets/test.jpg"),
                      fit: BoxFit.cover,
                    )),
                  ),
                )),
            Container(
              margin: EdgeInsets.only(top: size.height * 0.27),
              padding: EdgeInsets.only(top: 10),
              height: size.height * 600 / 640,
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.only(
                    topLeft: Radius.circular(25),
                    topRight: Radius.circular(25)),
              ),
              child: Column(
                children: [
                  Container(
                    child: ListTile(
                        leading: Text(
                          Bai.Bv_TieuDe,
                          style: TextStyle(
                              fontSize: 25,
                              fontFamily: 'Cabin_B',
                              fontWeight: FontWeight.bold,
                              overflow: TextOverflow.clip),
                        ),
                        title: Row(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            Icon(
                              Icons.remove_red_eye_outlined,
                              size: 24,
                              color: Color(0xFF4C56CE),
                            ),
                            Text(" 200",
                                style: TextStyle(
                                    fontSize: 15,
                                    fontFamily: 'Cabin_B',
                                    fontWeight: FontWeight.bold,
                                    color: Color(0xFF828282))),
                          ],
                        )),
                  ),
                  Container(
                      child: ListTile(
                    leading: ElevatedButton.icon(
                      onPressed: () {},
                      style: ElevatedButton.styleFrom(
                          primary: Colors.white, elevation: 0),
                      icon: SvgPicture.asset(
                        'assets/imgs/svg/gps.svg',
                        color: Color(0xFF4C56CE),
                        height: size.height * 20 / 640,
                        width: 20,
                      ),
                      label: tenDD(Bai.Bv_MaDiaDanh,Color(0xFF828282),15.0),
                    ),
                    trailing: ElevatedButton.icon(
                      onPressed: () {},
                      style: ElevatedButton.styleFrom(
                          primary: Colors.white, elevation: 0),
                      icon: SvgPicture.asset(
                        'assets/imgs/svg/user.svg',
                        height: size.height * 20 / 640,
                        width: size.width * 20 / 360,
                        color: Color(0xFF4C56CE),
                      ),
                      label: tenND(Bai.Bv_MaNguoiDung, Color(0xFF828282) , 15)
                    ),
                  )),
                  Expanded(
                    child: Container(
                      child: ListView(
                        children: [
                          Padding(
                            padding: EdgeInsets.only(
                                right: 30, left: 30, top: 3, bottom: 90),
                            child: Text(
                              Bai.Bv_NoiDung,
                              style: TextStyle(
                                  fontFamily: 'Cabin_B',
                                  overflow: TextOverflow.clip),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ]),
        ),
      ),
      floatingActionButton: Row(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          crossAxisAlignment: CrossAxisAlignment.center,
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
                "200",
                style: TextStyle(
                  fontWeight: FontWeight.bold,
                  fontSize: 15,
                  color: Color(0xFF7D82BC),
                ),
              ),
              icon: SvgPicture.asset('assets/imgs/svg/like.svg',
                  color: Color(0xFF7D82BC)),
              heroTag: "fab1",
            ),
            FloatingActionButton.extended(
              onPressed: () {
                setState(() {});
              },
              shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10),
                  side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
              backgroundColor: Colors.white,
              label: Text(
                "200",
                style: TextStyle(
                  fontWeight: FontWeight.bold,
                  fontSize: 15,
                  color: Color(0xFF7D82BC),
                ),
              ),
              icon: SvgPicture.asset('assets/imgs/svg/unlike.svg',
                  color: Color(0xFF7D82BC)),
              heroTag: "fab2",
            ),
            FloatingActionButton.extended(
              onPressed: () {
                // Add your onPressed code here!
              },
              shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10),
                  side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
              backgroundColor: Color(0xFF7D82BC),
              label: Text(
                "200",
                style: TextStyle(
                  fontWeight: FontWeight.bold,
                  fontSize: 15,
                  color: Colors.white,
                ),
              ),
              icon: SvgPicture.asset(
                'assets/imgs/svg/share.svg',
                color: Colors.white,
              ),
              heroTag: "fab3",
            ),
          ]),
    );
  }
}
