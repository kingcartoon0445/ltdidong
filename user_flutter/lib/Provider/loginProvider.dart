import 'dart:convert';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/background.dart';
import 'package:user_flutter/class_chung.dart';

class LoginProvider {
  static signIn(BuildContext context, String email, String password) async {
    String url = https + '/login';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    Map body = {'Email': email, 'MatKhau': password};
    var response = await http.post(Uri.parse(url),
        headers: <String, String>{'Accept': 'application/json'}, body: body);
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      sharedPreferences.setString("token", jsonResponse['token']);
      sharedPreferences.setInt("id", jsonResponse['id']);
      Navigator.of(context).pushAndRemoveUntil(
          MaterialPageRoute(builder: (context) => LayTT(jsonResponse['id'], 2)),
          (route) => false);
    }
  }

  static Future<int> register(BuildContext context, String HoTen, String Email,
      String sdt, String Matkhau, File img) async {
    String url = https + '/NguoiDung';
    try {
      var lst=[];
      lst.add( await MultipartFile.fromFile(img.path));
      print(lst);
      Dio dio = new Dio();
      img.existsSync();
      FormData formData = new FormData.fromMap({
        "AnhNen": await lst,
        'HovaTen': HoTen,
        'Email': Email,
        'SDT': sdt,
        'MatKhau': Matkhau,
      });
      final response = await dio.post(
        url,
        data: formData,
      );
      if (response.statusCode == 200)
        return 1;
      else
        return 0;
    } catch (e) {
      return 0;
    }
  }
}
