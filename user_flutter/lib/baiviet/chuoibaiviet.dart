import 'package:flutter/material.dart';
class chuoidecu extends StatefulWidget {
  @override
  _chuoidecuState createState() => _chuoidecuState();
}

class _chuoidecuState extends State<chuoidecu> {
  List<String> ds_Decu=["Tất cả","Nhiều người thích","Nhiều lượt xem","của tôi"];
  int selectedIndex=0;
  @override
    Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 20),
      child: SizedBox(
        height: 28,
        child: ListView.builder(
          scrollDirection: Axis.horizontal,
          itemCount: ds_Decu.length,
          itemBuilder: (context, index) => buildCategory(index),
        ),
      ),
    );
  }
    Widget buildCategory(int index) {
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
              style: TextStyle(
                fontWeight: FontWeight.bold,
                fontSize: 14,
                color: selectedIndex == index ? Color(0xFF4C56CE) : Colors.grey,
              ),
            ),
            Container(
              alignment: Alignment.bottomCenter,
              margin: EdgeInsets.only(top: 5), //top padding 5
              height: 2,
              width: 30,
              color: selectedIndex == index ? Colors.black : Colors.transparent,
            )
          ],
        ),
      ),
    );
  }
}