import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/colorplush.dart';
import 'BV_DeCu.dart';
import 'BV_chuoidecu.dart';
import 'ListBaiviet.dart';

class BaiViet extends StatefulWidget {
  const BaiViet({Key? key}) : super(key: key);

  @override
  _BaiVietState createState() => _BaiVietState();
}

Widget baiviet() {
  return ListTile(
    leading: Image.asset("assets/imgs/baiviets/vhlong.jpg"),
  );
}

class _BaiVietState extends State<BaiViet> {
  
  @override
  Widget build(BuildContext context) {
    const Key centerKey = ValueKey<String>('bottom-sliver-list');
    return Scaffold(
      backgroundColor: Color(0xFFe1e1e1),
      body:  CustomScrollView(  
         center: centerKey,
        slivers: <Widget>[
           SliverList(
           key: centerKey,
           delegate: SliverChildListDelegate([ Container(
              margin: EdgeInsets.only(bottom: 10),child:
             bv_decu()),
            Container(margin: EdgeInsets.only(bottom: 5),child: chuoidecu()),
           ])),
           Lst_baiviet(a:0)
          ],
        ),
    );
  }
}

