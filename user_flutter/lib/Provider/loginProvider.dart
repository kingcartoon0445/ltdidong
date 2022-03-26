import 'dart:convert';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/Hoang/login/page_login.dart';
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
       if(jsonResponse["message"] == 'sai'){
            var  snackBar = SnackBar(
            content: const Text('Email hoặc mật khẩu không đúng!'),
            action: SnackBarAction(
              label: 'Undo',
              onPressed: () {
                // Some code to undo the change.
              },
            ),
          );ScaffoldMessenger.of(context).showSnackBar(snackBar);
          }else{
      sharedPreferences.setString("token", jsonResponse['token']);
      sharedPreferences.setInt("id", jsonResponse['id']);
      Navigator.of(context).pushAndRemoveUntil(
          MaterialPageRoute(builder: (context) => LayTT(jsonResponse['id'], 2)),
          (route) => false);}
      
    }else{
      var snackBar = SnackBar(
            content: const Text('Email hoặc mật khẩu không đúng'),
            action: SnackBarAction(
              label: 'Undo',
              onPressed: () {
                // Some code to undo the change.
              },
            ),
          );ScaffoldMessenger.of(context).showSnackBar(snackBar); 
    }
  }

  static Future logout(BuildContext context,) async{
  SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    String url=https+'/logout';
    final respones=await http.get(Uri.parse(url),headers: {
       'Authorization': 'Bearer $tokens',
    });
    final jsonRespon=jsonDecode(respones.body); 
    if(jsonRespon['status']=='200'){
      Navigator.of(context).pushAndRemoveUntil(
                                    MaterialPageRoute(
                                        builder: (context) => LoginPage()),
                                    (route) => false);
        sharedPreferences.remove('token');                            
    }else{return false;}
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
