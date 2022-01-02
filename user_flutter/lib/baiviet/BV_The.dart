import 'package:flutter/material.dart';
import 'package:user_flutter/class_chung.dart';

import 'BV_chitiet.dart';
class card extends StatelessWidget {
  const card({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return InkWell(
      onTap: () {
        Navigator.push(
          context,
          MaterialPageRoute(
            builder: (_) => ChiTiet(),
          ),
        );
      },
      child: CardBv(size, "assets/imgs/baiviets/test.jpg", "Tiêu đề", "Địa danh", "Tác giả"),
    );
  }
}
