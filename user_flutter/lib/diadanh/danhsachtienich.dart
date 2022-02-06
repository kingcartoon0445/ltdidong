import 'package:flutter/material.dart';
import 'package:user_flutter/Object/TienIchObject.dart';
import 'package:user_flutter/colorplush.dart';
import 'package:user_flutter/diadanh/chitiet_tienich.dart';

class DanhSachTienTich extends StatefulWidget {
  final List<TienIchObject> Ti;
  const DanhSachTienTich({Key? key, required this.Ti}) : super(key: key);

  @override
  _DanhSachTienTichState createState() {
    return _DanhSachTienTichState(Ti: Ti);
  }
}

class _DanhSachTienTichState extends State<DanhSachTienTich> {
  final List<TienIchObject> Ti;
  _DanhSachTienTichState({required this.Ti});
  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      height: 150,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Expanded(
            child: ListView.builder(
                scrollDirection: Axis.horizontal,
                itemCount: Ti.length, //đếm ảnh
                itemBuilder: (context, index) => Stack(
                      children: [
                        Container(
                          child: InkWell(
                            onTap: () {
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) => ChiTietTienIch()),
                              );
                            },
                            child: Container(
                              margin: EdgeInsets.only(right: 15),
                              width: 150,
                              decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(25),
                                  image: DecorationImage(
                                    image: AssetImage(
                                        "assets/imgs/diadanh/VungTau.png"),
                                    fit: BoxFit.cover,
                                  )),
                            ),
                          ),
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            Container(
                              margin: EdgeInsets.only(right: 15),
                              width: 150,
                              height: 75,
                              padding: EdgeInsets.symmetric(
                                  horizontal: 15, vertical: 5),
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.only(
                                    bottomLeft: Radius.circular(23),
                                    bottomRight: Radius.circular(23)),
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
                                        Ti[index].Ti_Ten,
                                        overflow: TextOverflow.ellipsis,
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
                                          Expanded(
                                              child: Text(
                                            Ti[index].Ti_DiaChi,
                                            overflow: TextOverflow.ellipsis,
                                            style:
                                                TextStyle(color: Colors.white),
                                          )),
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
