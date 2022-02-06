import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

class LikeProvider {
  static Future<String> KtraLike(BuildContext context, String MaBV, String MaND) async {
    String url = 'http://10.0.2.2:8000/api/KtraLike';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body);
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      sharedPreferences.setString("colike", jsonResponse['colike']);
    }
    String a = (sharedPreferences.getString('colike') ?? "w");
    return a;
  }

  static Future<String> Like(int id) async {
    final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/Like/$id'));
    var jsons = json.decode(response.body);
    String a = jsons['like'].toString();
    return a;
  }

  static ThemLike(BuildContext context, String MaBV, String MaND) async {
    String url = 'http://10.0.2.2:8000/api/Like';
    Map body = {'MaBaiViet': MaBV, 'MaNguoiDung': MaND};
    var response = await http.post(Uri.parse(url), body: body);
  }

  static XoaLike(BuildContext context, String MaBV, String MaND) async {
    String url = 'http://10.0.2.2:8000/api/XoaLike';
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body);
  }
}
