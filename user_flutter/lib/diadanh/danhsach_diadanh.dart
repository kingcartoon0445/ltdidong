import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:user_flutter/Object/diadanhObject.dart';
import 'package:user_flutter/Provider/DiaDanhProvider.dart';
import 'package:user_flutter/class_chung.dart';
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
                    TextButton(
                      onPressed: () {},
                      child: Text(
                        'Đề cử',
                        style: TextStyle(
                          fontWeight: FontWeight.w700,
                          fontSize: 18,
                        ),
                      ),
                    ),
                  ],
                ),
                DeCuDiaDanh(),
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
    return FutureBuilder<List<DiaDanhObject>>(
        future: DiaDanhProvider.fectDiaDanh(),
        builder: (context, snapshot) {
          if (snapshot.hasData){
             List<DiaDanhObject> lsdd = snapshot.data!;
            return SizedBox(
      width: double.infinity,
      height: 180,
      child: Column(
        children: [
          Expanded(
            flex: 3,
            child: PageView.builder(
                onPageChanged: (value) {},
                controller:
                    PageController(viewportFraction: 0.8, initialPage: 0),
                itemCount: 3, //đếm ảnh
                itemBuilder: (context, index) => Stack(
                      children: [
                        Container(
                          child: InkWell(
                            onTap: () {/*1*/
                            Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) =>
                                        ChiTietDiaDanh(DD: lsdd[index])),
                              );
                            },
                            child: Container(
                              margin: EdgeInsets.only(right: 15),
                              width: double.infinity,
                              decoration: BoxDecoration(
                                  borderRadius: BorderRadius.circular(25),
                                  image: DecorationImage(
                                    image: NetworkImage(
                                       httpsanh+ lsdd[index].Dd_AnhBia),
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
                              width: double.infinity,
                              height: 95,
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
                                      onPressed: () {/*2*/
                                      Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) =>
                                        ChiTietDiaDanh(DD: lsdd[index])),
                              );
                                      },
                                      //  style: TextButton.styleFrom(
                                      //    padding: EdgeInsets.all(4),
                                      //   ),
                                      child: Text(
                                        lsdd[index].Dd_Ten,
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
                                          Expanded(child:  Text(
                                            lsdd[index].Dd_DiaChi,
                                            style:
                                                TextStyle(color: Colors.white),overflow: TextOverflow.ellipsis,
                                          ),),
                                        ],
                                      ),
                                      Row(
                                        mainAxisAlignment:
                                            MainAxisAlignment.start,
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
                      ],
                    )),
          ),
        ],
      ),
    );
  }
          else{return Container();}});
    
     }
}

class DeCuDiaDanh extends StatefulWidget {
  const DeCuDiaDanh({Key? key}) : super(key: key);

  @override
  _DeCuDiaDanhState createState() => _DeCuDiaDanhState();
}

class AnhDeCu {}

class _DeCuDiaDanhState extends State<DeCuDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<DiaDanhObject>>(
        future: DiaDanhProvider.fectDiaDanh(),
        builder: (context, snapshot) {
          if (snapshot.hasData) {
            List<DiaDanhObject> lsdd = snapshot.data!;
            return GridView.count(
              crossAxisCount: 2,
              shrinkWrap: true,
              physics: NeverScrollableScrollPhysics(),
              padding: EdgeInsets.all(10),
              mainAxisSpacing: 10,
              crossAxisSpacing: 10,
              childAspectRatio: 1.2,
              children: List.generate(lsdd.length, (index) {
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
                          child: InkWell(
                            onTap: () {
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) =>
                                        ChiTietDiaDanh(DD: lsdd[index])),
                              );
                            },
                            child: ClipRRect(
                              borderRadius: BorderRadius.circular(15),
                              child: Image.network(
                                httpsanh+lsdd[index].Dd_AnhBia,
                                width: double.infinity,
                                height: 400,
                                fit: BoxFit.cover,
                              ),
                            ),
                          ),
                        ),
                        Column(
                          mainAxisAlignment: MainAxisAlignment.end,
                          children: [
                            Container(
                              width: double.infinity,
                              height: 90,
                              padding: EdgeInsets.symmetric(
                                  horizontal: 5, vertical: 5),
                              decoration: BoxDecoration(
                                borderRadius: BorderRadius.only(
                                    bottomLeft: Radius.circular(23),
                                    bottomRight: Radius.circular(23)),
                                color: kCardInfoBG.withOpacity(0.3),
                              ),
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.end,
                                children: [
                                  SizedBox(
                                    height: 35,
                                    width: double.infinity,
                                    child: TextButton(
                                      onPressed: () {
                                        Navigator.push(
                                          context,
                                          MaterialPageRoute(
                                              builder: (context) =>
                                                  ChiTietDiaDanh(
                                                      DD: lsdd[index])),
                                        );
                                      },
                                      //  style: TextButton.styleFrom(
                                      //    padding: EdgeInsets.all(4),
                                      //   ),
                                      child: Text(
                                        lsdd[index].Dd_Ten,
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
                                              lsdd[index].Dd_DiaChi,
                                              overflow: TextOverflow.ellipsis,
                                              style: TextStyle(
                                                  color: Colors.white),
                                            ),
                                          ),
                                        ],
                                      ),
                                      Row(
                                        mainAxisAlignment:
                                            MainAxisAlignment.start,
                                        children: [
                                          RatingBarIndicator(
                                            rating: lsdd[index].Dd_DanhGia-0.1,
                                            itemBuilder: (_, __) {
                                              return Icon(
                                                Icons.star,
                                                color: Colors.amber,
                                              );
                                            },
                                            itemSize: 15,
                                          ),
                                        ],
                                      )
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
          return Text("data");
        });
  }
}
