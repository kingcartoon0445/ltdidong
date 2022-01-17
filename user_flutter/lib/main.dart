import 'dart:ffi';

import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Hoang/login/page_login.dart';
import 'package:user_flutter/Hoang/login/page_welcome.dart';
import 'package:user_flutter/background.dart';
import 'package:user_flutter/baiviet/BV_chitiet.dart';
import 'package:user_flutter/diadanh/chiase_baiviet.dart';
import 'package:user_flutter/diadanh/chitiet_tienich.dart';
import 'package:user_flutter/diadanh/danhsach_diadanh.dart';

import 'Hoang/login/page_register.dart';

void main() async {
  SharedPreferences sharedPreferences= await SharedPreferences.getInstance();
   String tokens=(sharedPreferences.getString('token')??"");
   int ids=(sharedPreferences.getInt('id')??0);
  runApp( MyApp(token: tokens,id:ids));
}

class MyApp extends StatelessWidget {
  String token;
  int id;
  MyApp({Key? key,required this.token,required this.id}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home:LoginPage(),
    );
  }
}
