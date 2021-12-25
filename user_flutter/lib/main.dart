import 'package:flutter/material.dart';
import 'package:user_flutter/login/LoginPage.dart';
import 'package:user_flutter/login/WelcomePage.dart';
import 'background.dart';

void main() {
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
      home: Background(),
    );
  }
}
