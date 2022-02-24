import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/class_chung.dart';
import 'page_forgetPassword.dart';
import 'page_register.dart';
import 'package:user_flutter/Provider/loginProvider.dart';

class LoginPage extends StatefulWidget {
  @override
  State<StatefulWidget> createState() {
    return LoginPageState();
  }
}

class LoginPageState extends State<LoginPage> {
  final txtEmail = TextEditingController();
  final txtPassword = TextEditingController();
  final _formKey = GlobalKey<FormState>();
  bool _obsecureText = true;
  bool isLoading = false;
  login() {
    LoginProvider.signIn(context, txtEmail.text, txtPassword.text);
  }

  xet() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    int id = (sharedPreferences.getInt('id') ?? 0);
    if (tokens != "") {
      Navigator.of(context).pushAndRemoveUntil(MaterialPageRoute(builder: (context) => LayTT(id, 2)), (route) => false);
    }
  }

  @override
  initState() {
    super.initState();
    xet();
  }

  @override
  Widget build(BuildContext context) {
    return Stack(
      children: [
        Container(
          decoration: BoxDecoration(
            image: DecorationImage(
              image: AssetImage('assets/imgs/login/login.jpg'),
              fit: BoxFit.cover,
              colorFilter: ColorFilter.mode(Colors.black38, BlendMode.darken),
            ),
          ),
        ),
        Scaffold(
          appBar: AppBar(
            backgroundColor: Colors.transparent,
            elevation: 0.0,
          ),
          backgroundColor: Colors.transparent,
          body: SingleChildScrollView(
            child: SafeArea(
              child: Form(
                key: _formKey,
                child: Column(
                  children: [
                    Container(
                      height: 50,
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          Text(
                            'Đăng nhập',
                            style: TextStyle(
                              fontSize: 30,
                              fontWeight: FontWeight.bold,
                              color: Colors.white,
                            ),
                          ),
                        ],
                      ),
                    ),
                    SizedBox(height: 100),
                    Container(
                      padding: EdgeInsets.symmetric(horizontal: 40),
                      child: Column(
                        children: [
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.end,
                            children: [
                              Padding(
                                padding: EdgeInsets.symmetric(vertical: 12),
                                child: Container(
                                  decoration: BoxDecoration(
                                    color: Colors.grey.shade600.withOpacity(0.5),
                                    borderRadius: BorderRadius.circular(20),
                                  ),
                                  child: TextFormField(
                                    controller: txtEmail,
                                    validator: (value) {
                                      if (value == null || value.isEmpty) {
                                        return 'Vui lòng nhập email';
                                      }
                                    },
                                    decoration: InputDecoration(
                                      contentPadding: EdgeInsets.symmetric(vertical: 20),
                                      border: InputBorder.none,
                                      hintText: 'Email',
                                      prefixIcon: Padding(
                                        padding: EdgeInsets.symmetric(horizontal: 20),
                                        child: Icon(
                                          Icons.email_outlined,
                                          color: Colors.white,
                                          size: 25,
                                        ),
                                      ),
                                      hintStyle: TextStyle(
                                        fontSize: 15,
                                        color: Colors.white60,
                                      ),
                                    ),
                                    style: TextStyle(
                                      fontSize: 15,
                                      color: Colors.white,
                                    ),
                                    keyboardType: TextInputType.emailAddress,
                                    textInputAction: TextInputAction.next,
                                  ),
                                ),
                              ),
                              Padding(
                                padding: EdgeInsets.symmetric(vertical: 12),
                                child: Container(
                                  decoration: BoxDecoration(
                                    color: Colors.grey.shade600.withOpacity(0.5),
                                    borderRadius: BorderRadius.circular(20),
                                  ),
                                  child: TextFormField(
                                    controller: txtPassword,
                                    validator: (value) {
                                      if (value == null || value.isEmpty) {
                                        return 'Vui lòng nhập mật khẩu';
                                      }
                                      return null;
                                    },
                                    decoration: InputDecoration(
                                      contentPadding: EdgeInsets.symmetric(vertical: 20),
                                      border: InputBorder.none,
                                      hintText: 'Mật khẩu',
                                      prefixIcon: Padding(
                                        padding: EdgeInsets.symmetric(horizontal: 20),
                                        child: Icon(
                                          Icons.lock_outline,
                                          color: Colors.white,
                                          size: 25,
                                        ),
                                      ),
                                      suffixIcon: IconButton(
                                        icon: Icon(
                                          _obsecureText ? Icons.visibility : Icons.visibility_off,
                                          color: Theme.of(context).primaryColorLight,
                                        ),
                                        onPressed: () {
                                          setState(() {
                                            _obsecureText = !_obsecureText;
                                          });
                                        },
                                      ),
                                      hintStyle: TextStyle(
                                        fontSize: 15,
                                        color: Colors.white60,
                                      ),
                                    ),
                                    style: TextStyle(
                                      fontSize: 15,
                                      color: Colors.white,
                                    ),
                                    textInputAction: TextInputAction.done,
                                    obscureText: _obsecureText ? true : false,
                                  ),
                                ),
                              ),
                              TextButton(
                                onPressed: () {
                                  Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                      builder: (context) => ForgotPage(),
                                    ),
                                  );
                                },
                                child: Text(
                                  'Quên mật khẩu?',
                                  style: TextStyle(
                                    fontSize: 15,
                                    color: Colors.white,
                                  ),
                                ),
                              )
                            ],
                          ),
                          Column(
                            children: [
                              SizedBox(height: 100),
                              isLoading
                                  ? Container(
                                      child: CircularProgressIndicator(strokeWidth: 10),
                                    )
                                  : Container(
                                      width: double.infinity,
                                      decoration: BoxDecoration(
                                        color: Color.fromRGBO(125, 130, 188, 1),
                                        borderRadius: BorderRadius.circular(50),
                                      ),
                                      child: MaterialButton(
                                        onPressed: () {
                                          if (_formKey.currentState!.validate()) {
                                            login();
                                            setState(() {
                                              isLoading = true;
                                              Future.delayed(Duration(milliseconds: 3000), () {
                                                 
                                                setState(() {
                                                  isLoading = false;
                                                });
                                              });
                                            });
                                          }
                                        },
                                        minWidth: double.infinity,
                                        height: 60,
                                        color: Color.fromRGBO(125, 130, 188, 1),
                                        shape: RoundedRectangleBorder(
                                          side: BorderSide(color: Colors.black),
                                          borderRadius: BorderRadius.circular(50),
                                        ),
                                        child: Text(
                                          'Đăng nhập',
                                          style: TextStyle(
                                            color: Colors.white,
                                            fontWeight: FontWeight.w600,
                                            fontSize: 18,
                                          ),
                                        ),
                                      ),
                                    ),
                              SizedBox(height: 50),
                              Container(
                                child: TextButton(
                                  onPressed: () {
                                    Navigator.push(
                                      context,
                                      MaterialPageRoute(
                                        builder: (context) => RegisterPage(),
                                      ),
                                    );
                                  },
                                  child: Text(
                                    'Chưa có tài khoản?',
                                    style: TextStyle(
                                      fontSize: 15,
                                      color: Colors.white,
                                      decoration: TextDecoration.underline,
                                    ),
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ),
        ),
      ],
    );
  }
}
