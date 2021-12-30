import 'package:flutter/material.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:flutter_svg/svg.dart';
import 'package:user_flutter/baiviet/baiviet_chitiet.dart';
import 'package:user_flutter/baiviet/baiviet_ds.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/diadanh/chitiet_diadanh.dart';
import 'package:user_flutter/diadanh/danhsach_diadanh.dart';
import 'package:user_flutter/linhtinh/thongthin2.dart';
import 'package:user_flutter/linhtinh/thongtin.dart';
import 'Hoang/login/LoginPage.dart';
import 'colorplush.dart';

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
        return DanhSachDiaDanh();
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
          PopupMenuButton(
            shape:RoundedRectangleBorder(
              borderRadius: BorderRadius.only(
                topLeft: Radius.circular(23),
                bottomLeft: Radius.circular(23),
                bottomRight:  Radius.circular(23))
              ),
            child:CircleAvatar(
                child: Text("D"),
             ),
            itemBuilder: (context)=>[
              PopupMenuItem(
                
                  child: Container(
                    height: 180, width: 180,child: 
                  Column(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                       nut_Icon(CircleAvatar(child: Text("s"),radius: 20,),
                                Text("daat",style: cabin_B(Colors.black, 15),),
                                Navigator.push(context,
                                MaterialPageRoute(builder:(context)=> thongtin2()
                                  ),
                                ),
                              ),
                        Container(
                        padding: EdgeInsets.only(right: 40),
                        child: nut_Icon(
                          Icon(Icons.settings_outlined,size: 25,),
                          Text("Cài đặt",style: cabin_B(Colors.black, 15),),
                         context
                          ),),
                        OutlinedButton(
                          onPressed: (){},
                          style: ButtonStyle(
                            backgroundColor:MaterialStateProperty.all<Color>(Color(0xFF7D82BC)),
                            fixedSize: MaterialStateProperty.all(Size(150, 50)) ,
                            shape:MaterialStateProperty.all(RoundedRectangleBorder(borderRadius: BorderRadius.circular(23.0))),
                          ),
                          child: Row(
                            children: [
                          Icon(Icons.logout_outlined,size: 25,color: Colors.white,),
                          Text("Đăng xuất",style: cabin_B(Colors.white, 15),)
                        ],))
                        ],),
                       )),
                    ],
          ),
        ],
      ),
      bottomNavigationBar: CurvedNavigationBar(
        key: _bottomNavigationKey,
        index: 0,
        height: 60.0,
        items: <Widget>[
          Icon(Icons.search_outlined, color: Colors.white, size: 30),
          SvgPicture.asset(
            'assets/imgs/svg/home.svg',
            color: Colors.white,
            width: 30,
            height: 30,
          ),
          SvgPicture.asset(
            'assets/imgs/svg/gps.svg',
            color: Colors.white,
            width: 30,
            height: 30,
          ),
          SvgPicture.asset(
            'assets/imgs/svg/gpsplush.svg',
            color: Colors.white,
            width: 30,
            height: 30,
          ),
          SvgPicture.asset(
            'assets/imgs/svg/user.svg',
            color: Colors.white,
            width: 30,
            height: 30,
          ),
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
