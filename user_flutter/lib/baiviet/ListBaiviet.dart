import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'baiviet_ds.dart';
import 'baiviet_chitiet.dart';
class Lst_baiviet extends StatefulWidget {
  const Lst_baiviet({ Key? key }) : super(key: key);

  @override
  _Lst_baivietState createState() => _Lst_baivietState();
}

class _Lst_baivietState extends State<Lst_baiviet> {
  
  @override
  Widget build(BuildContext context) {
    return Expanded(
          child: ListView(
          children: [
            card(),
            card(),
            card(),
            card(),
            card(),
            card(),
            card(),
          ],
          ),
        );
  }
}
class card extends StatelessWidget {
  const card({ Key? key }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return InkWell(
      onTap: (){ Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (_) => ChiTiet(),
                      ),
                    );},
      child: Padding(
        padding: const EdgeInsets.symmetric(
            horizontal: 20, vertical: 20 * 0.75),
        child: Row(
          children: [
            Stack(
              children: [
                Container(height: 68,
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
              ],
            ),
            Expanded(child:  Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          children: [
          TextButton(onPressed: (){}, child: Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(color: Colors.black,fontFamily: 'Cabin_B',fontWeight: FontWeight.bold,fontSize: 15),)), //#5
          ElevatedButton.icon(onPressed: (){},style:  ElevatedButton.styleFrom(primary: Colors.white,elevation: 0), icon:  SvgPicture.asset('assets/imgs/svg/gps.svg',color: Color(0xFF4C56CE),height: 15,width: 15,), label: Text("Hạ Long, Quảng Ninh",style: TextStyle(fontSize: 12,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold,color: Color(0xFF828282)),)),
          TextButton(onPressed: (){}, child: Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(color: Color(0xFF828282),fontSize: 12,fontFamily: 'Cabin_B',fontWeight:FontWeight.bold),),),
        ],)),
          ],
        ),
      ),
    );
  }
}