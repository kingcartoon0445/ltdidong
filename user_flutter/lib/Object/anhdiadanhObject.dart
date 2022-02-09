import 'package:flutter/cupertino.dart';

class AnhDiaDanhObject {
  final int ADD_Ma;
  final int ADD_MaBaiViet;
  final String ADD_Anh;
  final int ADD_TrangThai;
  AnhDiaDanhObject(
       this.ADD_Ma, this.ADD_MaBaiViet, this.ADD_Anh, this.ADD_TrangThai);
  AnhDiaDanhObject.fromjson(Map<String, dynamic> res)
      : ADD_Ma = res["id"],
        ADD_MaBaiViet = res["MaDiaDanh"],
        ADD_Anh = res['Anh'],
        ADD_TrangThai = res["TrangThai"];
}
