import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/LikeProvider.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/colorplush.dart';

class ChiTiet extends StatefulWidget {
  final BaiVietObject Bai;
  const ChiTiet({Key? key, required this.Bai}) : super(key: key);

  @override
  _ChiTietState createState() {
    return _ChiTietState(Bai: Bai);
  }
}

class _ChiTietState extends State<ChiTiet> {
  bool _thich = false;

  void Ktra() async {
    String a = '0';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    int id = (sharedPreferences.getInt('id') ?? 0);
    LikeProvider.KtraLike(context, Bai.Bv_Ma.toString(), id.toString())
        .then((result) {
      a = result;
      if (a == '1') {
        setState(() {
          _thich = true;
        });
      } else {
        setState(() {
          _thich = false;
        });
      }
    });
  }

  void _nhanthich() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    int id = (sharedPreferences.getInt('id') ?? 0);
    if (_thich == false) {
      LikeProvider.ThemLike(context, Bai.Bv_Ma.toString(), id.toString());
      setState(() {
        _thich = !_thich;
      });
    } else if (_thich == true) {
      LikeProvider.XoaLike(context, Bai.Bv_Ma.toString(), id.toString());
      setState(() {
        _thich = !_thich;
      });
    }
  }

  final BaiVietObject Bai;
  _ChiTietState({required this.Bai});
  @override
  initState() {
    super.initState();
    Ktra();
  }

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return Scaffold(
      body: Material(
        child: Container(
          padding: EdgeInsets.only(top: 24),
          child: Stack(children: [
            Container(
              height: size.height * 227 / 640,
              width: double.maxFinite,
              decoration: BoxDecoration(),
              child: PageView.builder(
                
                  itemCount: Bai.ABV.length,
                  itemBuilder: (context, index) =>
                  Container(
                    width: double.maxFinite,
                    decoration:  BoxDecoration(
                        image: DecorationImage(
                      image:NetworkImage('http://192.168.1.15:80'+Bai.ABV[index].ABV_Anh),
                      fit: BoxFit.cover,
                    )),
                  ),
                ),
            ),
            Container(
              margin: EdgeInsets.only(top: size.height * 0.27),
              padding: EdgeInsets.only(top: 10),
              height: size.height * 600 / 640,
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.only(
                    topLeft: Radius.circular(25),
                    topRight: Radius.circular(25)),
              ),
              child: Column(
                children: [
                  Container(
                    child: ListTile(
                        leading: Text(
                          Bai.Bv_TieuDe,
                          style: TextStyle(
                              fontSize: 25,
                              fontFamily: 'Cabin_B',
                              fontWeight: FontWeight.bold,
                              overflow: TextOverflow.clip),
                        ),
                        title: Row(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            Icon(
                              Icons.remove_red_eye_outlined,
                              size: 24,
                              color: Color(0xFF4C56CE),
                            ),
                            DemView(Bai.Bv_Ma, Color(0xFF828282), 15.0)
                          ],
                        )),
                  ),
                  Container(
                      child: ListTile(
                    leading: ElevatedButton.icon(
                      onPressed: () {},
                      style: ElevatedButton.styleFrom(
                          primary: Colors.white, elevation: 0),
                      icon: SvgPicture.asset(
                        'assets/imgs/svg/gps1.svg',
                        color: Color(0xFF4C56CE),
                        height: size.height * 20 / 640,
                        width: 20,
                      ),
                      label: Text(
                        Bai.Bv_TenDD,
                        style: cabin_B(Color(0xFF828282), 15.0),
                      ),
                    ),
                    trailing: ElevatedButton.icon(
                        onPressed: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) =>
                                    LayTT(Bai.Bv_MaNguoiDung)),
                          );
                        },
                        style: ElevatedButton.styleFrom(
                            primary: Colors.white, elevation: 0),
                        icon: SvgPicture.asset(
                          'assets/imgs/svg/user1.svg',
                          height: size.height * 20 / 640,
                          width: size.width * 20 / 360,
                          color: Color(0xFF4C56CE),
                        ),
                        label: Text(Bai.Bv_TenND,
                            style: cabin_B(Color(0xFF828282), 15.0))),
                  )),
                  Expanded(
                    child: Container(
                      child: ListView(
                        children: [
                          Padding(
                            padding: EdgeInsets.only(
                                right: 30, left: 30, top: 3, bottom: 90),
                            child: Text(
                              Bai.Bv_NoiDung,
                              style: TextStyle(
                                  fontFamily: 'Cabin_B',
                                  overflow: TextOverflow.clip),
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ]),
        ),
      ),
      floatingActionButton: Row(
          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            FloatingActionButton.extended(
              onPressed: () {
                // Add your onPressed code here!
                _nhanthich();
              },
              shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(10),
                  side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
              backgroundColor:
                  _thich == false ? Colors.white : Color(0xFF7D82BC),
              label: FutureBuilder(
                  future: LikeProvider.Like(Bai.Bv_Ma),
                  builder: (context, snapshot) {
                    if (snapshot.hasData) {
                      return Text(
                        snapshot.data.toString(),
                        style: TextStyle(
                          fontWeight: FontWeight.bold,
                          fontSize: 15,
                          color: _thich == false
                              ? Color(0xFF7D82BC)
                              : Colors.white,
                        ),
                      );
                    }
                    return Text("data");
                  }),
              icon: SvgPicture.asset(
                'assets/imgs/svg/like.svg',
                color: _thich == false ? Color(0xFF7D82BC) : Colors.white,
              ),
              heroTag: "fab1",
            ),
          ]),
    );
  }
}
