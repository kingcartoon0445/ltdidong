import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/TienIchObject.dart';
import 'package:user_flutter/class_chung.dart';

class TienIchProvider{
  static List<TienIchObject> paraseTienIch(String reponseBody){
   try{
   final parsed=jsonDecode(reponseBody).cast<Map<String,dynamic>>();
   return parsed.map<TienIchObject>((e)=>TienIchObject.fromjson(e)).toList();
   }catch(e){return [];}
 }
  static Future<List<TienIchObject>> DsKhachSan(int iddd)async{
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
   final response= await http.get(Uri.parse(https+'/danhsachkhachsan/$iddd'),headers: {'Authorization': 'Bearer $tokens'});
   return paraseTienIch(response.body);
 }
 static Future<List<TienIchObject>> DsNhaHang(int iddd)async{
   SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
   final response= await http.get(Uri.parse(https+'/danhsachnhahang/$iddd'),headers: {'Authorization': 'Bearer $tokens'});
   return paraseTienIch(response.body);
 }
}