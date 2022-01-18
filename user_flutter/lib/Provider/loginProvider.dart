import 'dart:convert';
import 'dart:io';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/Hoang/login/page_login.dart';
import 'package:user_flutter/background.dart';

class LoginProvider{
 static signIn(BuildContext context,String email,String password) async{
    String url='http://10.0.2.2:8000/api/sanctum/token';
    SharedPreferences sharedPreferences= await SharedPreferences.getInstance();
    Map body={'email':email,'password':password};
    var   response= await http.post(Uri.parse(url),
    headers:<String,String>{'Accept':'application/json'},body:body); 
    var jsonResponse;
          if(response.statusCode==200){
            jsonResponse=json.decode(response.body);
          sharedPreferences.setString("token",jsonResponse['token']);
          sharedPreferences.setInt  ("id",jsonResponse['id']);
            print('response status:${response.statusCode}');
            print('response status:${response.body}');
            Navigator.of(context).pushAndRemoveUntil(MaterialPageRoute(builder:(context)=>Background(id: 1,)), (route) => false);
            print('response status:${response.body}');
          }
  }
}