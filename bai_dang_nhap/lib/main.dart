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
            onPressed: () {
              setState(() {
                if (_email.text.isEmpty || _password.text.isEmpty) {
                  showAlertDialog(
                    context,
                    'Thông báo',
                    'Chưa nhập đầy đủ thông tin!',
                  );
                } else if (_email.text != _password.text) {
                  Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) => ErrorPage()),
                  );
                } else {
                  _loading = true;
                  _fieldvisible = false;
                  Future.delayed(Duration(seconds: 3), () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(builder: (context) => MailPage()),
                    );
                  });
                }
              });
            },
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

class ErrorPage extends StatefulWidget {
  const ErrorPage({Key? key}) : super(key: key);
  @override
  State<ErrorPage> createState() => _ErrorPage();
}

class _ErrorPage extends State<ErrorPage> {
  @override
  Widget build(BuildContext context) {
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
          child: Text("UPS... couldn't Sign in",
              style: TextStyle(fontSize: 25, color: Colors.white)),
        ),
        Padding(
          padding: EdgeInsets.all(15),
          child: Text("Your username and password don't match.",
              style: TextStyle(fontSize: 20, color: Colors.black)),
        ),
        Padding(
          padding: EdgeInsets.all(15),
          child: Text("Please try again.",
              style: TextStyle(fontSize: 20, color: Colors.black)),
        ),
      ],
    );

    Widget ReturnButton = Padding(
      padding: EdgeInsets.all(15),
      child: Container(
        height: 35,
        width: double.infinity,
        child: RaisedButton(
          onPressed: () {
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => LoginPage()),
            );
          },
          child: Text(
            'TRY AGAIN',
            style: TextStyle(fontSize: 15, color: Colors.white),
          ),
          color: Colors.black,
        ),
      ),
    );

    return Scaffold(
      backgroundColor: Colors.white,
      body: Center(
        child: Column(mainAxisAlignment: MainAxisAlignment.center, children: [
          TopSection,
          SizedBox(height: 100),
          ReturnButton,
        ]),
      ),
    );
  }
}

class MailPage extends StatefulWidget {
  const MailPage({Key? key}) : super(key: key);
  @override
  State<MailPage> createState() => _MailPage();
}

class _MailPage extends State<MailPage> {
  Container Mail_Header(String header_name) {
    return Container(
      color: Colors.grey.shade200,
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        mainAxisSize: MainAxisSize.max,
        children: [
          Text(
            header_name,
            style: TextStyle(
              fontSize: 18,
              color: Colors.grey.shade600,
            ),
          ),
        ],
      ),
      padding: EdgeInsets.all(10),
    );
  }

  Map<String, bool> _Types = {
    'All inboxes': false,
    'ICloud': false,
    'Gmail': false,
    'Hotmail': false,
    'VIP': false,
    'Secure': false,
    'Notifications': false,
  };

  CheckboxListTile Mail_Content(String content_name, int amount) {
    return CheckboxListTile(
      value: _Types[content_name],
      onChanged: (bool? value) {
        setState(() {
          _Types[content_name] = value!;
        });
      },
      title: Wrap(
        spacing: 12,
        children: [Icon(Icons.mail), Text(content_name)],
      ),
      secondary: Text(amount.toString()),
      controlAffinity: ListTileControlAffinity.leading,
    );
  }

  @override
  Widget build(BuildContext context) {
    List<String> text = ['All inboxes', 'ICloud'];
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        leading: IconButton(
          onPressed: () {
            Navigator.push(
                context, MaterialPageRoute(builder: (context) => LoginPage()));
          },
          icon: Icon(Icons.logout),
          color: Colors.blue,
        ),
        backgroundColor: Colors.grey.shade200,
        actions: [
          Padding(
            padding: EdgeInsets.all(18),
            child: TextButton(
              onPressed: () {},
              child: Text('Done', style: TextStyle(fontSize: 15)),
            ),
          ),
        ],
        title: Text('Mailboxes', style: TextStyle(color: Colors.black)),
        centerTitle: true,
      ),
      body: ListView(
        children: ListTile.divideTiles(context: context, tiles: [
          Mail_Header('Mailboxes'),
          Mail_Content('All inboxes', 10),
          Mail_Content('ICloud', 10),
          Mail_Content('Gmail', 10),
          Mail_Content('Hotmail', 10),
          Mail_Content('VIP', 10),
          Mail_Header('Special folders'),
          Mail_Content('Secure', 10),
          Mail_Content('Notifications', 10),
        ]).toList(),
      ),
      bottomNavigationBar: Container(
        height: 55,
        decoration: BoxDecoration(
          border: Border(
            top: BorderSide(color: Colors.blue, width: 2),
          ),
        ),
        child: OutlinedButton(
          onPressed: () {},
          style: OutlinedButton.styleFrom(
            backgroundColor: Colors.grey[300],
            primary: Colors.black,
          ),
          child: ListTile(
            title: Center(
              child: Text(
                'Update just now',
                style: TextStyle(fontSize: 20),
              ),
            ),
            trailing: Icon(Icons.upgrade),
          ),
        ),
      ),
    );
  }
}
