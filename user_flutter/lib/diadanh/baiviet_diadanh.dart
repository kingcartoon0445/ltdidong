import 'package:flutter/material.dart';
import 'package:user_flutter/colorplush.dart';

class BaiVietLienQuanDiaDanh extends StatefulWidget {
  const BaiVietLienQuanDiaDanh({Key? key}) : super(key: key);

  @override
  _BaiVietLienQuanDiaDanhState createState() => _BaiVietLienQuanDiaDanhState();
}

class _BaiVietLienQuanDiaDanhState extends State<BaiVietLienQuanDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      height: 300,
      child: Column(
        children: [
          Expanded(
            child: ListView.builder(
                scrollDirection: Axis.vertical,
                itemCount: 5, //đếm ảnh
                itemBuilder: (context, index) => Stack(
                      children: [
                        Container(
                          child: InkWell(
                            onTap: () {/*1*/},
                            child: Container(
                              margin: EdgeInsets.only(right: 15, left: 15),
                              width: double.infinity,
                              height: 150,
                              decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(30),
                                  image: DecorationImage(
                                    image: AssetImage(
                                        "assets/imgs/diadanh/VungTau.png"),
                                    fit: BoxFit.cover,
                                  )),
                            ),
                          ),
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          children: [
                            Container(
                              margin:
                                  EdgeInsets.only(right: 15, top: 75, left: 15),
                              width: double.infinity,
                              height: 75,
                              padding: EdgeInsets.symmetric(
                                  horizontal: 15, vertical: 5),
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.only(
                                    bottomLeft: Radius.circular(30),
                                    bottomRight: Radius.circular(30)),
                                color: kCardInfoBG.withOpacity(0.4),
                              ),
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.end,
                                children: [
                                  SizedBox(
                                    height: 40,
                                    width: double.infinity,
                                    child: TextButton(
                                      onPressed: () {/*2*/},
                                      //  style: TextButton.styleFrom(
                                      //    padding: EdgeInsets.all(4),
                                      //   ),
                                      child: Text(
                                        "Tiêu đề",
                                        style: TextStyle(
                                            color: Colors.white,
                                            fontSize: 15,
                                            fontWeight: FontWeight.w700),
                                      ),
                                    ),
                                  ),
                                  Column(
                                    mainAxisAlignment: MainAxisAlignment.end,
                                    children: [
                                      Row(
                                        mainAxisAlignment:
                                            MainAxisAlignment.start,
                                        children: [
                                          Icon(
                                            Icons.place_outlined,
                                            color: Colors.white,
                                          ),
                                          Text(
                                            "Địa chỉ",
                                            style:
                                                TextStyle(color: Colors.white),
                                          ),
                                        ],
                                      ),
                                    ],
                                  ),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ],
                    )),
          ),
        ],
      ),
    );
  }
}
