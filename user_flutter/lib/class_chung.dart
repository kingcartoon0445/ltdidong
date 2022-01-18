import 'package:flutter/material.dart';
import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/Provider/NguoiDungProvider.dart';
import 'package:user_flutter/linhtinh/thongthin.dart';
import 'Object/ViewObject.dart';
import 'Object/diadanhObject.dart';
import 'Object/nguoidungObject.dart';
import 'Provider/DiaDanhProvider.dart';
import 'Provider/DiaDanhProvider.dart';
import 'Provider/ViewProvider.dart';
import 'colorplush.dart';
import 'package:flutter_svg/svg.dart';

Widget nut_Icon(var icon, var label, var on) {
  return ElevatedButton.icon(
    onPressed: () {
      on;
    },
    style: ElevatedButton.styleFrom(primary: Colors.white, elevation: 0),
    icon: icon,
    label: label,
  );
}

Widget Listdecu(var size, var flet, Widget wg) {
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
              itemBuilder: (context, index) => wg),
        ),
      ],
    ),
  );
}

Widget CardBv(Size size,BaiVietObject bv) {
  return  Container(
             decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.all(Radius.circular(30)),),
            padding: EdgeInsets.all(10),
            margin: EdgeInsets.only(bottom: 5, top: 5),
            child: Container(
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
                        image: NetworkImage('https://media-cdn.laodong.vn/Storage/NewsPortal/2021/5/26/913299/Ngan-Ha25.jpg'),
                        fit: BoxFit.cover,
                      ),
                    ),
                  ),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Container(
                        child: Text(
                          bv.Bv_TieuDe,
                          style: cabin_B(Colors.black, 18.0),
                          softWrap: true,
                        ),
                      ), //#5
                      ElevatedButton.icon(
                          onPressed: () {},
                          style: ElevatedButton.styleFrom(
                              primary: Colors.white, elevation: 0),
                          icon: SvgPicture.asset(
                            'assets/imgs/svg/gps1.svg',
                            color: Color(0xFF4C56CE),
                            height: 15 * size.height / 640,
                            width: 15 * size.width / 360,
                          ),
                          label: Text(bv.Bv_TenDD.toString(),
                              style: cabin_B(Color(0xFF828282), 15.0))),
                      TextButton(
                        onPressed: () {},
                        child: Text(bv.Bv_TenND.toString(),
                            style: cabin_B(Color(0xFF828282), 15.0)),
                      ),
                    ],
                  )
                ],
              ),
            ),
          );     
}

Widget tenDD(int id, Color mau, double size) {
  return FutureBuilder<List<DiaDanhObject>>(
      future: DiaDanhProvider.oneDiaDanh(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<DiaDanhObject> lsnd = snapshot.data!;
          return Text(
            lsnd[0].Dd_Ten,
            style: cabin_B(mau, size),
          );
        }
        return Text("data");
      });
}

Widget tenND(int id, Color mau, double size) {
  return FutureBuilder<List<NguoiDungObject>>(
      future: NguoiDungProvider.oneNguoiDung(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<NguoiDungObject> lsnd = snapshot.data!;
          return Text(
            lsnd[0].Nd_TenDaiDien,
            style: cabin_B(mau, size),
          );
        }
        return Text("data");
      });
}

Widget DemView(int id, Color mau, double size) {
  return FutureBuilder<String>(
      future: ViewProvider.oneView(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          String lsnd = snapshot.data!;
          return Text(
            ' ' + lsnd.length.toString(),
            style: cabin_B(mau, size),
          );
        }
        return Text("data");
      });
}

class LayAnh extends StatelessWidget {
  final int id;
  const LayAnh({ Key? key, required this.id }) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<AnhBaiVietObject>>(
      future: BaiVietProvider.layAnhBV(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<AnhBaiVietObject> lsAnhBV = snapshot.data!;
          return PageView.builder(
                  itemCount: 2,
                  itemBuilder: (context, index) => 
                  Container(
                    width: double.maxFinite,
                    decoration:  BoxDecoration(
                        image: DecorationImage(
                      image:NetworkImage('https://i1-dulich.vnecdn.net/2021/07/16/1-1626437591.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=BWzFqMmUWVFC1OfpPSUqMA'),
                      fit: BoxFit.cover,
                    )),
                  ),
                );
        }
        return Text("data");
      });
  }
}

Widget LayTT(int id){
   return FutureBuilder<List<NguoiDungObject>>(
      future: NguoiDungProvider.oneNguoiDung(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<NguoiDungObject> lsnd = snapshot.data!;
          return thongtin(ND: lsnd[0],);
        }
        return CircularProgressIndicator();;
      });
}
