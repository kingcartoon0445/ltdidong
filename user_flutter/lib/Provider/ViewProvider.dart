import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/ViewObject.dart';
import 'package:user_flutter/class_chung.dart';

class ViewProvider {
  static List<ViewObject> paraseView(String reponseBody) {
    final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return parsed.map<ViewObject>((e) => ViewObject.fromjson(e)).toList();
  }

  static Future<String> oneView(int Id) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response =await http.get(Uri.parse(https+'/View/$Id'),headers: {'Authorization': 'Bearer $tokens'});
    var jsons = json.decode(response.body);
    String a = jsons['view'].toString();
    return a;
  }

  static ThemView(BuildContext context, String MaBV, String MaND) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    String url = https+'/View';Map body = {'MaBaiViet': MaBV, 'MaNguoiDung': MaND,};
    var response = await http.post(Uri.parse(url), body: body,headers: {'Authorization': 'Bearer $tokens'});
  }

  static Future<String> KtraView(
      BuildContext context, String MaBV, String MaND) async {
    String url = https+'/KtraView';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body,headers: {'Authorization': 'Bearer $tokens'});
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      sharedPreferences.setString("coview", jsonResponse['coview']);
    }
    String a = (sharedPreferences.getString('coview') ?? "w");
    return a;
  }
}
