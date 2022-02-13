import 'package:flutter/material.dart';
import 'package:flutter_svg/svg.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/Provider/ViewProvider.dart';
import 'package:user_flutter/baiviet/BV_chitiet.dart';
import 'package:user_flutter/class_chung.dart';


import '../colorplush.dart';

class bv_decu extends StatefulWidget {
  const bv_decu({Key? key}) : super(key: key);

  @override
  _bv_decuState createState() => _bv_decuState();
}

class _bv_decuState extends State<bv_decu> {
  void chonthe(BaiVietObject BV) async {
    String a;
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    int id = (sharedPreferences.getInt('id') ?? 0);
    ViewProvider.KtraView(context, BV.Bv_Ma.toString(), id.toString())
        .then((result) {
      a = result;
      if (a == '0') {
        ViewProvider.ThemView(context, BV.Bv_Ma.toString(), id.toString());
      }
    });
  }
  String xetanh(List<AnhBaiVietObject> a){
    // ignore: unnecessary_null_comparison
    if(a!=[]){
      return a[0].ABV_Anh;
    }else{
      return'images/no_image_holder.png';
    }
  }
  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return FutureBuilder<List<BaiVietObject>>(
        future: BaiVietProvider.BaiVietDC(),
        builder: (context, snapshot) {
          if (snapshot.hasData) {
            List<NetworkImage> lstAnh=[];
            List<BaiVietObject> lsbv = snapshot.data!;
            for(int i=0;i<lsbv.length;i++){
              try{
                lstAnh.add(NetworkImage(httpsanh+lsbv[i].ABV[0].ABV_Anh));
                }catch(e){
                  lstAnh.add(NetworkImage('https://vnn-imgs-a1.vgcloud.vn/icdn.dantri.com.vn/2021/05/26/ngo-ngang-voi-ve-dep-cua-hot-girl-anh-the-chua-tron-18-docx-1622043349706.jpeg'));
                }
            }
            return Container(
              padding: EdgeInsets.only(bottom: 20, top: 10),
              color: Colors.white,
              child: SizedBox(
                width: double.infinity,
                height: 180 * size.height / 640,
                child: Column(
                  children: [
                    Expanded(
                      flex: 3,
                      child: PageView.builder(
                        controller: PageController(
                            viewportFraction: 0.8, initialPage: 0),
                        itemCount: 5, //đếm ảnh
                        itemBuilder: (context, index) => InkWell(
                          onTap: () {
                            setState(() {
                              chonthe(lsbv[index]);
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                  builder: (_) => ChiTiet(
                                    Bai: lsbv[index],
                                  ),
                                ),
                              );
                            });
                          },
                          child: Container(
                            margin: EdgeInsets.only(right: 14),
                            width: 330 * size.width / 360,
                            decoration: BoxDecoration(
                                borderRadius: BorderRadius.circular(23),
                                image: DecorationImage(
                                  image: NetworkImage(httpsanh+lsbv[index].ABV[0].ABV_Anh),
                                  fit: BoxFit.cover,
                                )),
                            child: Column(
                              mainAxisAlignment: MainAxisAlignment.end,
                              children: [
                                Container(
                                  width: double.infinity,
                                  height: 60 * size.height / 640,
                                  padding: EdgeInsets.symmetric(
                                      horizontal: 23, vertical: 5),
                                  decoration: BoxDecoration(
                                    borderRadius: BorderRadius.only(
                                        bottomLeft: Radius.circular(23),
                                        bottomRight: Radius.circular(23)),
                                    color: kCardInfoBG.withOpacity(0.5),
                                  ),
                                  child: Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.stretch,
                                    mainAxisAlignment: MainAxisAlignment.start,
                                    children: [
                                      Text(
                                        lsbv[index].Bv_TieuDe,
                                        style: TextStyle(
                                            color: Colors.white,
                                            fontSize: 20,
                                            fontFamily: 'Cabin_B',
                                            fontWeight: FontWeight.bold),
                                      ),
                                      Spacer(),
                                      Row(
                                        children: [
                                          SvgPicture.asset(
                                            "assets/imgs/svg/gps.svg",
                                            color: Colors.white,
                                            height: 15 * size.height / 640,
                                            width: 15 * size.width / 360,
                                          ),
                                          Text(
                                            "Hạ Long, Quảng Ninh",
                                            style: TextStyle(
                                                color: Colors.white,
                                                fontSize: 15,
                                                fontFamily: 'Cabin_B',
                                                fontWeight: FontWeight.bold),
                                          ),
                                          Spacer(),
                                          Text(lsbv[index].Bv_TenND,style: cabin_B(context, Colors.white, 15.0),)

                                        ],
                                      )
                                    ],
                                  ),
                                ),
                              ],
                            ),
                          ),
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            );
          }
          return Container(
            color: Colors.white,
            child: Center(
              child: CircularProgressIndicator(strokeWidth: 10),
            ));
        });
  }
}
