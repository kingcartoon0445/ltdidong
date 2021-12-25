import 'package:flutter/material.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:flutter_svg/svg.dart';
import 'package:user_flutter/baiviet/baiviet_ds.dart';
import 'package:user_flutter/diadanh/chitiet_diadanh.dart';
import 'package:user_flutter/diadanh/danhsach_diadanh.dart';
import 'package:user_flutter/login/LoginPage.dart';
import 'package:user_flutter/linhtinh/thongtin.dart';

class Background extends StatefulWidget {
  @override
  _BackgroundState createState() => _BackgroundState();
}

class _BackgroundState extends State<Background> {
  int _page = 0;
  GlobalKey<CurvedNavigationBarState> _bottomNavigationKey = GlobalKey();
  Widget Page(int p) {
    switch (p) {
      case 0:
        return DanhSachDiaDanh();
        break;
      case 1:
        return MyApp();
        break;
      case 2:
        return LoginPage();
        break;
      case 3:
        return LoginPage();
        break;
      case 4:
        return thongtin();
        break;
    }
    return Text("null");
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.white,
        elevation: 0.0,
        leading: Image.asset(
          'assets/logo/logo.png',
          width: 50,
          height: 50,
        ),
        title: Text(
          "Danh sách bài viết",
          style: TextStyle(color: Colors.black),
        ),
        centerTitle: true,
        actions: [
          CircleAvatar(
            child: Text("D"),
          )
        ],
      ),
      bottomNavigationBar: CurvedNavigationBar(
        key: _bottomNavigationKey,
        index: 0,
        height: 60.0,
        items: <Widget>[
          Icon(Icons.search_outlined, color: Colors.white, size: 30),
          SvgPicture.asset('assets/imgs/svg/home.svg', color: Colors.white,width: 30,height: 30,),
          SvgPicture.asset('assets/imgs/svg/gps.svg', color: Colors.white,width: 30,height: 30,),
          SvgPicture.asset('assets/imgs/svg/gpsplush.svg', color: Colors.white, width: 30,height: 30,),
            SvgPicture.asset('assets/imgs/svg/user.svg', color: Colors.white, width: 30,height: 30,),
        ],
        color: Color(0xFF7d82bc),
        buttonBackgroundColor: Color(0xFF7D82BC),
        backgroundColor: Colors.white,
        animationCurve: Curves.easeInOut,
        animationDuration: Duration(milliseconds: 600),
        onTap: (index) {
          setState(() {
            _page = index;
          });
        },
        letIndexChange: (index) => true,
      ),
      body: Container(
        color: Colors.white,
        child: Page(_page),
      ),
    );
  }
}
