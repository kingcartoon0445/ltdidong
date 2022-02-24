import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/TienIchObject.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/Provider/NguoiDungProvider.dart';
import 'package:user_flutter/Provider/TienIchProvider.dart';
import 'package:user_flutter/background.dart';
import 'package:user_flutter/baiviet/BV_chitiet.dart';
import 'package:user_flutter/diadanh/chitiet_diadanh.dart';
import 'package:user_flutter/diadanh/danhsachtienich.dart';
import 'package:user_flutter/linhtinh/caidat.dart';
import 'package:user_flutter/linhtinh/thongthin.dart';
import 'Object/diadanhObject.dart';
import 'Object/nguoidungObject.dart';
import 'Provider/DiaDanhProvider.dart';
import 'Provider/ViewProvider.dart';
import 'colorplush.dart';

//HTTP

//lệnh chạy php: php artisan serve --host 192.168.139.126 --port 8000
String https = 'http://192.168.139.126:8000/api';
String httpsanh = 'http://192.168.139.126:8000';

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
            style: cabin_B(context, mau, size),
          );
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
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
            style: cabin_B(context, mau, size),
          );
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
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
            style: cabin_B(context, mau, size),
          );
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}

Widget LayDD(int id) {
  return FutureBuilder<List<DiaDanhObject>>(
      future: DiaDanhProvider.oneDiaDanh(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<DiaDanhObject> lsdd = snapshot.data!;
          return ChiTietDiaDanh(DD: lsdd[0]);
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}

Widget LayTT(int id, int dinhdanh) {
  return FutureBuilder<List<NguoiDungObject>>(
      future: NguoiDungProvider.oneNguoiDung(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<NguoiDungObject> lsnd = snapshot.data!;
          switch (dinhdanh) {
            case 2:
              return Background(ND: lsnd[0]);
            case 3:
              return CaiDat(ND: lsnd[0]);
              break;
            default:
              return thongtin(ND: lsnd[0]);
          }
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}

Widget LayAVT(int id) {
  return FutureBuilder<List<NguoiDungObject>>(
      future: NguoiDungProvider.oneNguoiDung(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<NguoiDungObject> lsnd = snapshot.data!;
          return Container();
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));;
      });
}

//Địa danh
Widget LayDiaDanh(int id) {
  return FutureBuilder<List<DiaDanhObject>>(
      future: DiaDanhProvider.oneDiaDanh(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<DiaDanhObject> lsnd = snapshot.data!;
          return ChiTietDiaDanh(DD: lsnd[0]);
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}

//Lay DS Tiện ích
Widget LayDsKhachSan(int idbv) {
  return FutureBuilder<List<TienIchObject>>(
      future: TienIchProvider.DsKhachSan(idbv),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<TienIchObject> lsti = snapshot.data!;
          if (lsti.length == 0) {
            return Container(
              child: SvgPicture.asset(
                'assets/imgs/svg/hotel.svg',
                color: Color(0XFF7d82bc),
                width: 150,
                height: 150,
              ),
            );
          } else {
            return DanhSachTienTich(Ti: lsti);
          }
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}

Widget LayDsNhaHang(int idbv) {
  return FutureBuilder<List<TienIchObject>>(
      future: TienIchProvider.DsNhaHang(idbv),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<TienIchObject> lsti = snapshot.data!;
          if (lsti.length == 0) {
            return Container(
              child: SvgPicture.asset(
                'assets/imgs/svg/nhahang.svg',
                color: Color(0XFF7d82bc),
                width: 150,
                height: 150,
              ),
            );
          } else {
            return DanhSachTienTich(Ti: lsti);
          }
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}

Widget layBV(int id){
   return FutureBuilder<List<BaiVietObject>>(
      future: BaiVietProvider.oneBaiViet(id),
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          List<BaiVietObject> lsnd = snapshot.data!;
          return ChiTiet(Bai: lsnd[0]);
        }
        return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
      });
}
