import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:http/http.dart' as http;

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
        await http.get(Uri.parse('http://10.0.2.2:8000/api/BaiViet'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }

  static Future<List<AnhBaiVietObject>> layAnhBV(int id) async {
    final response = await http.get(
      Uri.parse('http://10.0.2.2:8000/api/AnhBaiViet/$id'),
    );
    return paraseAnhBV(response.body);
  }

  static Future<List<BaiVietObject>> BaiVietUS(
      BuildContext context, String a) async {
    String url = 'http://10.0.2.2:8000/api/BaiVietUS';
    Map body = {'id': a};
    var response = await http.post(Uri.parse(url), body: body);
    return paraseBaiViet(response.body);
  }
}
