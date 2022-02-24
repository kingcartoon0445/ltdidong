import 'dart:io';

import 'package:flutter/material.dart';
import 'package:user_flutter/colorplush.dart';
import 'package:location/location.dart';

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
  //kinh độ địa danh mới
  double kinhdodd = 0;
  //vĩ độ địa danh mới
  double vidodd = 0;
  Location location = new Location();
  //kích hoạt truyền vị trí
  late bool _isServicEnable;
  //trạng thái truyền vị trí
  late PermissionStatus _permissionGranted;
  //dữ liệu truyền vị trí
  late LocationData _locationData;

  bool _isGetLocation = false;
  @override
  Widget build(BuildContext context) {
    String selectedValue = "--Miền--";
    return Scaffold(
      body: ListView(
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
                    maxLength: 300,
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
                      onPressed: () async {
                        _isServicEnable = await location.serviceEnabled();
                        if (!_isServicEnable) {
                          _isServicEnable = await location.requestService();
                          if (_isServicEnable) return;
                        }
                        _permissionGranted = await location.hasPermission();
                        if (_permissionGranted == PermissionStatus.denied) {
                          _permissionGranted =
                              await location.requestPermission();
                          if (_permissionGranted != PermissionStatus.granted)
                            return;
                        }
                        _locationData = await location.getLocation();

                        setState(() {
                          _isGetLocation = true;
                          kinhdodd = _locationData.longitude!;
                          vidodd = _locationData.latitude!;
                        });
                      },
                      child: Text('Lấy vị trí hiện tại')),
                ),
                _isGetLocation
                    ? Container(
                        child: Column(
                          children: [
                            TextFormField(
                              autocorrect: false,
                              autovalidateMode: AutovalidateMode.disabled,
                              keyboardType: TextInputType.number,
                              decoration: InputDecoration(
                                  labelText: 'Kinh độ địa danh'),
                              initialValue: /* _isGetLocation
                                  ? {_locationData.latitude}.toString()
                                  : null,*/
                                  vidodd.toString(),
                              onChanged: (newValue) {
                                setState(() {
                                  kinhdodd = double.tryParse(newValue) ?? 0;
                                });
                              },
                            ),
                            TextFormField(
                              autocorrect: false,
                              autovalidateMode: AutovalidateMode.disabled,
                              keyboardType: TextInputType.number,
                              decoration:
                                  InputDecoration(labelText: 'Vĩ độ địa danh'),
                              initialValue: /*_isGetLocation
                                  ? _locationData.longitude.toString()
                                  : null,*/
                                  kinhdodd.toString(),
                              onChanged: (newValue) {
                                setState(() {
                                  vidodd = double.tryParse(newValue) ?? 0;
                                });
                              },
                            ),
                          ],
                        ),
                      )
                    : Text('Vị trí hiện tại'),
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
            padding: EdgeInsets.only(bottom: 50, right: 30, left: 30),
            child: ElevatedButton(
              child: Text("Đề xuất"),
              style: ElevatedButton.styleFrom(
                onPrimary: Colors.white,
                primary: Color(0xFF7D82BC),
                onSurface: Colors.grey,
                elevation: 20,
                minimumSize: Size(150, 50),
                shadowColor: Colors.teal,
                shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(30)),
              ),
              onPressed: () {},
            ),
          )
        ],
      ),
    );
  }
}
