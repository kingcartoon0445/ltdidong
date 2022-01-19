import 'package:flutter/cupertino.dart';

class DiaDanhObject{
  final int Dd_Ma;
  final Image Dd_AnhBia;
  final String Dd_Ten;
  final String Dd_DiaChi;
  final int Dd_MaMien;
  final String Dd_TenMien;
  final String Dd_KinhDo;
  final String Dd_ViDo;
  final String Dd_MoTa;
  DiaDanhObject(this.Dd_Ma,this.Dd_AnhBia,this.Dd_Ten,this.Dd_DiaChi,this.Dd_MaMien,this.Dd_TenMien,this.Dd_KinhDo,this.Dd_ViDo,this.Dd_MoTa);
  DiaDanhObject.fromjson(Map<String,dynamic>res):
  Dd_Ma=res["id"],
  Dd_AnhBia=Image.network(res['AnhBia'],width: double.infinity,
                        height: 400,
                        fit: BoxFit.cover,),
  Dd_Ten=res["Ten"],
  Dd_DiaChi=res["DiaChi"],
  Dd_MaMien=res["MaMien"],
  Dd_TenMien=res['TenMien'],
  Dd_KinhDo=res["KinhDo"].toString(),
  Dd_ViDo=res["ViDo"].toString(),
  Dd_MoTa=res["MoTa"];
}