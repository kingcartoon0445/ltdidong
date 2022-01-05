import 'package:flutter/material.dart';
import 'package:user_flutter/Hoang/login/page_login.dart';
import 'package:user_flutter/Hoang/login/page_welcome.dart';
import 'package:user_flutter/background.dart';
import 'package:user_flutter/diadanh/chiase_baiviet.dart';
import 'package:user_flutter/diadanh/danhsach_diadanh.dart';

import 'Hoang/login/page_register.dart';

void main() async {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: WelcomePage(),
    );
  }
}
