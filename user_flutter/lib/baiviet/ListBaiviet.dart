import 'package:flutter/material.dart';
import 'baiviet_ds.dart';
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
      onTap: (){},
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
                            width: double.maxFinite*0.4,
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
          TextButton(onPressed: (){}, child: Text("Vẻ đẹp Vịnh Hạ Long",style: TextStyle(color: Colors.black,fontWeight:FontWeight.bold,fontSize: 15),)), //#5
          ElevatedButton.icon(onPressed: (){},style:  ElevatedButton.styleFrom(primary: Colors.white,elevation: 0), icon: Icon(Icons.location_on_outlined,color: Color(0xFF4C56CE),), label: Text("Hạ Long, Quảng Ninh",style: TextStyle(fontSize: 12,color: Color(0xFF828282)),)),
        
        ],)),
          ],
        ),
      ),
    );
  }
}