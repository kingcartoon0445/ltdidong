import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'BV_The.dart';
import 'BaiViet.dart';
import 'BV_chitiet.dart';

class Lst_baiviet extends StatefulWidget {
  int a;
  Lst_baiviet({Key? key,required this.a}) : super(key: key);

  @override
  _Lst_baivietState createState() {
   return _Lst_baivietState(a:a);
  }
}

class _Lst_baivietState extends State<Lst_baiviet> {
  int a;
  _Lst_baivietState({required this.a});
  @override
  Widget build(BuildContext context) {
      return FutureBuilder<List<BaiVietObject>>(
        future:a==0? BaiVietProvider.fecthBaiViet():BaiVietProvider.BaiVietUS(context, a.toString()),
        builder: (context,snapshot){
          if(snapshot.hasError){
            return Center(
              child: Text('lỗi rồi'),
            );
          }else if(snapshot.hasData){
            return ListBV(lsBv:snapshot.data!);
          }
          return SliverList(  delegate: SliverChildListDelegate([CircularProgressIndicator()]));
        },
    );
  }
}

class ListBV extends StatelessWidget {
  final List<BaiVietObject> lsBv;
  const ListBV({ Key? key,required this.lsBv }) : super(key: key);

  @override
  Widget build(BuildContext context) {
   try {
      return  SliverList(
            delegate: SliverChildBuilderDelegate(
              (BuildContext context, int index) {
                return Container(color: Color(0xFFe1e1e1),child: Column(
          children: [
            card(BV: lsBv[index]),
          ],
            ) );}, childCount: lsBv.length,
        ),
      );
    } catch (e) {
      return SliverList(
            delegate: SliverChildBuilderDelegate(
              (BuildContext context, int index) {return Column(
          children: [
            Center(child: Text('Lỗi load dữ liệu'),)
          ],
              );}, childCount:lsBv.length,
        ),
      );
    } 
  }
}