import 'package:flutter/material.dart';
class ChiTiet extends StatefulWidget {
  const ChiTiet({ Key? key }) : super(key: key);

  @override
  _ChiTietState createState() => _ChiTietState();
}

class _ChiTietState extends State<ChiTiet> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
    body: Material(child: 
     Expanded(
      child: Column(
        children: [
          Container(
            height: 227,
            width: double.maxFinite,
            child: PageView.builder(
                 itemCount: 3,
              itemBuilder: (context,index)=>Container(
                width: double.maxFinite,
                decoration: BoxDecoration(
                    image: DecorationImage(
                      image: AssetImage("assets/imgs/baiviets/test.jpg"),
                      fit: BoxFit.cover,
                    )),),
          )),
          Container(child: ListTile(leading:Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(fontSize: 25,fontWeight:FontWeight.bold),) ,
            title: Row( 
              mainAxisAlignment: MainAxisAlignment.end,
               children: [ Icon(Icons.remove_red_eye_outlined,color: Color(0xFF4C56CE),) 
               ,Text(" 200",style: TextStyle(fontSize: 15,fontWeight:FontWeight.bold,color: Color(0xFF828282))),],)
            ),),
          Container(child: Text("Nội dung"),),
          ]
        ),
       ),
      ),
      floatingActionButton: Row( mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          FloatingActionButton(
        onPressed: () {
          // Add your onPressed code here!
        },shape:RoundedRectangleBorder(
          
          borderRadius: BorderRadius.circular(10),
          side: BorderSide(color: Color(0xFF7D82BC),width: 3) 
        ) ,
        backgroundColor: Colors.white,
        child: const Icon(Icons.thumb_up_alt_outlined,color: Color(0xFF7D82BC)),
         heroTag: "fab1",
      ),
    FloatingActionButton(
        onPressed: () {
          // Add your onPressed code here!
        },shape:RoundedRectangleBorder(
          
          borderRadius: BorderRadius.circular(10),
          side: BorderSide(color: Color(0xFF7D82BC),width: 3) 
        ) ,
        backgroundColor: Colors.white,
        child: const Icon(Icons.thumb_down_alt_outlined,color: Color(0xFF7D82BC)),
         heroTag: "fab2",
      ),
    FloatingActionButton(
        onPressed: () {
          // Add your onPressed code here!
        },shape:RoundedRectangleBorder(
          
          borderRadius: BorderRadius.circular(10),
          side: BorderSide(color: Color(0xFF7D82BC),width: 3) 
        ) ,
        backgroundColor: Color(0xFF7D82BC),
        child: const Icon(Icons.share,color: Colors.white),
         heroTag: "fabe",
      ),
      ]),
    );
  }
}