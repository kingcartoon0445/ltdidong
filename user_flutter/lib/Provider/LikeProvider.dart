import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/class_chung.dart';

class LikeProvider {
  static Future<String> KtraLike(
      BuildContext context, String MaBV, String MaND) async {
    String url = https+'/KtraLike';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body);
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
        
    }
    String a = (sharedPreferences.getString('colike') ?? "w");
    return a;
  }

  static Future<String> Like(int id) async {
    final response =
        await http.get(Uri.parse(https+'/Like/$id'));
    var jsons = json.decode(response.body);
    String a = jsons['like'].toString();
    return a;
  }

  static ThemLike(BuildContext context, String MaBV, String MaND) async {
    String url = https+'/Like';
    Map body = {'MaBaiViet': MaBV, 'MaNguoiDung': MaND};
    var response = await http.post(Uri.parse(url), body: body);
  }

  static XoaLike(BuildContext context, String MaBV, String MaND) async {
    String url = https+'/XoaLike';
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body);
  }
}
