import 'dart:convert';

import 'package:flutter/services.dart';
import 'package:path/path.dart';
import 'package:user_flutter/Object/baivietObject.dart';


class BaiVietProvider{
  static Future<List<dynamic>> readjson() async{
    var jstext=await rootBundle.loadString("assets/data/baiviet.json");
    var data=json.decode(jstext.toString());
    return data["baiviet"];
  }

  static Future<List<BaiVietObject>> getAll() async
  {
    List<BaiVietObject> lsResut=[];
    List<dynamic> data= await readjson();
    lsResut=data.map((e) => BaiVietObject.fromjson(e)).toList();
    return lsResut;
  }
}