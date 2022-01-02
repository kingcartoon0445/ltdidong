import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'BV_The.dart';
import 'BaiViet.dart';
import 'BV_chitiet.dart';

class Lst_baiviet extends StatefulWidget {
  const Lst_baiviet({Key? key}) : super(key: key);

  @override
  _Lst_baivietState createState() => _Lst_baivietState();
}

class _Lst_baivietState extends State<Lst_baiviet> {
  @override
  Widget build(BuildContext context) {
    return Expanded(
      child: ListView.builder(
        itemBuilder: (context, index) => Column(
          children: [
            card(),
          ],
        ),
      ),
    );
  }
}
