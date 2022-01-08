import 'package:flutter/material.dart';

class RecommendDiaDanh extends StatefulWidget {
  const RecommendDiaDanh({Key? key}) : super(key: key);

  @override
  _RecommendDiaDanhState createState() => _RecommendDiaDanhState();
}

class _RecommendDiaDanhState extends State<RecommendDiaDanh> {
  List<String> ds_Decu = [
    "Bắc",
    "Trung",
    "Nam",
  ];
  int selectedIndex = 0;
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
    Size size = MediaQuery.of(context).size;
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
                fontFamily: 'Cabin_B',
                fontWeight: FontWeight.bold,
                fontSize: 14,
                color: selectedIndex == index ? Color(0xFF4C56CE) : Colors.grey,
              ),
            ),
            Container(
              alignment: Alignment.bottomCenter,
              margin: EdgeInsets.only(top: 5), //top padding 5
              height: 2 * size.height / 640,
              width: 30 * size.width / 360,
              color: selectedIndex == index ? Colors.black : Colors.transparent,
            )
          ],
        ),
      ),
    );
  }
}
