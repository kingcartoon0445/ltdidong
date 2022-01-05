import 'package:flutter/material.dart';
import 'package:user_flutter/Provider/NguoiDungProvider.dart';
import 'Object/ViewObject.dart';
import 'Object/diadanhObject.dart';
import 'Object/nguoidungObject.dart';
import 'Provider/DiaDanhProvider.dart';
import 'Provider/DiaDanhProvider.dart';
import 'Provider/ViewProvider.dart';
import 'colorplush.dart';
import 'package:flutter_svg/svg.dart';
Widget nut_Icon(var icon,var label,var on)
{
return ElevatedButton.icon(
                onPressed: (){on;},
                style:  ElevatedButton.styleFrom(primary: Colors.white,elevation: 0), 
                icon:  icon,
                label: label,
              );
            }

     
Widget Listdecu(var size,var flet,Widget wg)
{
  return SizedBox(
      width: double.infinity,
      height: 130 * size.height / 640,
      child: Column(
        children: [
          Expanded(
            flex: 3,
            child: PageView.builder(
              onPageChanged: (value) {},
              controller: PageController(viewportFraction: 0.8, initialPage: 0),
              itemCount: flet, //đếm ảnh
              itemBuilder: (context, index) =>wg
            ),
          ),
        ],
      ),
    );
}

Widget CardBv(var size,var img,var tieude,var diadanh,var tacgia){
 return FutureBuilder<List<DiaDanhObject>>(
      future:DiaDanhProvider.oneDiaDanh(diadanh),
      builder: (context,snapshot){
        if(snapshot.hasData){
          List<DiaDanhObject> lsdd= snapshot.data!;
                return  Padding(
        padding:
            const EdgeInsets.symmetric(horizontal: 20, vertical: 20 * 0.75),
        child: Row(
          children: [
            Container(
              alignment: Alignment.topLeft,
              padding: EdgeInsets.all(20),
              width: 144 * size.width / 360,
              height: 100 * size.height / 640,
              decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(23),
                image: DecorationImage(
                  image:AssetImage(img),
                  fit: BoxFit.cover,
                ),
              ),
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                child:
                Text(
                 tieude,
                  style: cabin_B(Colors.black, 15.0),softWrap: true,
                ), ),//#5
                ElevatedButton.icon(
                    onPressed: () {},
                    style: ElevatedButton.styleFrom(
                        primary: Colors.white, elevation: 0),
                    icon: SvgPicture.asset(
                      'assets/imgs/svg/gps.svg',
                      color: Color(0xFF4C56CE),
                      height: 15 * size.height / 640,
                      width: 15 * size.width / 360,
                    ),
                    label: Text(
                      lsdd[0].Dd_Ten.toString(),
                      style: cabin_B(Color(0xFF828282), 15.0)
                    )),
                TextButton(
                  onPressed: () {},
                  child: Text(
                    tacgia.toString(),
                    style: cabin_B(Color(0xFF828282), 15.0)
                  ),
                ),
              ],
            )
          ],
        ),
      );    

        }   return Text("data");
      }
    );
  }


  Widget tenDD(int id,Color mau, double size){
    return FutureBuilder<List<DiaDanhObject>>(
      future:DiaDanhProvider.oneDiaDanh(id),
      builder: (context,snapshot){
        if(snapshot.hasData){
          List<DiaDanhObject> lsnd= snapshot.data!;
               return Text(lsnd[0].Dd_Ten,style: cabin_B(mau, size),);
        }   return Text("data");
      }
    );
  }
   Widget tenND(int id,Color mau, double size){
    return FutureBuilder<List<NguoiDungObject>>(
      future:NguoiDungProvider.oneNguoiDung(id),
      builder: (context,snapshot){
        if(snapshot.hasData){
          List<NguoiDungObject> lsnd= snapshot.data!;
               return Text(lsnd[0].Nd_TenDaiDien,style: cabin_B(mau, size),);
        }   return Text("data");
      }
    );
  }

   Widget DemView(int id,Color mau, double size){
    return FutureBuilder<List<ViewObject>>(
      future:ViewProvider.oneView(id),
      builder: (context,snapshot){
        if(snapshot.hasData){
          List<ViewObject> lsnd= snapshot.data!;
               return Text(' '+lsnd.length.toString(),style: cabin_B(mau, size),);
        }   return Text("data");
      }
    );
  }
