import 'dart:convert';
import 'package:flutter/cupertino.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/ViewObject.dart';

class ViewProvider {
  static List<ViewObject> paraseView(String reponseBody) {
    final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return parsed.map<ViewObject>((e) => ViewObject.fromjson(e)).toList();
  }

  static Future<String> oneView(int Id) async {
    final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/View/$Id'));
    var jsons = json.decode(response.body);
    String a = jsons['view'].toString();
    return a;
  }

  static ThemView(BuildContext context, String MaBV, String MaND) async {
    String url = 'http://10.0.2.2:8000/api/View';
    Map body = {'MaBaiViet': MaBV, 'MaNguoiDung': MaND};
    var response = await http.post(Uri.parse(url), body: body);
  }

  static Future<String> KtraView(BuildContext context, String MaBV, String MaND) async {
    String url = 'http://10.0.2.2:8000/api/KtraView';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    Map body = {'MaBV': MaBV, 'MaND': MaND};
    var response = await http.post(Uri.parse(url), body: body);
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      sharedPreferences.setString("coview", jsonResponse['coview']);
    }
    String a = (sharedPreferences.getString('coview') ?? "w");
    return a;
  }
}
