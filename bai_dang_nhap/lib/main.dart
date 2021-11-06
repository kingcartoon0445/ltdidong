import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Demo',
      home: const LoginPage(),
    );
  }
}

showAlertDialog(BuildContext context, String _title, String _content) {
  AlertDialog alert = AlertDialog(
    title: Text(_title),
    content: Text(_content),
    actions: [
      TextButton(
        child: Text("OK"),
        onPressed: () {
          Navigator.pop(context);
        },
      ),
    ],
  );

  showDialog(
    context: context,
    builder: (BuildContext context) {
      return alert;
    },
  );
}  

class LoginPage extends StatefulWidget {
  const LoginPage({Key? key}) : super(key: key);
  
  @override
  State<LoginPage> createState() => _LoginPage();
}

class _LoginPage extends State<LoginPage> {
  bool _loading = false;
  bool _fieldvisible = true;

  final _email = TextEditingController();
  final _password = TextEditingController();

  @override
  Widget build(BuildContext context) {
    Widget LoadingSection = _loading
        ? Container(
            width: 70.0,
            height: 70.0,
            child: Padding(
              padding: const EdgeInsets.all(5.0),
              child: Center(
                child: CircularProgressIndicator(),
              ),
            ),
          )
        : Container();

    Widget TopSection = Column(
      children: [
        Padding(
          padding: EdgeInsets.all(15),
          child: Image.asset(
            "assets/img/logo.png",
            scale: 8.0,
          ),
        ),
        Padding(
          padding: EdgeInsets.all(15),
          child: Text('SignIn',
              style: TextStyle(fontSize: 35, color: Colors.white)),
        ),
        Padding(
          padding: EdgeInsets.all(15),
          child: Text('Speak, friend, and enter',
              style: TextStyle(fontSize: 20, color: Colors.black)),
        ),
      ],
    );

    Widget BodySection = Column(
      children: [
        Visibility(
          visible: _fieldvisible,
          child: Column(
            children: [
              Padding(
                padding: EdgeInsets.all(15),
                child: TextField(
                  controller: _email,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Colors.white,
                    border: OutlineInputBorder(),
                    labelText: 'Email',
                  ),
                ),
              ),
              Padding(
                padding: EdgeInsets.all(15),
                child: TextField(
                  controller: _password,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Colors.white,
                    border: OutlineInputBorder(),
                    labelText: 'Password',
                  ),
                ),
              ),
            ],
          ),
        )
      ],
    );

    Widget LoginButton = Visibility(
      visible: _fieldvisible,
      child: Padding(
        padding: EdgeInsets.all(15),
        child: Container(
          height: 35,
          width: double.infinity,
          child: RaisedButton(
            onPressed: () {},
            child: Text(
              'SIGN IN',
              style: TextStyle(fontSize: 15, color: Colors.white),
            ),
            color: Colors.black,
          ),
        ),
      ),
    );

    return Scaffold(
      backgroundColor: Colors.cyan.shade200,
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            TopSection,
            SizedBox(height: 30),
            BodySection,
            SizedBox(height: 30),
            LoginButton,
            Align(
              child: LoadingSection,
              alignment: FractionalOffset.center,
            ),
          ],
        ),
      ),
    );
  }
}
