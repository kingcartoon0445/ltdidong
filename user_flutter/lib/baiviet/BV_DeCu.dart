import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/baiviet/BV_chitiet.dart';
import 'package:user_flutter/class_chung.dart';

import '../colorplush.dart';

class bv_decu extends StatefulWidget {
  const bv_decu({Key? key}) : super(key: key);

  @override
  _bv_decuState createState() => _bv_decuState();
}

class _bv_decuState extends State<bv_decu> {
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return FutureBuilder<List<BaiVietObject>>(
        future: BaiVietProvider.fecthBaiViet(),
        builder: (context, snapshot) {
          if (snapshot.hasData) {
            List<BaiVietObject> lsbv = snapshot.data!;
            return Container(
              padding: EdgeInsets.only(bottom: 20,top: 10),
              color: Colors.white,child:
            SizedBox(
              width: double.infinity,
              height: 180 * size.height / 640,
              child: Column(
                children: [
                  Expanded(
                    flex: 3,
                    child: PageView.builder(
                      controller:
                          PageController(viewportFraction: 0.8, initialPage: 0),
                      itemCount: lsbv.length, //đếm ảnh
                      itemBuilder: (context, index) => InkWell(
                        onTap: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                              builder: (_) => ChiTiet(
                                Bai: lsbv[index],
                              ),
                            ),
                          );
                        },
                        child: Container(
                          margin: EdgeInsets.only(right: 14),
                          width: 330 * size.width / 360,
                          decoration: BoxDecoration(
                              borderRadius: BorderRadius.circular(23),
                              image: DecorationImage(
                                image: AssetImage(
                                    "assets/imgs/baiviets/vhlong.jpg"),
                                fit: BoxFit.cover,
                              )),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.end,
                            children: [
                              Container(
                                width: double.infinity,
                                height: 60 * size.height / 640,
                                padding: EdgeInsets.symmetric(
                                    horizontal: 23, vertical: 5),
                                decoration: BoxDecoration(
                                  borderRadius: BorderRadius.only(
                                      bottomLeft: Radius.circular(23),
                                      bottomRight: Radius.circular(23)),
                                  color: kCardInfoBG.withOpacity(0.5),
                                ),
                                child: Column(
                                  crossAxisAlignment:
                                      CrossAxisAlignment.stretch,
                                  mainAxisAlignment: MainAxisAlignment.start,
                                  children: [
                                    Text(
                                      lsbv[index].Bv_TieuDe,
                                      style: TextStyle(
                                          color: Colors.white,
                                          fontSize: 20,
                                          fontFamily: 'Cabin_B',
                                          fontWeight: FontWeight.bold),
                                    ),
                                    Spacer(),
                                    Row(
                                      children: [
                                        SvgPicture.asset(
                                          "assets/imgs/svg/gps.svg",
                                          color: Colors.white,
                                          height: 15 * size.height / 640,
                                          width: 15 * size.width / 360,
                                        ),
                                        Text(
                                          "Hạ Long, Quảng Ninh",
                                          style: TextStyle(
                                              color: Colors.white,
                                              fontSize: 15,
                                              fontFamily: 'Cabin_B',
                                              fontWeight: FontWeight.bold),
                                        ),
                                        Spacer(),
                                          tenND(lsbv[index].Bv_MaNguoiDung, Colors.white, 15.0),
                                          
                                      ],
                                    )
                                  ],
                                ),
                              ),
                            ],
                          ),
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            ),
     ); }
          return Text("data");
        });
  }
}
