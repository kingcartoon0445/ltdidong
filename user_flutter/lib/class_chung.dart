import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/TienIchObject.dart';
import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/Provider/NguoiDungProvider.dart';
import 'package:user_flutter/Provider/TienIchProvider.dart';
import 'package:user_flutter/diadanh/chitiet_diadanh.dart';
import 'package:user_flutter/diadanh/danhsachtienich.dart';
import 'package:user_flutter/linhtinh/thongthin.dart';
import 'Object/diadanhObject.dart';
import 'Object/nguoidungObject.dart';
import 'Provider/DiaDanhProvider.dart';
import 'Provider/ViewProvider.dart';
import 'colorplush.dart';
//Bài viết
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
            ' ' + lsnd.toString(),
            style: cabin_B(mau, size),
          );
        }
        return Text("data");
      });
}

class LayAnh extends StatefulWidget {
  final int id;
  const LayAnh({ Key? key,required this.id }) : super(key: key);

  @override
   _LayAnhState createState() {
   return  _LayAnhState(id:id);
  }
}
class _LayAnhState extends State<LayAnh> {
  final int id;
  _LayAnhState({required this.id});
  @override
  Widget build(BuildContext context) {
    return 
    
     FutureBuilder<List<AnhBaiVietObject>>(
      future: BaiVietProvider.layAnhBV(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<AnhBaiVietObject> lsAnhBV = snapshot.data!;
          return PageView.builder(
                  itemCount: lsAnhBV.length,
                  itemBuilder: (context, index) =>
                  Container(
                    width: double.maxFinite,
                    decoration:  BoxDecoration(
                        image: DecorationImage(
                      image:NetworkImage('http://10.0.2.2:8000/storage/upload/anhBaiViet/'+lsAnhBV[index].ABV_Anh),
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

//Địa danh
Widget LayDiaDanh(int id){
return FutureBuilder<List<DiaDanhObject>>(
      future: DiaDanhProvider.oneDiaDanh(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<DiaDanhObject> lsnd = snapshot.data!;
          return ChiTietDiaDanh(DD: lsnd[0]);
        }
        return Text("data");
      });
}

//Lay DS Tiện ích
Widget LayDsKhachSan(int idbv){
  return FutureBuilder<List<TienIchObject>>(
      future: TienIchProvider.DsKhachSan(idbv),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<TienIchObject> lsti = snapshot.data!;
          if(lsti.length==0){return Container(child:SvgPicture.asset(
            'assets/imgs/svg/hotel.svg',
            color: Colors.black,
            width: 200,
            height: 200,
          ),);}else{
          return DanhSachTienTich(Ti: lsti);}
        }
        return Text("data");
      });
}
Widget LayDsNhaHang(int idbv){
  return FutureBuilder<List<TienIchObject>>(
      future: TienIchProvider.DsNhaHang(idbv),
      builder: (context, snapshot) {
         if (snapshot.hasData) {
          List<TienIchObject> lsti = snapshot.data!;
          if(lsti.length==0){return Container(child:SvgPicture.asset(
            'assets/imgs/svg/nhahang.svg',
            width: 200,
            height: 200,
          ),);}else{
          return DanhSachTienTich(Ti: lsti);}
        }
        return Text("data");
      });
} 