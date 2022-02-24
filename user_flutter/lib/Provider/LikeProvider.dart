import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/class_chung.dart';

class LikeProvider {
  static Future<String> KtraLike(BuildContext context, String MaBV, String MaND) async {
    String url = https+'/KtraLike';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body,headers: {
      'Authorization': 'Bearer $tokens',
    });
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      sharedPreferences.setString("colike", jsonResponse["colike"]);
    }
    String a = (sharedPreferences.getString('colike') ?? "w");
    return a;
  }

  static Future<String> Like(int id) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");

    final response =await http.get(Uri.parse(https+'/Like/$id',),headers: {
      'Authorization': 'Bearer $tokens',
    });
        
    var jsons = json.decode(response.body);
    String a = jsons['like'].toString();
    return a;
  }

  static ThemLike(BuildContext context, String MaBV, String MaND) async {
    String url = https+'/Like';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    Map body = {'MaBaiViet': MaBV, 'MaNguoiDung': MaND};
    var response = await http.post(Uri.parse(url), body: body,headers: {
      'Authorization': 'Bearer $tokens',
    });
  }

  static XoaLike(BuildContext context, String MaBV, String MaND) async {
    String url = https+'/XoaLike';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body,headers: {
      'Authorization': 'Bearer $tokens',
    });
  }
}


