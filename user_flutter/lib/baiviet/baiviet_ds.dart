import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';

class MyApp extends StatefulWidget {
  const MyApp({ Key? key }) : super(key: key);

  @override
  _MyAppState createState() => _MyAppState();
}
Widget baiviet(){
  return ListTile(
      leading: Image.asset("assets/imgs/baiviets/test.jpg"),
  );
}
class _MyAppState extends State<MyApp> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        backgroundColor: Colors.white,  
        elevation: 0.0,
        leading:Image.asset('assets/logo/logo.png'),
        title: Text("Danh sách bài viết",style: TextStyle(color: Colors.black),),
        centerTitle: true,
        actions: [CircleAvatar(child: Text("D"),)],
      ),
      body: Column(
        children: [
          Stack(
                children: [
                  Container(
                width: 400,
                height: 200,
                decoration: BoxDecoration(borderRadius: BorderRadius.circular(23),
                image: DecorationImage(image: AssetImage("assets/imgs/baiviets/test.jpg"),
                fit: BoxFit.cover),
                ),
              ),
            Text("data",style: TextStyle(color: Colors.black),),
            ],
          )
        ],
      ),
    );
  }
}