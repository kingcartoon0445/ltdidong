import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/baiviet/ListBaiviet.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/colorplush.dart';

class thongtin extends StatefulWidget {
  const thongtin({Key? key}) : super(key: key);

  @override
  _thongtinState createState() => _thongtinState();
}

class _thongtinState extends State<thongtin> {
  List<String> a = [];
  @override
  var _visible = true;
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Column(
        children: [
           Container(
            child: Column(crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                  decoration: BoxDecoration(
                    color: Color(0xFF7D82BC),
                    borderRadius: BorderRadius.only(
                        bottomRight: Radius.circular(40),
                        bottomLeft: Radius.circular(40)),
                  ),
                  height: 170,
                  width: 360,
                  child: Padding(
                    padding: EdgeInsets.all(15),
                    child: Row(
                      crossAxisAlignment: CrossAxisAlignment.center,
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        Column(
                            mainAxisAlignment: MainAxisAlignment.end,
                            children: [
                              CircleAvatar(radius: 50, child: Text("s")),
                            ]),
                        Text(
                          "Đen vâu",
                          style: cabin_B(Colors.white, 25),
                        )
                      ],
                    ),
                  ),
                ),
                Container(
                  padding: EdgeInsets.only(left: 20),
                  child: Text(
                    "Thông tin",
                    style: cabin_B(Colors.black, 20),
                  ),
                ),
                Container(
                  color: Colors.white,
                  padding: EdgeInsets.only(left: 40, top: 10),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      //nút đã đến
                      nut_Icon(
                          SvgPicture.asset(
                            'assets/imgs/svg/daden.svg',
                            width: 20,
                            height: 20,
                          ),
                          Text(
                            "Địa điểm đã đến",
                            style: cabin(Color(0xFF4C56CE), 15),
                          ),
                          context),
                      //nút địa chỉ
                      nut_Icon(
                          SvgPicture.asset(
                            'assets/imgs/svg/home.svg',
                            width: 20,
                            height: 20,
                          ),
                          Text(
                            "Địa chỉ",
                            style: cabin(Color(0xFF4C56CE), 15),
                          ),
                          context),
                      //nút số điện thoại
                      nut_Icon(
                          Icon(
                            Icons.phone_android,
                            size: 20,
                            color: Colors.black,
                          ),
                          Text(
                            "031289412",
                            style: cabin(Color(0xFF4C56CE), 15),
                          ),
                          context),
                    ],
                  ),
                ),
                Container(
                  padding: EdgeInsets.only(left: 20),
                  child: Text(
                    "Danh sách bài viết đã đăng",
                    style: cabin_B(Colors.black, 20),
                  ),
                ),
                
              ],
            ),
          ),
      ]),
    );
  }
}
