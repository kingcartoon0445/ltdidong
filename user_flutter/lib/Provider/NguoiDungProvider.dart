import 'dart:convert';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:flutter/cupertino.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/nguoidungObject.dart';
import 'package:user_flutter/class_chung.dart';

class NguoiDungProvider {
  static List<NguoiDungObject> paraseNguoiDung(String reponseBody) {
    try {
      final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
      return parsed
          .map<NguoiDungObject>((e) => NguoiDungObject.fromjson(e))
          .toList();
    } catch (e) {
      return [];
    }
  }

  static Future<List<NguoiDungObject>> fecthNguoidung() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response = await http.get(Uri.parse(https+'/nguoidungs'),headers: {'Authorization': 'Bearer $tokens'});
    return paraseNguoiDung(response.body);
  }

  static Future<List<NguoiDungObject>> oneNguoiDung(int ND_ID) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response =await http.get(Uri.parse(https+'/nguoidungs/$ND_ID'),headers: {'Authorization': 'Bearer $tokens'});
    return paraseNguoiDung(response.body);
  }

  static sua(String tenDD, String email,String HoTen,String SDT,File AVT,String pw) async{
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String url = https + '/nguoidungs';
    String tokens = (sharedPreferences.getString('token') ?? "");
    Map body = {'TenDaiDien': tenDD, 'HoTen': HoTen,'Email':email,'SDT':SDT,'MatKhau':pw};
    
    FormData formData=new FormData.fromMap({
      'TenDaiDien':tenDD,
      'HoTen':HoTen,
      'Email':email,
      'SDT':SDT,
      'MatKhau':pw,
      'hinh': MultipartFile.fromFile(AVT.path)
    });
     Dio dio = new Dio();
    final response=await dio.patch(url,
          data: formData,
          options: Options(headers: {
            'Authorization': 'Bearer $tokens',
          }));
    }

}
