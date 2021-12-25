import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/colorplush.dart';
class thongtin extends StatefulWidget {
  const thongtin({ Key? key }) : super(key: key);

  @override
  _thongtinState createState() => _thongtinState();
}

class _thongtinState extends State<thongtin> {
  @override
  Widget build(BuildContext context) {
    return Container(
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          //AVT vs Tên
          Container(
            decoration: BoxDecoration(
              color: Color(0xFF7D82BC),
              borderRadius: BorderRadius.only(bottomRight: Radius.circular(40),bottomLeft: Radius.circular(40)), // Set rounded corner radius
            ),
            height: 170,
            width: 360,
             
             child: Padding(padding:EdgeInsets.all(15) ,child: Row(
               crossAxisAlignment: CrossAxisAlignment.center,
               mainAxisAlignment: MainAxisAlignment.spaceEvenly,
               children: [
                 Column( mainAxisAlignment: MainAxisAlignment.end,  children: [CircleAvatar(radius: 50, child: Text("s")),]),
                 Column( mainAxisAlignment: MainAxisAlignment.end,  children: [Text("Đen vậu",style: TextStyle(color: Colors.white,fontSize: 25,fontWeight: FontWeight.bold),),]),
             ],),
             ),
          ),Padding(padding: EdgeInsets.only(top:20,left: 40,bottom:10),child:
          Text("Thông tin",style: TextStyle(color: Colors.black,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold,fontSize: 20),),),
          Padding(padding: EdgeInsets.only(left:50,bottom: 10),child: Row(children: [Icon(Icons.map_sharp),Text("Da49 den619",style:cabin(Color(0xFF4C56CE), 15),),] ),), 
           Padding(padding: EdgeInsets.only(left:50,bottom: 10),child: Row(children: [Icon(Icons.map_sharp),Text("Địa chỉ",style:cabin(Color(0xFF4C56CE), 15),),] ),), 
            Padding(padding: EdgeInsets.only(left:50,bottom: 10),child: Row(children: [Icon(Icons.map_sharp),Text("03124123123",style:cabin(Color(0xFF4C56CE), 15),),] ),), 
        ],
      ),
    );
  }
}