import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'BV_The.dart';
import 'BaiViet.dart';
import 'BV_chitiet.dart';

class Lst_baiviet extends StatefulWidget {
  const Lst_baiviet({Key? key}) : super(key: key);

  @override
  _Lst_baivietState createState() => _Lst_baivietState();
}

class _Lst_baivietState extends State<Lst_baiviet> {
  @override
  Widget build(BuildContext context) {
    return Expanded(
      child: FutureBuilder<List<BaiVietObject>>(
        future: BaiVietProvider.fecthBaiViet(),
        builder: (context,snapshot){
          if(snapshot.hasError){
            return Center(
              child: Text('lỗi rồi'),
            );
          }else if(snapshot.hasData){
            return Container(color: Color(0xFFe1e1e1),child:ListBV(lsBv:snapshot.data!));
          }
          return Container();
        },
      ),
    );
  }
}

class ListBV extends StatelessWidget {
  final List<BaiVietObject> lsBv;
  const ListBV({ Key? key,required this.lsBv }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      itemCount: lsBv.length,
        itemBuilder: (context, index) => Column(
          children: [
            card(BV: lsBv[index]),
          ],
        ),
      );
  }
}