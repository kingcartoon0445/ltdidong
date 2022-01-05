import 'package:flutter/material.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/colorplush.dart';
class chuoidecu extends StatefulWidget {
  @override
  _chuoidecuState createState() => _chuoidecuState();
}
class _chuoidecuState extends State<chuoidecu> {
  List<String> ds_Decu=["Tất cả","Nhiều người thích","Nhiều lượt xem","của tôi"];
  int selectedIndex=0;
  @override
    Widget build(BuildContext context) {
    return Container(
      color: Colors.white,
      padding: const EdgeInsets.symmetric(vertical: 20),
      child: SizedBox(
        height: 25,
        child: ListView.builder(
          scrollDirection: Axis.horizontal,
          itemCount: ds_Decu.length,
          itemBuilder: (context, index) => buildCategory(index),
        ),
      ),
    );
  }
    Widget buildCategory(int index) {
      Size size=MediaQuery.of(context).size;
    return GestureDetector(
      onTap: () {
        setState(() {
          selectedIndex = index;
        });
      },
      child: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            Text(
              ds_Decu[index],
              style: cabin_B( selectedIndex == index ? Color(0xFF4C56CE) : Colors.grey, 14.0)
            ),
            Container(
              alignment: Alignment.bottomCenter,
              margin: EdgeInsets.only(top: 5), //top padding 5
              height: 2*size.height/640,
              width: 30*size.width/360,
              color: selectedIndex == index ? Colors.black : Colors.transparent,
            )
          ],
        ),
      ),
    );
  }
}