import 'dart:io';

import 'package:file_picker/file_picker.dart';
import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';
import 'package:image_picker/image_picker.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/diadanhObject.dart';
import 'package:user_flutter/Provider/BaivietProvider.dart';
import 'package:user_flutter/baiviet/BaiViet.dart';
import 'package:user_flutter/class_chung.dart';


class ChiaSeBaiViet extends StatefulWidget {
  final DiaDanhObject TTDD;
  const ChiaSeBaiViet({Key? key, required this.TTDD}) : super(key: key);

  @override
  _ChiaSeBaiVietState createState(){
return _ChiaSeBaiVietState(TTDD:TTDD);
  }
}

double rak=5;

class _ChiaSeBaiVietState extends State<ChiaSeBaiViet> {
  final DiaDanhObject TTDD;
  _ChiaSeBaiVietState({required this.TTDD});
  int id=0;
  layid() async{
SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
     id = (sharedPreferences.getInt('id') ?? 0);
  }
  
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Material(
        child: Container(
            padding: const EdgeInsets.only(top: 30),
            child: SingleChildScrollView(
              child: ThongTinDiaDanh(DD:TTDD),
            )),
      ),
    );
  }
}

class Rating extends StatefulWidget {
  const Rating({Key? key}) : super(key: key);

  @override
  _RatingState createState() => _RatingState();
}

class _RatingState extends State<Rating> {
  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.start,
      children: [
        RatingBar.builder(
          initialRating: 3,
          minRating: 1,
          direction: Axis.horizontal,
          allowHalfRating: true,
          itemBuilder: (context, _) => Icon(
            Icons.star,
            color: Colors.amber,
          ),
          onRatingUpdate: (rating) {
            rak=rating;
            print(rak);
          },
        )
      ],
    );
  }
}

class ThongTinDiaDanh extends StatefulWidget {
  final DiaDanhObject DD;
  const ThongTinDiaDanh({Key? key,required this.DD}) : super(key: key);

  @override
  _ThongTinDiaDanhState createState() {
    return _ThongTinDiaDanhState(DD:DD);
  }
}

class _ThongTinDiaDanhState extends State<ThongTinDiaDanh> {
  int id=1;

  @override
    initState() {
    super.initState();
    ktra();
  }
  ktra()async{  SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
     setState(() {
       id = (sharedPreferences.getInt('id') ?? 1);
     }); }
     
  final DiaDanhObject DD;
  _ThongTinDiaDanhState({required this.DD});
  //đăng bài
  var snackBar=SnackBar(content: const Text('data'));
  final TextEditingController txtTieuDe = TextEditingController();
  final TextEditingController txtNoiDung = TextEditingController();
  List<File> files=[];

  chonAnh()async{FilePickerResult? result = await FilePicker.platform.pickFiles(allowMultiple: true);

if (result != null) {
 files = result.paths.map((path) => File(path!)).toList();
 setState(() {
   
 });
} else {
  // User canceled the picker
}}
  
  dangbai() async{SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    final success = await sharedPreferences.remove('thanhcong');
    String a="";
    print(files);
    BaiVietProvider.ThemBV(txtTieuDe.text, txtNoiDung.text, DD.Dd_Ma, id,rak,files).then((value){
      a=value;
      if(a=='1'){
        setState(() {
          
        snackBar = SnackBar(
            content: const Text('Tạo bài viết thành công'),
            action: SnackBarAction(
              label: 'Undo',
              onPressed: () {
                // Some code to undo the change.
              },
            ),
          );ScaffoldMessenger.of(context).showSnackBar(snackBar); 
        }); 
      }else{
        setState(() {        
         snackBar = SnackBar(
            content: const Text('Có lỗi xảy ra'),
            action: SnackBarAction(
              label: 'Undo',
              onPressed: () {
                // Some code to undo the change.
              },
            ),
          );
          }
          );ScaffoldMessenger.of(context).showSnackBar(snackBar);
      }
    });
  }
  @override
  Widget build(BuildContext context) {
    try{
    Size size = MediaQuery.of(context).size;
    return Container(
      padding: const EdgeInsets.only(left: 10, right: 10, top: 10),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Rating(),
          Row(
             children: [
              Expanded(child:  Text(
                DD.Dd_Ten,
                style: TextStyle(
                  fontSize: 30,
                  overflow: TextOverflow.ellipsis
                ),
              ),),
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            children: [
              Icon(Icons.location_on, color: Color(0xFF7D82BC)),
              SizedBox(
                width: 5,
              ),
              Expanded(child: Text(
                DD.Dd_DiaChi,
                style: TextStyle(
                  fontSize: 18,
                  overflow: TextOverflow.ellipsis
                ),
              )),
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            children: [
              Icon(Icons.person_outline, color: Color(0xFF7D82BC)),
              SizedBox(
                width: 5,
              ),
              tenND(id, Colors.black, 15)
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Text(
                'Tiêu đề',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ],
          ),
          TextFormField(
            controller: txtTieuDe,
            validator: (value) {
              if (value == null || value.isEmpty) {
                return 'Không được bỏ trống';
              }
            },
            textAlign: TextAlign.start,
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Text(
                'Mô tả',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ],
          ),
          TextFormField(
            controller: txtNoiDung,
            validator: (value) {
              if (value == null || value.isEmpty) {
                return 'Không được bỏ trống';
              }
            },
            textAlign: TextAlign.start,
            maxLines: null,
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Text(
                'Hình ảnh',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ],
          ),
          SizedBox(
            height: 10,
          ),
         files.length==0? Container( height: 300,width: 500, child: Image.asset('assets/imgs/diadanh/noimage.jpg'))
         :   Container(height: 300,width: 500,child: PageView.builder(
                        controller: PageController(
                            viewportFraction: 0.8, initialPage: 0),
                        itemCount: files.length, //đếm ảnh
                        itemBuilder: (context, index) =>
                           InkWell(
                          onTap: () {},
                          child: Container(
                            height: 300,
                            width: 500,
                            margin: EdgeInsets.only(right: 14),
                            decoration: BoxDecoration(
                                image: DecorationImage(
                                  image: FileImage(files[index]),fit: BoxFit.scaleDown
                                )),
                            ),
                        ),
                      ),),
          Column(
            mainAxisAlignment: MainAxisAlignment.end,
            children: [
              Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: [
                FloatingActionButton.extended(
                  onPressed: () {
                    chonAnh();
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "Thêm ảnh",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(
                    Icons.add_a_photo,
                    color: Color(0xFF7D82BC),
                  ),
                  heroTag: "fab1",
                ),
                FloatingActionButton.extended(
                  onPressed: () {
                  
                    // Add your onPressed code here!
                      dangbai();

                      
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "Đăng bài",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(
                    Icons.post_add,
                    color: Color(0xFF7D82BC),
                  ),
                  heroTag: "fab2",
                ),
              ]),
            ],
          ),
        ],
      ),
    );
  }catch(e){
    return Text('data');
  }
  }
}
