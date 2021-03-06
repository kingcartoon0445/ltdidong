import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/colorplush.dart';
import 'BV_The.dart';
import 'BaiViet.dart';
import 'BV_chitiet.dart';

class Lst_baiviet extends StatefulWidget {
  int a; int ma;
  
  Lst_baiviet({Key? key, required this.a,required this.ma}) : super(key: key);
    
  @override
  _Lst_baivietState createState() {
    return _Lst_baivietState(a: a,ma:ma);
  }
}

class _Lst_baivietState extends State<Lst_baiviet> {
  int a;
  int ma;
  _Lst_baivietState({required this.a,required,required this.ma});
  @override
  Widget build(BuildContext context) {
    Future<List<BaiVietObject>>baivietFT;
    switch (a) {
      case 0: baivietFT=BaiVietProvider.fecthBaiViet();break;
      case 1:baivietFT=BaiVietProvider.BVNhieuLike();break;
      case 3:baivietFT=BaiVietProvider.BaiVietUS(ma.toString());break;
      default:baivietFT=BaiVietProvider.BVLienQuan(ma);break;
    }
    setState(() {
      
    });
    return FutureBuilder<List<BaiVietObject>>(
      future:baivietFT,
      builder: (context, snapshot) {
        if (snapshot.hasError) {
          return Center(
            child: Text('lỗi rồi'),
          );
        } else if (snapshot.hasData) {
          return ListBV(lsBv: snapshot.data!);
        }
        return SliverList(
            delegate: SliverChildListDelegate([Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ))]));
      },
    );
  }
}

class ListBV extends StatelessWidget {
  final List<BaiVietObject> lsBv;
  const ListBV({Key? key, required this.lsBv}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    try {
      return SliverList(
        delegate:lsBv.length==0?SliverChildListDelegate([
          Container(
            color: Colors.white,
            height: 370,
            child: Center(child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
            SvgPicture.asset(
                              'assets/imgs/svg/khongcoBV.svg',
                              height: 100,
                              width: 100,
                              color: Color(0xFF7D82BC),
                            ),
                            Text('Hiện chưa có bài viết',style: cabin_B(context,Color(0xFF4C56CE), 18.0),)
          ],),),)
        ])
        : SliverChildBuilderDelegate(
          (BuildContext context, int index) {
            return Container(
                color: Color(0xFFe1e1e1),
                child: Column(
                  children: [
                    card(BV: lsBv[index]),
                  ],
                ));
          },
          childCount: lsBv.length,
        ),
      );
    } catch (e) {
      return SliverList(
        delegate: SliverChildBuilderDelegate(
          (BuildContext context, int index) {
            return Column(
              children: [
                Center(
                  child: Text('Lỗi load dữ liệu'),
                )
              ],
            );
          },
          childCount: lsBv.length,
        ),
      );
    }
  }
}
