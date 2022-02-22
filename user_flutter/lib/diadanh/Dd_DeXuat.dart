import 'dart:io';

import 'package:flutter/material.dart';
import 'package:user_flutter/colorplush.dart';

class addDD extends StatefulWidget {
  const addDD({Key? key}) : super(key: key);

  @override
  _addDDState createState() => _addDDState();
}

List<DropdownMenuItem<String>> get dropdownItems {
  List<DropdownMenuItem<String>> menuItems = [
    DropdownMenuItem(child: Text("--Miền--"), value: "--Miền--"),
    DropdownMenuItem(child: Text("Bắc"), value: "1"),
    DropdownMenuItem(child: Text("Trung"), value: "2"),
    DropdownMenuItem(child: Text("Nam"), value: "3"),
  ];
  return menuItems;
}

class _addDDState extends State<addDD> {
  List<File> files = [];
  final txtMota = TextEditingController();
  @override
  Widget build(BuildContext context) {
    String selectedValue = "--Miền--";
    return Scaffold(
      appBar: AppBar(
        shadowColor: Colors.white,
        backgroundColor: Colors.white,
        title:Center(child:Text('Đề xuất địa danh',style: cabin_B(context, Colors.black, 25.0),),) 
      ),
      body:
       ListView(
        children: [
          Container(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                Container(
                  padding: EdgeInsets.all(20),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      CircleAvatar(
                        radius: 100,
                        child: Text('N'),
                      ),
                    ],
                  ),
                ),
                Container(
                  margin: EdgeInsets.all(12),
                  height: 5 * 24.0,
                  padding: EdgeInsets.all(12),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(18),
                    boxShadow: [
                      BoxShadow(
                        color: Colors.grey.withOpacity(0.5),
                        spreadRadius: 5,
                        blurRadius: 7,
                        offset: Offset(0, 2),
                      ),
                    ],
                  ),
                  child: TextFormField(
                    maxLines: 5,
                    controller: txtMota,
                    validator: (value) {
                      if (value == null || value.isEmpty) {
                        return 'Vui lòng nhập mô tả';
                      }
                    },
                    decoration: InputDecoration(
                      contentPadding: EdgeInsets.symmetric(vertical: 20),
                      border: InputBorder.none,
                      hintText: 'Mô tả',
                      hintStyle: TextStyle(
                        fontSize: 15,
                        color: Colors.black87,
                      ),
                    ),
                    style: TextStyle(
                      fontSize: 15,
                      color: Colors.black87,
                    ),
                    textInputAction: TextInputAction.next,
                  ),
                ),
                Container(
                  margin: EdgeInsets.all(12),
                  decoration: BoxDecoration(
                    boxShadow: [
                      BoxShadow(
                        color: Colors.grey.withOpacity(0.5),
                        spreadRadius: 5,
                        blurRadius: 7,
                        offset: Offset(0, 2),
                      ),
                    ],
                  ),
                  child: DropdownButtonFormField(
                      decoration: InputDecoration(
                        enabledBorder: OutlineInputBorder(
                          borderSide: BorderSide(color: Colors.grey, width: 2),
                          borderRadius: BorderRadius.circular(20),
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Colors.blue, width: 2),
                          borderRadius: BorderRadius.circular(20),
                        ),
                        filled: true,
                        fillColor: Colors.white,
                      ),
                      dropdownColor: Colors.white,
                      value: selectedValue,
                      style: TextStyle(color: Colors.black),
                      onChanged: (String? newValue) {
                        setState(() {
                          selectedValue = newValue!;
                        });
                      },
                      items: dropdownItems),
                ),
              ],
            ),
          ),
          Container(
            padding: EdgeInsets.all(20),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Container(
                    child: Text(
                  'Vị Trí',
                  style: cabin_B(context, Colors.black, 25.0),
                )),
                Container(
                  padding: EdgeInsets.only(left: 80, right: 80, top: 20),
                  child: ElevatedButton(
                    child: Text(
                      "Lấy vị trí",
                      style: cabin_B(context, Colors.white, 18.0),
                    ),
                    style: ElevatedButton.styleFrom(
                      onPrimary: Colors.white,
                      primary: Color(0xFF7D82BC),
                      onSurface: Colors.grey,
                      minimumSize: Size(150, 50),
                      shadowColor: Colors.teal,
                      shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(30)),
                    ),
                    onPressed: () {},
                  ),
                ),
                Container(
                  child: Text(
                    'Khách sạn',
                    style: cabin_B(context, Colors.black, 25.0),
                  ),
                ),
                Container(
                  padding: EdgeInsets.only(left: 80, right: 80, top: 20),
                  child: ElevatedButton(
                    child: Text(
                      "Thêm khách sạn +",
                      style: cabin_B(context, Colors.white, 18.0),
                    ),
                    style: ElevatedButton.styleFrom(
                      onPrimary: Colors.white,
                      primary: Color(0xFF7D82BC),
                      onSurface: Colors.grey,
                      minimumSize: Size(150, 50),
                      shadowColor: Colors.teal,
                      shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(30)),
                    ),
                    onPressed: () {},
                  ),
                ),
                Container(
                  child: Text(
                    'Nhà hàng',
                    style: cabin_B(context, Colors.black, 25.0),
                  ),
                ),
                Container(
                  padding: EdgeInsets.only(left: 80, right: 80, top: 20),
                  child: ElevatedButton(
                    child: Text(
                      "Thêm nhà hàng +",
                      style: cabin_B(context, Colors.white, 18.0),
                    ),
                    style: ElevatedButton.styleFrom(
                      onPrimary: Colors.white,
                      primary: Color(0xFF7D82BC),
                      onSurface: Colors.grey,
                      minimumSize: Size(150, 50),
                      shadowColor: Colors.teal,
                      shape: RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(30)),
                    ),
                    onPressed: () {},
                  ),
                ),
                Container(
                    child: Text(
                  'Thêm ảnh',
                  style: cabin_B(context, Colors.black, 25.0),
                )),
                files.length == 0
                    ? Container(
                        height: 160,
                        width: 90,
                        child: IconButton(
                            onPressed: () {},
                            icon:
                                Image.asset('assets/imgs/diadanh/noimage.jpg')))
                    : Container(
                        height: 160,
                        width: 90,
                        child: PageView.builder(
                          controller: PageController(
                              viewportFraction: 0.8, initialPage: 0),
                          itemCount: files.length, //đếm ảnh
                          itemBuilder: (context, index) => InkWell(
                            onTap: () {},
                            child: Container(
                              height: 300,
                              width: 500,
                              margin: EdgeInsets.only(right: 14),
                              decoration: BoxDecoration(
                                  image: DecorationImage(
                                      image: FileImage(files[index]),
                                      fit: BoxFit.scaleDown)),
                            ),
                          ),
                        ),
                      ),
              ],
            ),
          ),
          Container(
            padding: EdgeInsets.only(bottom: 50,right:30,left: 30),
            child:ElevatedButton(
              child: Text("Đề xuất"),
              style: ElevatedButton.styleFrom(
                 onPrimary: Colors.white,
                 primary: Color(0xFF7D82BC),
                 onSurface: Colors.grey,
                 elevation: 20,
                 minimumSize: Size(150,50),
                 shadowColor: Colors.teal,
                 shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30)),
               ),
              onPressed:() {

              },
            )
         ,)
          ],
      ),
    );
  }
}
