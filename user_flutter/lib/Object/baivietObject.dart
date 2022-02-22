import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Object/diadanhObject.dart';
import 'package:user_flutter/Object/nguoidungObject.dart';

class BaiVietObject {
   int Bv_Ma;
   int Bv_MaNguoiDung;
   String Bv_TenND;
   int Bv_MaDiaDanh;
   String Bv_TenDD;
   String Bv_TieuDe;
   String Bv_NoiDung;
   List<AnhBaiVietObject> ABV=[];
  BaiVietObject({required this.Bv_Ma, required this.Bv_MaNguoiDung, required this.Bv_TenND,
      required this.Bv_MaDiaDanh, required this.Bv_TenDD, required this.Bv_TieuDe, required this.Bv_NoiDung,required this.ABV});
  factory BaiVietObject.fromjson(Map<String, dynamic> res)
      {
        var list = res['anh_bai_viets'] as List; //returns List<dynamic>
List<AnhBaiVietObject> ABVList = list.map((i) => AnhBaiVietObject.fromjson(i)).toList();
          return BaiVietObject(
        Bv_Ma: res["id"],
        Bv_MaNguoiDung: res['MaNguoiDung'],
        Bv_TenND: res['TenDaiDien'],
        Bv_MaDiaDanh: res["MaDiaDanh"],
        Bv_TenDD: res['Ten'],
        Bv_TieuDe: res["TieuDe"],
        Bv_NoiDung: res["NoiDung"],
        ABV: ABVList 
        );
      }
}