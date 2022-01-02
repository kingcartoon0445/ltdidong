import 'package:flutter/material.dart';
import 'package:user_flutter/Hoang/login/WelcomePage.dart';

import 'package:firebase_core/firebase_core.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp(
    options: FirebaseOptions(
        apiKey: 'AIzaSyDnUWJo1XdKivU32PdfzUqqYq2hXv4nQrU',
        appId: '1:822612642755:android:b84fba96d75c1a94910b76',
        messagingSenderId: '822612642755',
        projectId: 'csdldulich'),
  );

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
