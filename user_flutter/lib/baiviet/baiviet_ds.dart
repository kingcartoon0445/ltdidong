import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/colorplush.dart';
import 'chuoibaiviet.dart';
import 'ListBaiviet.dart';

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
      body:  Column(
          children: [
            Text(
              'Bài viết nổi bật',
              style: TextStyle(),
            ),
              bv_decu(),
             chuoidecu(),
             Lst_baiviet(),
          ],
        ),
    );
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
      height: 150,
      child: Column(
        children: [
          Expanded(
            flex: 3,
            child: PageView.builder(
              onPageChanged: (value) {},
              controller: PageController(viewportFraction: 0.8, initialPage: 0),
              itemCount: 3, //đếm ảnh
              itemBuilder: (context, index) => Container(
                margin: EdgeInsets.only(right: 14),
                width: 356,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(23),
                    image: DecorationImage(
                      image: AssetImage("assets/imgs/baiviets/test.jpg"),
                      fit: BoxFit.cover,
                    )),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.end,
                  children: [
                    Container(
                      width: double.infinity,
                      height: 51,
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
                                fontSize: 15,
                                fontWeight: FontWeight.w700),
                          ),
                          Spacer(),
                          Row(
                            children: [
                              Icon(
                                Icons.place_outlined,
                                color: Colors.white,
                                size: 15,
                              ),
                              Text(
                                "Hạ Long, Quảng Ninh",
                                style: TextStyle(color: Colors.white,fontSize: 10,),
                              ),
                              Spacer(),
                              Text(
                                'data',
                                style: TextStyle(color: Colors.white,fontSize: 10,),
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

class gt_baiviet extends StatelessWidget {
  const gt_baiviet({ Key? key }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return 
    Container(
      margin: EdgeInsets.all(20),
       height: 68,
      child:Row(
        children: [
        Container(
          alignment: Alignment.topLeft,
          padding: EdgeInsets.all(20),
                    width: 144,
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(23), 
             image: DecorationImage(
                      image: AssetImage("assets/imgs/baiviets/test.jpg"),
                      fit: BoxFit.cover,),
          ),
        ),
        Expanded(child:  Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          children: [
          TextButton(onPressed: (){}, child: Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(color: Colors.black,fontWeight:FontWeight.bold,fontSize: 15),)), //#5
          ElevatedButton.icon(onPressed: (){},style:  ElevatedButton.styleFrom(primary: Colors.white,elevation: 0), icon: Icon(Icons.location_on_outlined,color: Color(0xFF4C56CE),), label: Text("Hạ Long, Quảng Ninh",style: TextStyle(fontSize: 12,color: Color(0xFF828282)),)),
        
        ],)),
      ],
    ),
  );
  }
}