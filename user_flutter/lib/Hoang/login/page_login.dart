import 'dart:convert';

import 'package:flutter/material.dart';
import '../../background.dart';
import '../api.dart';
import 'page_forgetPassword.dart';
import 'page_register.dart';
import 'package:http/http.dart' as http;

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

  login() async {
    var data = {
      'email': txtEmail.text.trim(),
      'password': txtPassword.text.trim()
    };

    var jsonResponser;
    var response = await CallApi().postData(data, 'login');

    if (response.statusCode == 200) {
      jsonResponser = json.decode(response.body);

      if (jsonResponser != null) {
        setState(() {
          isLoading = false;
        });

        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => Background()),
        );
      } else {
        setState(() {
          isLoading = false;
        });
      }
    } else {
      setState(() {
        isLoading = false;
      });

      const snackBar = SnackBar(
        content: Text('Đăng nhập thất bại'),
      );
      ScaffoldMessenger.of(context).showSnackBar(snackBar);
    }
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
                                    color:
                                        Colors.grey.shade600.withOpacity(0.5),
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
                                      contentPadding:
                                          EdgeInsets.symmetric(vertical: 20),
                                      border: InputBorder.none,
                                      hintText: 'Email',
                                      prefixIcon: Padding(
                                        padding: EdgeInsets.symmetric(
                                            horizontal: 20),
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
                                    color:
                                        Colors.grey.shade600.withOpacity(0.5),
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
                                      contentPadding:
                                          EdgeInsets.symmetric(vertical: 20),
                                      border: InputBorder.none,
                                      hintText: 'Mật khẩu',
                                      prefixIcon: Padding(
                                        padding: EdgeInsets.symmetric(
                                            horizontal: 20),
                                        child: Icon(
                                          Icons.lock_outline,
                                          color: Colors.white,
                                          size: 25,
                                        ),
                                      ),
                                      suffixIcon: IconButton(
                                        icon: Icon(
                                          _obsecureText
                                              ? Icons.visibility
                                              : Icons.visibility_off,
                                          color: Theme.of(context)
                                              .primaryColorLight,
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
                                    obscureText: true,
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
                                      child: CircularProgressIndicator(),
                                    )
                                  : Container(
                                      width: double.infinity,
                                      decoration: BoxDecoration(
                                        color: Color.fromRGBO(125, 130, 188, 1),
                                        borderRadius: BorderRadius.circular(20),
                                      ),
                                      child: MaterialButton(
                                        onPressed: () {
                                          if (_formKey.currentState!
                                              .validate()) {
                                            setState(() {
                                              isLoading = true;
                                            });
                                            login();
                                          }
                                        },
                                        minWidth: double.infinity,
                                        height: 60,
                                        color: Color.fromRGBO(125, 130, 188, 1),
                                        shape: RoundedRectangleBorder(
                                          side: BorderSide(color: Colors.black),
                                          borderRadius:
                                              BorderRadius.circular(50),
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