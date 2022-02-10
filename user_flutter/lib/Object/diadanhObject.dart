import 'package:user_flutter/Object/anhdiadanhObject.dart';

class DiaDanhObject {
   int Dd_Ma;
   String Dd_AnhBia;
   String Dd_Ten;
   String Dd_DiaChi;
   int Dd_MaMien;
   String Dd_KinhDo;
   String Dd_ViDo;
   String Dd_MoTa;
   final Dd_DanhGia;
   List<AnhDiaDanhObject> ADD;
  DiaDanhObject({
      required this.Dd_Ma,
      required this.Dd_AnhBia,
      required this.Dd_Ten,
      required this.Dd_DiaChi,
      required this.Dd_MaMien,
      required this.Dd_KinhDo,
      required this.Dd_ViDo,
      required this.Dd_MoTa,
      required this.Dd_DanhGia,
      required this.ADD});
  factory DiaDanhObject.fromjson(Map<String, dynamic> res){
    var list = res['anh_dia_danhs'] as List;
//returns List<dynamic>
List<AnhDiaDanhObject> ADDList = list.map((i) => AnhDiaDanhObject.fromjson(i)).toList();
    return DiaDanhObject(Dd_Ma: res["id"],
        Dd_AnhBia: res['AnhBia'],
        Dd_Ten: res["Ten"],
        Dd_DiaChi: res["DiaChi"],
        Dd_MaMien: res["MaMien"],
        Dd_KinhDo: res["KinhDo"],
        Dd_ViDo: res["ViDo"],
        Dd_MoTa: res["MoTa"],
        Dd_DanhGia:res["danhgia"]+0.1,
        ADD: ADDList);
  }
}
