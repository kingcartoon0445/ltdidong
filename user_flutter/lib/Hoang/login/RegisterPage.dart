import 'dart:io';

import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_storage/firebase_storage.dart';

import 'package:user_flutter/Hoang/login/LoginPage.dart';

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

  final _auth = FirebaseAuth.instance;

  File? _image;
  String? downloadURL;

  Future pickImage() async {
    final pick = await ImagePicker().pickImage(source: ImageSource.gallery);

    setState(() {
      if (pick != null) {
        _image = File(pick.path);
      } else {
        final snackBar = SnackBar(
            content: Text("Chưa chọn ảnh"),
            duration: Duration(microseconds: 400));
        ScaffoldMessenger.of(context).showSnackBar(snackBar);
      }
    });

    Navigator.pop(context);
  }

  Future uploadImage() async {
    Reference ref = FirebaseStorage.instance
        .ref()
        .child("users_images")
        .child(txtEmail.text + '.jpg');
    await ref.putFile(_image!);
    downloadURL = await ref.getDownloadURL();
  }

  @override
  Widget build(BuildContext context) {
    return Stack(
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
        Scaffold(
          appBar: AppBar(
            backgroundColor: Colors.transparent,
            elevation: 0.0,
          ),
          backgroundColor: Colors.transparent,
          body: SingleChildScrollView(
            child: SafeArea(
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
                                  margin: EdgeInsets.symmetric(
                                      vertical: 30, horizontal: 30),
                                  child: CircleAvatar(
                                    radius: 71,
                                    backgroundColor: Colors.pink,
                                    child: CircleAvatar(
                                      radius: 65,
                                      backgroundImage: _image == null
                                          ? null
                                          : FileImage(_image!),
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
                                              style: TextStyle(
                                                  fontWeight: FontWeight.w600),
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
                                                          padding:
                                                              const EdgeInsets
                                                                  .all(8.0),
                                                          child: Icon(
                                                            Icons.image,
                                                            color: Colors
                                                                .blue.shade100,
                                                          ),
                                                        ),
                                                        Text(
                                                          "Gallery",
                                                          style: TextStyle(
                                                            fontSize: 18,
                                                            fontWeight:
                                                                FontWeight.w500,
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
                                child: TextField(
                                  controller: txtEmail,
                                  decoration: InputDecoration(
                                    contentPadding:
                                        EdgeInsets.symmetric(vertical: 20),
                                    border: InputBorder.none,
                                    hintText: 'Email',
                                    prefixIcon: Padding(
                                      padding:
                                          EdgeInsets.symmetric(horizontal: 20),
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
                                child: TextField(
                                  controller: txtPassword,
                                  decoration: InputDecoration(
                                    contentPadding:
                                        EdgeInsets.symmetric(vertical: 20),
                                    border: InputBorder.none,
                                    hintText: 'Mật khẩu',
                                    prefixIcon: Padding(
                                      padding:
                                          EdgeInsets.symmetric(horizontal: 20),
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
                                        color:
                                            Theme.of(context).primaryColorLight,
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
                                child: TextField(
                                  controller: txtHoten,
                                  decoration: InputDecoration(
                                    contentPadding:
                                        EdgeInsets.symmetric(vertical: 20),
                                    border: InputBorder.none,
                                    hintText: 'Họ tên',
                                    prefixIcon: Padding(
                                      padding:
                                          EdgeInsets.symmetric(horizontal: 20),
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
                                child: TextField(
                                  controller: txtSDT,
                                  decoration: InputDecoration(
                                    contentPadding:
                                        EdgeInsets.symmetric(vertical: 20),
                                    border: InputBorder.none,
                                    hintText: 'Số điện thoại',
                                    prefixIcon: Padding(
                                      padding:
                                          EdgeInsets.symmetric(horizontal: 20),
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
                                  keyboardType: TextInputType.emailAddress,
                                  textInputAction: TextInputAction.next,
                                ),
                              ),
                            ),
                          ],
                        ),
                        Column(
                          children: [
                            SizedBox(height: 100),
                            Container(
                              width: double.infinity,
                              decoration: BoxDecoration(
                                color: Color.fromRGBO(125, 130, 188, 1),
                                borderRadius: BorderRadius.circular(20),
                              ),
                              child: MaterialButton(
                                onPressed: () async {
                                  try {
                                    uploadImage();
                                    if (downloadURL != null) {
                                      final newUser = await _auth
                                          .createUserWithEmailAndPassword(
                                              email: txtEmail.text,
                                              password: txtPassword.text);
                                      // ignore: unnecessary_null_comparison
                                      if (newUser != null) {
                                        User? user =
                                            FirebaseAuth.instance.currentUser;

                                        await FirebaseFirestore.instance
                                            .collection("accounts")
                                            .doc(user?.uid)
                                            .set({
                                          'ID': user?.uid,
                                          'Hoten': txtHoten.text,
                                          'Email': txtEmail.text,
                                          'Password': txtPassword.text,
                                          'SDT': txtSDT.text,
                                          'Role': 'user',
                                          'ImageUrl': downloadURL,
                                          'TimeUp': Timestamp.now(),
                                          'TrangThai': 1,
                                        });

                                        Navigator.pop(
                                            context, 'Đăng ký thành công!');
                                        Navigator.push(
                                            context,
                                            MaterialPageRoute(
                                                builder: (context) =>
                                                    LoginPage()));
                                      } else {
                                        final snackBar = SnackBar(
                                          content:
                                              Text("Tài khoản không tạo được!"),
                                        );
                                        ScaffoldMessenger.of(context)
                                            .showSnackBar(snackBar);
                                      }
                                    } else {
                                      final snackBar = SnackBar(
                                          content: Text(
                                              "Lỗi upload ảnh lên database"));
                                      ScaffoldMessenger.of(context)
                                          .showSnackBar(snackBar);
                                    }
                                  } catch (e) {
                                    final snackBar =
                                        SnackBar(content: Text("$e"));
                                    ScaffoldMessenger.of(context)
                                        .showSnackBar(snackBar);
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
      ],
    );
  }
}
