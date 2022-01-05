import 'package:flutter/material.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Object/nguoidungObject.dart';
import 'package:user_flutter/Provider/NguoiDungProvider.dart';
import 'package:user_flutter/class_chung.dart';

import 'BV_chitiet.dart';
class card extends StatelessWidget {
  final BaiVietObject BV;
  const card({Key? key,required this.BV}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return FutureBuilder<List<NguoiDungObject>>(
      future:NguoiDungProvider.oneNguoiDung(BV.Bv_MaNguoiDung),
      builder: (context,snapshot){
        if(snapshot.hasData){
          List<NguoiDungObject> lsnd= snapshot.data!;
                return InkWell(
            onTap: () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (_) => ChiTiet(Bai: BV,),
                ),
              );
            },
            child: CardBv(size, "assets/imgs/baiviets/test.jpg", BV.Bv_TieuDe, BV.Bv_MaDiaDanh, lsnd[0].Nd_HovaTen),
          );
        }   return Text("data");
      }
    );
  }
}
