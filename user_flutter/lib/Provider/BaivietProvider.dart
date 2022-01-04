import 'dart:convert';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:http/http.dart' as http;


class BaiVietProvider{
 static List<BaiVietObject> paraseBaiViet(String reponseBody){
   final parsed=jsonDecode(reponseBody).cast<Map<String,dynamic>>();
   return parsed.map<BaiVietObject>((e)=>BaiVietObject.fromjson(e)).toList();
 }

 static Future<List<BaiVietObject>> fecthBaiViet()async{
   final response= await http
   .get(Uri.parse('http://10.0.2.2:8000/api/BaiViet'));
   return paraseBaiViet(response.body);
 }
}