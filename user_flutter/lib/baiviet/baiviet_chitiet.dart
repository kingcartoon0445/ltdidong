import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/baiviet/ListBaiviet.dart';
class ChiTiet extends StatefulWidget {
  const ChiTiet({ Key? key }) : super(key: key);

  @override
  _ChiTietState createState() => _ChiTietState();
}

class _ChiTietState extends State<ChiTiet> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
    body: Material(child: Column(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Container(
            height: 227,
            width: double.maxFinite,
            child: PageView.builder(
                 itemCount: 3,
              itemBuilder: (context,index)=>Container(
                width: double.maxFinite,
                decoration: BoxDecoration(
                    image:  DecorationImage(
                      image: AssetImage("assets/imgs/baiviets/test.jpg"),
                      fit: BoxFit.cover,
                    )),),
          )),
          Container(
            child: ListTile(
            leading:
              Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(fontSize: 25,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold,overflow: TextOverflow.clip),),
            title: Row( 
              mainAxisAlignment: MainAxisAlignment.end,
              children: [
                Icon(Icons.remove_red_eye_outlined,size: 24,color: Color(0xFF4C56CE),),
                Text(" 200",style: TextStyle(fontSize: 15,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold,color: Color(0xFF828282))),],)
            ),),
          Container(
            child: ListTile(
          leading:
              FlatButton.icon(onPressed: (){}, icon: SvgPicture.asset('assets/imgs/svg/gps.svg', color: Color(0xFF4C56CE),height: 20,width: 20,), label: Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(fontSize: 15,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold,color: Color(0xFF828282)),),),
          trailing:FlatButton.icon(onPressed: (){},icon:  SvgPicture.asset('assets/imgs/svg/user.svg',height: 20,width: 20,color: Color(0xFF4C56CE),),label: Text(" Thanh Duy",style: TextStyle(fontSize: 15,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold,color: Color(0xFF828282))),),
          
              )
            ),
          Expanded(
            child:Container(
              child:ListView(
                      children: [
                        Padding(padding: EdgeInsets.only(right: 30,left: 30,top: 3,bottom: 90),child:Text("Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậyNội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậyNội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy Nội dung rất dài luôn không có chổ chứa nữa rồi làm sao đây xuống dòn nè có` bị gì ko vậy",
                  style: TextStyle(fontFamily: 'Cabin_B',overflow: TextOverflow.clip),),),
                ],
              ),
            ),
          ),
          ]
        ),
      ),
      floatingActionButton: Row( mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      crossAxisAlignment: CrossAxisAlignment.center,
        children: [
            FloatingActionButton.extended(
            onPressed: () {
              // Add your onPressed code here!
            },shape:RoundedRectangleBorder(
              
              borderRadius: BorderRadius.circular(10),
              side: BorderSide(color: Color(0xFF7D82BC),width: 3) 
            ) ,
            backgroundColor: Colors.white,
              label: Text("200",style: TextStyle(fontWeight: FontWeight.bold ,fontSize: 15,color:  Color(0xFF7D82BC),),),
              icon:SvgPicture.asset('assets/imgs/svg/like.svg',color: Color(0xFF7D82BC)),
            heroTag: "fab1",
          ),
             FloatingActionButton.extended(
            onPressed: () {
              // Add your onPressed code here!
            },shape:RoundedRectangleBorder(
              
              borderRadius: BorderRadius.circular(10),
              side: BorderSide(color: Color(0xFF7D82BC),width: 3) 
            ) ,
            backgroundColor: Colors.white,
              label: Text("200",style: TextStyle(fontWeight: FontWeight.bold ,fontSize: 15,color:  Color(0xFF7D82BC),),),
              icon:SvgPicture.asset('assets/imgs/svg/unlike.svg',color: Color(0xFF7D82BC)),
            heroTag: "fab2",
          ),
            FloatingActionButton.extended(
            onPressed: () {
              // Add your onPressed code here!
            },shape:RoundedRectangleBorder(
              
              borderRadius: BorderRadius.circular(10),
              side: BorderSide(color: Color(0xFF7D82BC),width: 3) 
            ) ,
            backgroundColor: Color(0xFF7D82BC),
              label: Text("200",style: TextStyle(fontWeight: FontWeight.bold ,fontSize: 15,color: Colors.white,),),
              icon:SvgPicture.asset('assets/imgs/svg/share.svg',color: Colors.white,),
            heroTag: "fab3",
          ),
      ]),
    );
  }
}