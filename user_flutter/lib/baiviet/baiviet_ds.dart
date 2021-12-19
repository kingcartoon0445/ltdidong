import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/colorplush.dart';

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  _MyAppState createState() => _MyAppState();
}

Widget baiviet() {
  return ListTile(
    leading: Image.asset("assets/imgs/baiviets/test.jpg"),
  );
}

class _MyAppState extends State<MyApp> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Column(
          children: [
            Text(
              'Bài viết nổi bật',
              style: TextStyle(),
            ),
             bv_decu(),
             bv_chuoidecu(),
          ],
        ),
      ),
    );
  }
}

class bv_chuoidecu extends StatelessWidget {
  const bv_chuoidecu({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    List<String> dsdecu = [
      "Tất cả",
      "Nhiều lượt xem nhất",
      "Nhiều like nhất",
      "Bài viết của bạn"
    ];
    return Container();
    }
}

class bv_decu extends StatefulWidget {
  const bv_decu({Key? key}) : super(key: key);

  @override
  _bv_decuState createState() => _bv_decuState();
}

class _bv_decuState extends State<bv_decu> {
  @override
  Widget build(BuildContext context) {
    return SizedBox(
      width: double.infinity,
      height: 200,
      child: Column(
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
                      image: AssetImage("assets/imgs/baiviets/test.jpg"),
                      fit: BoxFit.cover,
                    )),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
                    Container(
                      width: double.infinity,
                      height: 60,
                      padding:
                          EdgeInsets.symmetric(horizontal: 23, vertical: 5),
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(23),
                            bottomRight: Radius.circular(23)),
                        color: kCardInfoBG.withOpacity(0.5),
                      ),
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.start,
                        children: [
                          Text(
                            "Vẽ đẹp vịnh hạ long",
                            style: TextStyle(
                                color: Colors.white,
                                fontSize: 20,
                                fontWeight: FontWeight.w700),
                          ),
                          Spacer(),
                          Row(
                            children: [
                              Icon(
                                Icons.place_outlined,
                                color: Colors.white,
                              ),
                              Text(
                                "Hạ Long, Quảng Ninh",
                                style: TextStyle(color: Colors.white),
                              ),
                              Spacer(),
                              Text(
                                'data',
                                style: TextStyle(color: Colors.white),
                              ),
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
        ],
      ),
    );
  }
}
