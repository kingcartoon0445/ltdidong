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
    return Scaffold(
      backgroundColor: Colors.white,
      body:  Column(
          children: [
              bv_decu(),
             chuoidecu(),
             Lst_baiviet(),
          ],
        ),
    );
  }
}

