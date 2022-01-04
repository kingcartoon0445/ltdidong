import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:user_flutter/colorplush.dart';
import 'package:user_flutter/diadanh/chitiet_diadanh.dart';
import 'package:user_flutter/diadanh/recommend_diadanh.dart';

class DanhSachDiaDanh extends StatefulWidget {
  const DanhSachDiaDanh({Key? key}) : super(key: key);

  @override
  _DanhSachDiaDanhState createState() => _DanhSachDiaDanhState();
}

Widget diadanh() {
  return ListTile(
    leading: Image.asset('assets/imgs/diadanh/VungTau.png'),
  );
}

class _DanhSachDiaDanhState extends State<DanhSachDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            RecommendDiaDanh(),
            TatCaDiaDanh(),
            Column(
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                Row(
                  children: [
                    Container(
                      padding:
                          EdgeInsets.symmetric(horizontal: 10, vertical: 5),
                      child: Text(
                        'Top lượt share',
                        style: TextStyle(
                          fontWeight: FontWeight.w700,
                          fontSize: 18,
                        ),
                      ),
                    )
                  ],
                ),
                TopLuotShareDiaDanh(),
              ],
            ),
          ],
        ),
      ),
    );
  }
}

class TatCaDiaDanh extends StatefulWidget {
  const TatCaDiaDanh({Key? key}) : super(key: key);

  @override
  _TatCaDiaDanhState createState() => _TatCaDiaDanhState();
}

class _TatCaDiaDanhState extends State<TatCaDiaDanh> {
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
                      image: AssetImage("assets/imgs/diadanh/VungTau.png"),
                      fit: BoxFit.cover,
                    )),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
                    Container(
                      width: double.infinity,
                      height: 95,
                      padding:
                          EdgeInsets.symmetric(horizontal: 15, vertical: 5),
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(23),
                            bottomRight: Radius.circular(23)),
                        color: kCardInfoBG.withOpacity(0.5),
                      ),
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.end,
                        children: [
                          SizedBox(
                            height: 40,
                            width: double.infinity,
                            child: TextButton(
                              onPressed: () {
                                Navigator.push(
                                  context,
                                  MaterialPageRoute(
                                      builder: (context) => ChiTietDiaDanh()),
                                );
                              },
                              style: TextButton.styleFrom(
                                padding: EdgeInsets.all(2),
                              ),
                              child: Text(
                                "Vũng Tàu",
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
                                mainAxisAlignment: MainAxisAlignment.start,
                                children: [
                                  Icon(
                                    Icons.place_outlined,
                                    color: Colors.white,
                                  ),
                                  Text(
                                    "Bà Rịa - Vũng Tàu",
                                    style: TextStyle(color: Colors.white),
                                  ),
                                ],
                              ),
                              Row(
                                mainAxisAlignment: MainAxisAlignment.start,
                                children: [
                                  RatingBarIndicator(
                                    rating: 4.5,
                                    itemBuilder: (_, __) {
                                      return Icon(
                                        Icons.star,
                                        color: Colors.amber,
                                      );
                                    },
                                    itemSize: 20,
                                  ),
                                ],
                              )
                            ],
                          ),
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

class TopLuotShareDiaDanh extends StatefulWidget {
  const TopLuotShareDiaDanh({Key? key}) : super(key: key);

  @override
  _TopLuotShareDiaDanhState createState() => _TopLuotShareDiaDanhState();
}

class AnhDeCu {}

class _TopLuotShareDiaDanhState extends State<TopLuotShareDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return GridView.count(
      crossAxisCount: 2,
      shrinkWrap: true,
      physics: NeverScrollableScrollPhysics(),
      padding: EdgeInsets.all(10),
      mainAxisSpacing: 10,
      crossAxisSpacing: 10,
      childAspectRatio: 1.2,
      children: List.generate(4, (index) {
        return GestureDetector(
          onTap: () {},
          child: Container(
            width: double.infinity,
            decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(15),
            ),
            child: Stack(
              children: [
                Hero(
                  tag: "btn$index",
                  child: ClipRRect(
                    borderRadius: BorderRadius.circular(15),
                    child: Image.asset(
                      "assets/imgs/diadanh/VungTau.png",
                      width: double.infinity,
                      height: 400,
                      fit: BoxFit.cover,
                    ),
                  ),
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
                    Container(
                      width: double.infinity,
                      height: 85,
                      padding:
                          EdgeInsets.symmetric(horizontal: 10, vertical: 5),
                      decoration: BoxDecoration(
                        borderRadius: BorderRadius.only(
                            bottomLeft: Radius.circular(23),
                            bottomRight: Radius.circular(23)),
                        color: kCardInfoBG.withOpacity(0.5),
                      ),
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.start,
                        children: [
                          TextButton(
                            onPressed: () {
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) => ChiTietDiaDanh()),
                              );
                            },
                            style: TextButton.styleFrom(
                              minimumSize: Size(1, 1),
                              padding: EdgeInsets.all(5),
                              side: BorderSide(width: 2, color: Colors.blue),
                            ),
                            child: Text(
                              "Vũng Tàu",
                              style: TextStyle(
                                  color: Colors.white,
                                  fontSize: 12,
                                  fontWeight: FontWeight.w700),
                            ),
                          ),
                          Row(
                            mainAxisAlignment: MainAxisAlignment.start,
                            children: [
                              Icon(
                                Icons.place_outlined,
                                color: Colors.white,
                                size: 10,
                              ),
                              Text(
                                "Bà Rịa - Vũng Tàu",
                                style: TextStyle(
                                    color: Colors.white, fontSize: 10),
                              ),
                            ],
                          ),
                          Row(
                            mainAxisAlignment: MainAxisAlignment.start,
                            children: [
                              RatingBarIndicator(
                                rating: 4.5,
                                itemBuilder: (_, __) {
                                  return Icon(
                                    Icons.star,
                                    color: Colors.amber,
                                  );
                                },
                                itemSize: 15,
                              ),
                            ],
                          ),
                        ],
                      ),
                    )
                  ],
                ),
              ],
            ),
          ),
        );
      }),
    );
  }
}
