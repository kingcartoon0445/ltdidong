import 'dart:convert';
import 'dart:io';

import 'package:dio/dio.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/diadanhObject.dart';
import 'package:user_flutter/class_chung.dart';

class DiaDanhProvider {
  static List<DiaDanhObject> paraseDiaDanh(String reponseBody) {
    final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return parsed.map<DiaDanhObject>((e) => DiaDanhObject.fromjson(e)).toList();
  }

  static Future<List<DiaDanhObject>> fectDiaDanh() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response = await http.get(Uri.parse(https + '/diadanhs'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseDiaDanh(response.body);
  }

  static Future<List<DiaDanhObject>> oneDiaDanh(int ND_ID) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response =
        await http.get(Uri.parse(https + '/diadanhs/$ND_ID'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseDiaDanh(response.body);
  }

  static Future<String> themDD(
      String TenDD,
      String MienDD,
      String KDDD,
      String VDDD,
      String DiachiDDm,
      String DiachiDD,
      String MoTaDD,
      String tlDD,
      String NdDx,
      List<File> lstimg) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    String url = https + '/baiviets';
    var lst = [];
    Dio dio = new Dio();
    for (var img in lstimg) {
      print(lstimg.length);
      print(img.path);
      img.existsSync();
      lst.add(await MultipartFile.fromFile(img.path));
    }
    FormData formData = new FormData.fromMap({
      'Ten': TenDD,
      'MaMien': MienDD,
      'KinhDo': KDDD,
      'ViDo': VDDD,
      'DiaChi': DiachiDD,
      'MoTa': MoTaDD,
      'theloais': tlDD,
      'nd': NdDx,
      'hinh': await lst
    });
    final response = await dio.post(url,
        data: formData,
        options: Options(headers: {
          'Authorization': 'Bearer $tokens',
        }));
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = response.data.toString();
    }
    sharedPreferences.setString("bvmoi", jsonResponse);
    return jsonResponse.toString();
  }
}
