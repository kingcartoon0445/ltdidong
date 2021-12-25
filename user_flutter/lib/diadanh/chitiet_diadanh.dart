import 'package:flutter/material.dart';

class ChiTietDiaDanh extends StatefulWidget {
  const ChiTietDiaDanh({Key? key}) : super(key: key);

  @override
  _ChiTietDiaDanhState createState() => _ChiTietDiaDanhState();
}

class _ChiTietDiaDanhState extends State<ChiTietDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            AnhDiaDanh(),
          ],
        ),
      ),
    );
  }
}

class AnhDiaDanh extends StatelessWidget {
  const AnhDiaDanh({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: double.infinity,
      height: 200,
      child: Column(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Expanded(
            flex: 3,
            child: PageView.builder(
              onPageChanged: (value) {},
              controller: PageController(viewportFraction: 0.8, initialPage: 0),
              itemCount: 3, //đếm ảnh
              itemBuilder: (context, index) => Container(
                margin: EdgeInsets.only(right: 30),
                width: double.infinity,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(25),
                    image: DecorationImage(
                      image: AssetImage("assets/imgs/diadanh/VungTau.png"),
                      fit: BoxFit.cover,
                    )),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
