import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:user_flutter/Object/ViewObject.dart';

class ViewProvider{
 static List<ViewObject> paraseView(String reponseBody){
   final parsed=jsonDecode(reponseBody).cast<Map<String,dynamic>>();
   return parsed.map<ViewObject>((e)=>ViewObject.fromjson(e)).toList();
  }
  static Future<List<ViewObject>> oneView(int Id)async{
   final response= await http
   .get(Uri.parse('http://10.0.2.2:8000/api/View/$Id'));
   return paraseView(response.body);
 }
 }