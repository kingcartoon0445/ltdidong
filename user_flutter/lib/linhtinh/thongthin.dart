import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:user_flutter/baiviet/ListBaiviet.dart';
import '../class_chung.dart';
import '../colorplush.dart';



class thongtin extends StatefulWidget {
  const thongtin({Key? key}) : super(key: key);

  @override
  State<thongtin> createState() => _thongtinState();
}

class _thongtinState extends State<thongtin> {
  List<int> top = <int>[];
  List<int> bottom = <int>[0,1,2,3,4,5,6,7];

  @override
  Widget build(BuildContext context) {
    const Key centerKey = ValueKey<String>('bottom-sliver-list');
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        backgroundColor: Color(0xFF7D82BC),
        elevation: 0.0,
      ),
      body: CustomScrollView(
        center: centerKey,
        slivers: <Widget>[
         SliverList(
           key: centerKey,
           delegate: SliverChildListDelegate(
             [
               Container(
                  decoration: BoxDecoration(
                    color: Color(0xFF7D82BC),
                    borderRadius: BorderRadius.only(
                        bottomRight: Radius.circular(40),
                        bottomLeft: Radius.circular(40)),
                  ),
                  height: 150,
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
                              CircleAvatar(radius: 60, backgroundImage:AssetImage("assets/imgs/baiviets/test.jpg"),)
                            ]),
                        Text(
                          "Đen vâu",
                          style: cabin_B(Colors.white, 30.0),
                        )
                      ],
                    ),
                  ),
                ),
                   Container(
                  padding: EdgeInsets.only(left: 20,top: 10),
                  child: Text(
                    "Thông tin",
                    style: cabin_B(Colors.black, 20.0),
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
                            style: cabin(Color(0xFF4C56CE), 15.0),
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
                            style: cabin(Color(0xFF4C56CE), 15.0),
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
                            style: cabin(Color(0xFF4C56CE), 15.0),
                          ),
                          context),
                    ],
                  ),
                ),
               
             ]
           ),
         ),
          SliverList(
            delegate: SliverChildBuilderDelegate(
              (BuildContext context, int index) {
                return card();
              },
              childCount: bottom.length,
            ),
          ),
        ],
      ),
    );
  }
}
