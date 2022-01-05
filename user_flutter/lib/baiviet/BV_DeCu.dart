import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
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
    return  Listdecu(size, 3, Container(
                margin: EdgeInsets.only(right: 14),
                width: 330 * size.width / 360,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(23),
                    image: DecorationImage(
                      image: AssetImage("assets/imgs/baiviets/vhlong.jpg"),
                      fit: BoxFit.cover,
                    )),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
                    Container(
                      width: double.infinity,
                      height: 51 * size.height / 640,
                      padding:
                          EdgeInsets.symmetric(horizontal: 23, vertical: 5),
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(23),
                            bottomRight: Radius.circular(23)),
                        color: kCardInfoBG.withOpacity(0.5),
                      ),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.stretch,
                        mainAxisAlignment: MainAxisAlignment.start,
                        children: [
                          Text(
                            "Vẽ đẹp vịnh hạ long",
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
                              Text(
                                'data',
                                style: TextStyle(
                                    color: Colors.white,
                                    fontSize: 15,
                                    fontFamily: 'Cabin_B',
                                    fontWeight: FontWeight.bold),
                              ),
                            ],
                          )
                        ],
                      ),
                    ),
                  ],
                ),
              ),
            );
  }
}
 