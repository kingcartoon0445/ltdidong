import 'package:flutter/material.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:flutter_svg/svg.dart';
import 'package:user_flutter/Hoang/search/SearchPage.dart';
import 'package:user_flutter/baiviet/BV_chitiet.dart';
import 'package:user_flutter/baiviet/BaiViet.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/diadanh/chitiet_diadanh.dart';
import 'package:user_flutter/diadanh/chitiet_tienich.dart';
import 'package:user_flutter/diadanh/danhsach_diadanh.dart';
import 'package:user_flutter/linhtinh/caidat.dart';
import 'package:user_flutter/linhtinh/thongthin.dart';
import 'Hoang/login/page_login.dart';
import 'colorplush.dart';

class Background extends StatefulWidget {
  final int id;
  const Background({Key? key, required this.id}) : super(key: key);
  @override
  _BackgroundState createState() {
    return _BackgroundState(id: id);
  }
}

class _BackgroundState extends State<Background> {
  final int id;
  _BackgroundState({required this.id});
  int _page = 0;
  String txt = "Danh sách bài viết";
  GlobalKey<CurvedNavigationBarState> _bottomNavigationKey = GlobalKey();
  Widget Page(int p) {
    switch (p) {
      case 0:
        return BaiViet();
        break;
      case 1:
        return DanhSachDiaDanh();
        break;
      case 2:
        return ChiTietTienIch();
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
        leading: IconButton(
          onPressed: () {
           
          },
          icon: Image.asset(
            'assets/logo/logo.png',
            width: 50,
            height: 50,
          ),
        ),
        title: Text(
          txt,
          style: cabin_B(Colors.black, 20.0),
        ),
        centerTitle: true,
        actions: [
          IconButton(
            onPressed: () {
              showDialog(
                  context: context,
                  builder: (BuildContext contex) {
                    return AlertDialog(
                      shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.only(topLeft: Radius.circular(35.0),bottomLeft: Radius.circular(35.0),bottomRight: Radius.circular(35.0))),
                      title: ElevatedButton(
                          style: ElevatedButton.styleFrom(
                              primary: Colors.white,
                              elevation: 0.0,
                              shadowColor: Colors.white),
                          onPressed: () {Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => LayTT(1)),
              );},
                          child: ListTile(
                            leading: CircleAvatar(
                              maxRadius: 30,
                              child: Text('D'),
                            ),
                            title: Text(
                              'Diu diu dio',
                              style: cabin_B(Colors.black, 20.0),
                            ),
                          )),
                      content: ElevatedButton(
                          style: ElevatedButton.styleFrom(
                              primary: Colors.white,
                              elevation: 0.0,
                              shadowColor: Colors.white),
                          onPressed: () { Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => CaiDat()),
            );},
                          child: ListTile(
                            leading: SvgPicture.asset(
                              'assets/imgs/svg/caidat.svg',
                              height: 40,
                              width: 40,
                              color: Colors.black,
                            ),
                            title: Text(
                              'Cài Đặt',
                              style: cabin_B(Colors.black, 18.0),
                            ),
                          )),
                      actions: [
                        Container(
                          margin:
                              EdgeInsets.only(bottom: 30, left: 15, right: 15),
                          color: Colors.black,
                          height: 2,
                          width: double.infinity,
                        ),
                        SizedBox(
                          width: double.infinity,
                          child: TextButton(
                            
                            onPressed: () {
                              Navigator.of(context).pushAndRemoveUntil(
                                  MaterialPageRoute(
                                      builder: (context) => LoginPage()),
                                  (route) => false);
                            },
                            child: ListTile(leading: Icon(Icons.logout_outlined,color: Colors.white,),title: Text("Đăng xuất",
                                style: cabin_B(Colors.white, 20.0)),),
                            style: ButtonStyle(
                              backgroundColor: MaterialStateProperty.all<Color>(
                                  Color(0xFF7D82BC)),
                              shape: MaterialStateProperty.all(
                                  RoundedRectangleBorder(
                                      borderRadius:
                                          BorderRadius.circular(30.0))),
                            ),
                          ),
                        ),
                      ],
                    );
                  });
            },
            icon: CircleAvatar(
              child: Text("D"),
            ),
          )
        ],
      ),
      bottomNavigationBar: CurvedNavigationBar(
        key: _bottomNavigationKey,
        index: 0,
        height: 60.0,
        items: <Widget>[
          SvgPicture.asset(
            'assets/imgs/svg/home.svg',
            color: Colors.white,
            width: 30,
            height: 30,
          ),
          SvgPicture.asset(
            'assets/imgs/svg/diadanh.svg',
            color: Colors.white,
            width: 30,
            height: 30,
          ),
          SvgPicture.asset(
            'assets/imgs/svg/themgps.svg',
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
            switch (index) {
              case 0:
                txt = 'Danh sách bài viết';
                break;
              case 1:
                txt = 'Danh sách địa danh';
                break;
              case 2:
                txt = 'Thêm địa danh';
                break;
              default:
                txt = 'null';
            }
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
