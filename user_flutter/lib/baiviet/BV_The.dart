import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/ViewProvider.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/colorplush.dart';

import 'BV_chitiet.dart';

class card extends StatefulWidget {
  final BaiVietObject BV;
  const card({Key? key, required this.BV}) : super(key: key);

  @override
  _cardState createState() {
    return _cardState(BV: BV);
  }
}

class _cardState extends State<card> {
  final BaiVietObject BV;
  void chonthe() async {
    String a;
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    int id = (sharedPreferences.getInt('id') ?? 0);
    ViewProvider.KtraView(context, BV.Bv_Ma.toString(), id.toString())
        .then((result) {
      a = result;
      if (a == '0') {
        ViewProvider.ThemView(context, BV.Bv_Ma.toString(), id.toString());
      }
    });
  }
  int id=0;
    layid() async{
SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
     id = (sharedPreferences.getInt('id') ?? 0);
  }
  

  _cardState({required this.BV});
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    layid();
  }
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return InkWell(
      onTap: () {
        setState(() {
          chonthe();
          Navigator.push(
            context,
            MaterialPageRoute(
              builder: (_) => ChiTiet(
                Bai: BV,
              ),
            ),
          );
        });
      },
      child: Container(
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.all(Radius.circular(30)),
        ),
        padding: EdgeInsets.all(10),
        margin: EdgeInsets.only(bottom: 5, top: 5),
        child: Container(
          child: Row(
            children: [
              Container(
                alignment: Alignment.topLeft,
                padding: EdgeInsets.all(20),
                width: 144 * size.width / 360,
                height: 100 * size.height / 640,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(23),
                  image: DecorationImage(
                    image: NetworkImage(httpsanh + BV.ABV[0].ABV_Anh),
                    fit: BoxFit.cover,
                  ),
                ),
              ),
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Container(
                    width: 200,
                    padding: EdgeInsets.only(left: 5),
                    child: Text(
                      BV.Bv_TieuDe,
                      style: cabin_B(context, Colors.black, 18.0),
                      softWrap: true,
                      overflow: TextOverflow.ellipsis,
                    ),
                  ), //#5
                  ElevatedButton.icon(
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                              builder: (context) => LayDD(BV.Bv_MaDiaDanh)),
                        );
                      },
                      style: ElevatedButton.styleFrom(
                          primary: Colors.white, elevation: 0),
                      icon: SvgPicture.asset(
                        'assets/imgs/svg/gps1.svg',
                        color: Color(0xFF4C56CE),
                        height: 15 * size.height / 640,
                        width: 15 * size.width / 360,
                      ),
                      label: Text(BV.Bv_TenDD.toString(),
                          style: cabin_B(context, Color(0xFF828282), 15.0))),
                  ElevatedButton.icon(
                    style: ElevatedButton.styleFrom(
                        primary: Colors.white,
                        elevation: 0.0,
                        shadowColor: Colors.white),
                    onPressed: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) => LayTT(BV.Bv_MaNguoiDung, 1)),
                      );
                    },
                    icon: SvgPicture.asset(
                      'assets/imgs/svg/user1.svg',
                      color: Color(0xFF4C56CE),
                      height: 15 * size.height / 640,
                      width: 15 * size.width / 360,
                    ),
                    label: Text(BV.Bv_TenND.toString(),
                        style: cabin_B(context, Color(0xFF828282), 15.0)),
                  ),
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
