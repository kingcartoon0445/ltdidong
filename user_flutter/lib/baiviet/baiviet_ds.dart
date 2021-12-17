import 'package:flutter/material.dart';

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
    return CustomScrollView(
      slivers: [
        SliverAppBar(
          backgroundColor: Colors.white,
          title: Text("Danh sách",style: TextStyle(color: Colors.black),),
          centerTitle: true,
          leading: Icon(Icons.ac_unit,color: Colors.black,),
          actions: [CircleAvatar(child: Text("D"),)],
        ),
       SliverToBoxAdapter(
         child: ListView(
           children: [
             baiviet(),
           ],
         ),
       )
      ],
    );
  }
}