import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/class_chung.dart';

class BaiVietProvider {
  static List<BaiVietObject> paraseBaiViet(String reponseBody) {
    try {
      final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
      return parsed
          .map<BaiVietObject>((e) => BaiVietObject.fromjson(e))
          .toList();
    } catch (e) {
      return [];
    }
  }

  static List<AnhBaiVietObject> paraseAnhBV(String reponseBody) {
    final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return parsed
        .map<AnhBaiVietObject>((e) => AnhBaiVietObject.fromjson(e))
        .toList();
  }

  static Future<List<BaiVietObject>> fecthBaiViet() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response =
        await http.get(Uri.parse(https+'/baiviets'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }

  static Future<List<AnhBaiVietObject>> layAnhBV(int id) async {
    final response = await http.get(
      Uri.parse(https+'/AnhBaiViet/$id'),
    );
    return paraseAnhBV(response.body);
  }

   static Future<String> ThemBV(String TieuDe, String NoiDung,int MDD,int MND) async {
    String url = https+'/baiviets';
     Map body = {'TieuDe': TieuDe,'NoiDung':NoiDung,'MaDiaDanh':MDD.toString(),'MaNguoiDung':MND.toString()};
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    var response = await http.post(Uri.parse(url), body: body);
     if (response.statusCode == 200) {
       var jsonResponse = json.decode(response.body);
       sharedPreferences.setString("thanhcong", jsonResponse['thanhcong']);
     }
    String thanhcong= (sharedPreferences.getString('thanhcong') ?? "w");
    return thanhcong;
  } 

  static Future<List<BaiVietObject>> BaiVietUS(String a) async {
    String url = https+'/BaivietUS';
    Map body = {'id': a};
    var response = await http.post(Uri.parse(url), body: body);
    return paraseBaiViet(response.body);
  }
  static Future<List<BaiVietObject>> BaiVietDC()async{
   SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response =
        await http.get(Uri.parse(https+'/baiviettop5'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }
}
