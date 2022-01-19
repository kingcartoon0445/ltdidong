import 'package:flutter/material.dart';
import 'package:flutter_advanced_switch/flutter_advanced_switch.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Hoang/login/page_login.dart';
import 'package:user_flutter/colorplush.dart';

class CaiDat extends StatefulWidget {
  const CaiDat({Key? key}) : super(key: key);

  @override
  _CaiDatState createState() => _CaiDatState();
}

class _CaiDatState extends State<CaiDat> {
  final controller1 = ValueNotifier<bool>(false);
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Container(
        color: Colors.white,
        margin: EdgeInsets.only(left: 20, right: 20,top: 10),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                Text(
                  "Cài đặt",
                  style: cabin_B(Color(0xFF7D82BC), 40.0),
                ),
                Image.asset(
                  "assets/logo/logoxanh.png",
                  width: 200,
                  height: 200,
                ),
              ],
            ),
            Text(
              "Thông tin",
              style: cabin_B(Colors.black, 25.0),
            ),
            Container(
              decoration: BoxDecoration(
                  color: Color(0xFF7D82BC),
                  borderRadius: BorderRadius.circular(25.0)),
              padding:
                  EdgeInsets.only(left: 20, bottom: 40, top: 10, right: 20),
              child: Column(
                children: [
                  ListTile(
                    leading: Text(
                      "Tên người dùng:",
                      style: cabin_B(Colors.black, 20.0),
                    ),
                    title: Text(
                      "Thanh Dui",
                      style: cabin_B(Colors.white, 20.0),
                    ),
                  ),
                  Container(
                    padding: EdgeInsets.only(left: 20, right: 20),
                    color: Colors.white,
                    height: 2,
                    width: double.infinity,
                  ),
                  ListTile(
                    leading: Text(
                      "Địa chỉ:",
                      style: cabin_B(Colors.black, 20.0),
                    ),
                    title: Text(
                      "Nhà Thanh Dui",
                      style: cabin_B(Colors.white, 20.0),
                    ),
                  ),
                  Container(
                    padding: EdgeInsets.only(left: 20, right: 20),
                    color: Colors.white,
                    height: 2,
                    width: double.infinity,
                  ),
                  ListTile(
                    leading: Text(
                      "SDT:",
                      style: cabin_B(Colors.black, 20.0),
                    ),
                    title: Text(
                      "03061323",
                      style: cabin_B(Colors.white, 20.0),
                    ),
                  ),
                  Container(
                    padding: EdgeInsets.only(left: 20, right: 20),
                    color: Colors.white,
                    height: 2,
                    width: double.infinity,
                  ),
                ],
              ),
            ),
            Container(
              padding: EdgeInsets.all(10),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Text(
                    "Chế độ riêng tư",
                    style: cabin_B(Colors.black, 25.0),
                  ),
                  AdvancedSwitch(
                    activeChild: SvgPicture.asset(
                      "assets/imgs/svg/thay.svg",
                      color: Colors.white,
                    ),
                    inactiveChild: SvgPicture.asset(
                        "assets/imgs/svg/khongthay.svg",
                        color: Colors.white),
                    activeColor: Color(0xFF7D82BC),
                    inactiveColor: Color(0xFF7D82BC),
                    width: 60,
                    controller: controller1,
                  ),
                ],
              ),
            ),
            Container(
              padding: EdgeInsets.only(left: 300, right: 30),
              color: Colors.black,
              height: 2,
              width: double.infinity,
            ),
            SizedBox(
              width: double.infinity,
              child: TextButton(
                onPressed: () {},
                child: Row(
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Text("Đổi mật khẩu", style: cabin_B(Colors.black, 25.0))
                    ]),
              ),
            ),
            Container(
              padding: EdgeInsets.only(left: 300, right: 30),
              color: Colors.black,
              height: 2,
              width: double.infinity,
            ),
            SizedBox(
              width: double.infinity,
              child: TextButton(
                onPressed: () {
                    Navigator.of(context).pushAndRemoveUntil(MaterialPageRoute(builder:(context)=>LoginPage()), (route) => false);
                },
                child: Text("Đăng xuất", style: cabin_B(Colors.white, 25.0)),
                style: ButtonStyle(
                  backgroundColor: MaterialStateProperty.all<Color>( Color(0xFF7D82BC)),
                  shape: MaterialStateProperty.all(RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(30.0))),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
