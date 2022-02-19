import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:user_flutter/Object/nguoidungObject.dart';
import 'package:user_flutter/class_chung.dart';
import 'package:user_flutter/colorplush.dart';

class settingTT extends StatefulWidget {
  final NguoiDungObject Nd;
  const settingTT({Key? key, required this.Nd}) : super(key: key);

  @override
  _settingTTState createState() {
    return _settingTTState(Nd: Nd);
  }
}

class _settingTTState extends State<settingTT> {
  final NguoiDungObject Nd;
  _settingTTState({required this.Nd});
  final txtEmail = TextEditingController();
  final txtTen = TextEditingController();
  final txtHoTen = TextEditingController();
  final txtSDT = TextEditingController();
  @override
  Widget build(BuildContext context) {
    txtEmail.text = Nd.Nd_emai;
    txtHoTen.text = Nd.Nd_TenDaiDien;
    txtSDT.text = Nd.Nd_SDT;
    txtTen.text = Nd.Nd_TenDaiDien;
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
          automaticallyImplyLeading: false,
          backgroundColor: Colors.white,
          elevation: 0,
          title: TextButton(
            onPressed: () {
              if (txtEmail.text != Nd.Nd_emai ||
                  txtHoTen.text != Nd.Nd_HovaTen ||
                  txtTen.text != Nd.Nd_TenDaiDien ||
                  txtSDT.text != Nd.Nd_SDT) {
                showDialog(
                    context: context,
                    builder: (BuildContext contex) {
                      return AlertDialog(
                        shape: RoundedRectangleBorder(
                            borderRadius:
                                BorderRadius.all(Radius.circular(35.0))),
                        title: Container(
                          child: Center(
                            child: Column(
                              children: [
                                ListTile(
                                  title: Text(
                                    'Bạn chưa lưu lại thay đổi ?',
                                    style: cabin(Colors.black, 20.0),
                                  ),
                                  subtitle: Text(
                                    'Bạn chắc chắn thoát khi chưa lưu? Tất cả những thay đổi của bạn sẽ bị huỷ',
                                    style: cabin(Colors.grey.shade400, 13.0),
                                  ),
                                ),
                                Row(
                                  mainAxisAlignment:
                                      MainAxisAlignment.spaceEvenly,
                                  children: [
                                    TextButton(
                                      onPressed: () {
                                        Navigator.pop(context);
                                      },
                                      child: Text(
                                        'Ở lại',
                                        style: cabin(Colors.black, 15.0),
                                      ),
                                      style: ButtonStyle(
                                        backgroundColor:
                                            MaterialStateProperty.all<Color>(
                                                Colors.grey.shade300),
                                        shape: MaterialStateProperty.all(
                                            RoundedRectangleBorder(
                                                borderRadius:
                                                    BorderRadius.circular(
                                                        10.0))),
                                      ),
                                    ),
                                    TextButton(
                                        onPressed: () {
                                          Navigator.pop(context);
                                        },
                                        child: Text(
                                          'Vẫn huỷ',
                                          style: cabin(Colors.white, 15.0),
                                        ),
                                        style: ButtonStyle(
                                          backgroundColor:
                                              MaterialStateProperty.all<Color>(
                                                  Colors.red.shade600),
                                          shape: MaterialStateProperty.all(
                                              RoundedRectangleBorder(
                                                  borderRadius:
                                                      BorderRadius.circular(
                                                          10.0))),
                                        ))
                                  ],
                                ),
                              ],
                            ),
                          ),
                        ),
                      );
                    });
              }
            },
            child: Text(
              'Huỷ',
              style: cabin(Colors.black, 20.0),
            ),
          )),
      body: SingleChildScrollView(
        child: Container(
          color: Colors.white,
          margin: EdgeInsets.only(left: 30, right: 30, top: 10),
          child: Column(
            children: [
              CircleAvatar(
                backgroundColor: Colors.white,
                backgroundImage: NetworkImage(httpsanh + Nd.Nd_AnhNen),
                radius: 70,
              ),
              TF(
                text: 'Tên đại diện',
                txt: txtTen,icons: 'user1.svg'.toString(),
              ),
              SizedBox(
                height: 15,
              ),
              TF(text: 'Email', txt: txtEmail,icons: "email.svg".toString(),),
              SizedBox(
                height: 15,
              ),
              TF(
                text: 'Họ và tên'.toString(),
                txt: txtHoTen,
                icons: 'user.svg'.toString(),
              ),
              SizedBox(
                height: 15,
              ),
              TF(
                text: 'Số điện thoại',
                txt: txtSDT,
                icons: 'sDT.svg'.toString(),
              ),
              SizedBox(
                height: 15,
              ),
              SizedBox(
                width: double.infinity,
                child: TextButton(
                  onPressed: () {},
                  child: ListTile(
                    leading: SvgPicture.asset(
                      'assets/imgs/svg/checkbox.svg',
                      color: Colors.white,
                      width: 30,
                      height: 30,
                    ),
                    title: Text("Lưu",
                        style: cabin_B(context, Colors.white, 20.0)),
                  ),
                  style: ButtonStyle(
                    backgroundColor:
                        MaterialStateProperty.all<Color>(Color(0xFF7D82BC)),
                    shape: MaterialStateProperty.all(RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(30.0))),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class TF extends StatefulWidget {
  final TextEditingController txt;
  final String text;
  final String icons;
  const TF({Key? key, required this.text, required this.txt,required this.icons}) : super(key: key);

  @override
  _TFState createState() {
    return _TFState(text: text, txt: txt,icons: icons);
  }
}

class _TFState extends State<TF> {
  final TextEditingController txt;
  final String text;
  final String icons;
  _TFState({required this.text, required this.txt,required this.icons});
  @override
  Widget build(BuildContext context) {
    return Container(
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
        child: ListTile(
          title: Text(text),
          subtitle: Container(
            decoration: BoxDecoration(
              color: Colors.grey.shade600.withOpacity(0.5),
              borderRadius: BorderRadius.circular(20),
            ),
            child: TextFormField(
              controller: txt,
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return 'Vui lòng nhập' + text;
                }
              },
              decoration: InputDecoration(
                contentPadding: EdgeInsets.symmetric(vertical: 20),
                border: InputBorder.none,
                hintText: text,
                prefixIcon: Padding(
                  padding: EdgeInsets.symmetric(horizontal: 20),
                  child: SvgPicture.asset(
                      'assets/imgs/svg/'+icons.toString(),
                      color: Colors.white,
                      height: 20 ,
                      width: 20,
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
        ));
  }
}
