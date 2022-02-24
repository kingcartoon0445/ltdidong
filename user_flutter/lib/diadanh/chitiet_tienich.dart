import 'package:flutter/material.dart';
import 'package:user_flutter/Object/TienIchObject.dart';

class ChiTietTienIch extends StatefulWidget {
  TienIchObject ti;
   ChiTietTienIch({Key? key,required this.ti}) : super(key: key);

  @override
  _ChiTietTienIchState createState(){
    return _ChiTietTienIchState(ti:ti);
  }
}

class _ChiTietTienIchState extends State<ChiTietTienIch> {
  TienIchObject ti;
  _ChiTietTienIchState({required this.ti});
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Material(
        child: Container(
          padding: EdgeInsets.only(top: 30),
          child: Column(
            children: [
              Container(
                height: 200,
                width: double.maxFinite,
                decoration: BoxDecoration(
                    borderRadius: BorderRadius.only(
                        bottomLeft: Radius.circular(30),
                        bottomRight: Radius.circular(30)),
                    image: DecorationImage(
                      image: AssetImage("assets/imgs/diadanh/VungTau.png"),
                      fit: BoxFit.cover,
                    )),
              ),
              Container(
                padding: EdgeInsets.symmetric(horizontal: 15, vertical: 20),
                child: Column(
                  children: [
                    Row(
                      children: [
                        Icon(
                          Icons.home,
                          color: Color(0xFF7D82BC),
                          size: 33,
                        ),
                        SizedBox(
                          width: 5,
                        ),
                        Text(
                          'Còn cái nịt',
                          style: TextStyle(
                              fontSize: 30,
                              color: Colors.black,
                              fontWeight: FontWeight.bold,
                              fontStyle: FontStyle.italic),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 15,
                    ),
                    Row(
                      children: [
                        Icon(Icons.location_on, color: Color(0xFF7D82BC)),
                        SizedBox(
                          width: 5,
                        ),
                        TextButton(
                          onPressed: () {},
                          child: Text(
                            'Hong có địa chỉ đâu bé ơi',
                            style: TextStyle(fontSize: 20, color: Colors.black),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 15,
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.start,
                      children: [
                        Icon(Icons.description, color: Color(0xFF7D82BC)),
                        SizedBox(
                          width: 5,
                        ),
                        Text(
                          'Mô tả',
                          style: TextStyle(
                              fontSize: 22,
                              color: Colors.black,
                              fontWeight: FontWeight.bold),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.start,
                      children: [
                        Expanded(
                          child: Text(
                            'Vịnh Hạ Long là một vịnh nhỏ thuộc phần bờ tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo của thành phố Hạ Long thuộc tỉnh Quảng Ninh.',
                            style: TextStyle(fontSize: 20, color: Colors.black),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 15,
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.start,
                      children: [
                        Icon(Icons.call, color: Color(0xFF7D82BC)),
                        SizedBox(
                          width: 5,
                        ),
                        Text(
                          'Số điện thoại',
                          style: TextStyle(
                              fontSize: 22,
                              color: Colors.black,
                              fontWeight: FontWeight.bold),
                        ),
                      ],
                    ),
                    SizedBox(
                      height: 5,
                    ),
                    Row(
                      children: [
                        Text(
                          '+180000000',
                          style: TextStyle(fontSize: 20, color: Colors.black),
                        ),
                      ],
                    ),
                  ],
                ),
              )
            ],
          ),
        ),
      ),
    );
  }
}
