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

  static sua(String tenDD, String email,String HoTen,String SDT) async{
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
   
    String tokens = (sharedPreferences.getString('token') ?? "");
        int id = (sharedPreferences.getInt('id') ?? 0);

     String url = https + '/nguoidungs/'+id.toString();
    Map body = {'TenDaiDien': tenDD, 'HoTen': HoTen,'Email':email,'SDT':SDT};
      var response = await http.put(Uri.parse(url), headers: <String, String>{'Accept': 'application/json'}, body: body);
    
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      print("object");
    }
    }

}
