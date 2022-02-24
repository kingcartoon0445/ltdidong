import 'dart:convert';
import 'dart:io';

import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';
import 'package:user_flutter/Hoang/login/page_login.dart';
import 'package:user_flutter/Provider/loginProvider.dart';

class RegisterPage extends StatefulWidget {
  @override
  State<StatefulWidget> createState() {
    return RegisterPageState();
  }
}

class RegisterPageState extends State<RegisterPage> {
  final txtEmail = TextEditingController();
  final txtPassword = TextEditingController();
  final txtHoten = TextEditingController();
  final txtSDT = TextEditingController();
  bool _obsecureText = true;
  bool isLoading = false;
  final _formKey = GlobalKey<FormState>();

  File? _image;
  String? downloadURL;

  Future pickImage() async {
    final pick = await ImagePicker().pickImage(source: ImageSource.gallery);

    setState(() {
      if (pick != null) {
        _image = File(pick.path);
      } else {
        final snackBar = SnackBar(content: Text("Chưa chọn ảnh"), duration: Duration(microseconds: 400));
        ScaffoldMessenger.of(context).showSnackBar(snackBar);
      }
    });

    Navigator.pop(context);
  }

  register() {
    try {
      LoginProvider.register(context, txtHoten.text, txtEmail.text, txtSDT.text, txtPassword.text, _image!)
          .then((result) {
        if (result == 1) {
          final snackBar = SnackBar(
            content: const Text('Tạo tài khoản thành công'),
            action: SnackBarAction(
              label: 'Undo',
              onPressed: () {
                // Some code to undo the change.
              },
            ),
          );
          ;
          ScaffoldMessenger.of(context).showSnackBar(snackBar);
          Navigator.of(context)
              .pushAndRemoveUntil(MaterialPageRoute(builder: (context) => LoginPage()), (route) => false);
        } else {
          final snackBar = SnackBar(
            content: const Text('Email hoặc số điện thoại đã tồn tại'),
            action: SnackBarAction(
              label: 'Undo',
              onPressed: () {
                // Some code to undo the change.
              },
            ),
          );
          ;
          ScaffoldMessenger.of(context).showSnackBar(snackBar);
        }
      });
    } catch (e) {
      final snackBar = SnackBar(
        content: const Text('Kết nối bị lỗi'),
        action: SnackBarAction(
          label: 'Undo',
          onPressed: () {
            // Some code to undo the change.
          },
        ),
      );
      ScaffoldMessenger.of(context).showSnackBar(snackBar);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      child:  Stack(
      children: [
        Container(
          decoration: BoxDecoration(
            image: DecorationImage(
              image: AssetImage('assets/imgs/login/register.jpg'),
              fit: BoxFit.cover,
              colorFilter: ColorFilter.mode(Colors.black38, BlendMode.darken),
            ),
          ),
        ),
      Container(
        padding: EdgeInsets.only(top: 20),
        child:    Scaffold(
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
                            'Đăng ký',
                            style: TextStyle(
                              fontSize: 30,
                              fontWeight: FontWeight.bold,
                              color: Colors.white,
                            ),
                          ),
                        ],
                      ),
                    ),
                    SizedBox(height: 50),
                    Container(
                      padding: EdgeInsets.symmetric(horizontal: 40),
                      child: Column(
                        children: [
                          Column(
                            children: [
                              Stack(
                                alignment: Alignment.center,
                                children: [
                                  Container(
                                    margin: EdgeInsets.symmetric(vertical: 30, horizontal: 30),
                                    child: CircleAvatar(
                                      radius: 71,
                                      backgroundColor: Color(0XFF7d82bc),
                                      child: CircleAvatar(
                                        radius: 65,
                                        backgroundImage: _image == null ? null : FileImage(_image!),
                                      ),
                                    ),
                                  ),
                                  Positioned(
                                    top: 120,
                                    left: 110,
                                    child: RawMaterialButton(
                                      elevation: 10,
                                      fillColor: Colors.blue.shade50,
                                      child: Icon(Icons.add_a_photo),
                                      padding: EdgeInsets.all(15),
                                      shape: CircleBorder(),
                                      onPressed: () {
                                        showDialog(
                                          context: context,
                                          builder: (BuildContext context) {
                                            return AlertDialog(
                                              title: Text(
                                                'Lựa chọn',
                                                style: TextStyle(fontWeight: FontWeight.w600),
                                              ),
                                              content: SingleChildScrollView(
                                                child: ListBody(
                                                  children: [
                                                    InkWell(
                                                      onTap: () {
                                                        pickImage();
                                                      },
                                                      splashColor: Colors.blue,
                                                      child: Row(
                                                        children: [
                                                          Padding(
                                                            padding: const EdgeInsets.all(8.0),
                                                            child: Icon(
                                                              Icons.image,
                                                              color: Colors.blue.shade100,
                                                            ),
                                                          ),
                                                          Text(
                                                            "Gallery",
                                                            style: TextStyle(
                                                              fontSize: 18,
                                                              fontWeight: FontWeight.w500,
                                                            ),
                                                          )
                                                        ],
                                                      ),
                                                    )
                                                  ],
                                                ),
                                              ),
                                            );
                                          },
                                        );
                                      },
                                    ),
                                  ),
                                ],
                              ),
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
                                    textInputAction: TextInputAction.next,
                                    obscureText: _obsecureText,
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
                                    controller: txtHoten,
                                    validator: (value) {
                                      if (value == null || value.isEmpty) {
                                        return 'Vui lòng nhập họ tên';
                                      }
                                    },
                                    decoration: InputDecoration(
                                      contentPadding: EdgeInsets.symmetric(vertical: 20),
                                      border: InputBorder.none,
                                      hintText: 'Họ tên',
                                      prefixIcon: Padding(
                                        padding: EdgeInsets.symmetric(horizontal: 20),
                                        child: Icon(
                                          Icons.info_outline,
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
                                    keyboardType: TextInputType.text,
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
                                    controller: txtSDT,
                                    validator: (value) {
                                      if (value == null || value.isEmpty) {
                                        return 'Vui lòng nhập SĐT';
                                      }
                                    },
                                    decoration: InputDecoration(
                                      contentPadding: EdgeInsets.symmetric(vertical: 20),
                                      border: InputBorder.none,
                                      hintText: 'Số điện thoại',
                                      prefixIcon: Padding(
                                        padding: EdgeInsets.symmetric(horizontal: 20),
                                        child: Icon(
                                          Icons.phone_android_outlined,
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
                                    keyboardType: TextInputType.phone,
                                    textInputAction: TextInputAction.next,
                                  ),
                                ),
                              ),
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
                                        borderRadius: BorderRadius.circular(50),
                                      ),
                                      child: MaterialButton(
                                        onPressed: () {
                                          if (_formKey.currentState!.validate()) {
                                            register();
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
                                          'Đăng ký',
                                          style: TextStyle(
                                            color: Colors.white,
                                            fontWeight: FontWeight.w600,
                                            fontSize: 18,
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
        ),),
      ],)
    );
  }
}
