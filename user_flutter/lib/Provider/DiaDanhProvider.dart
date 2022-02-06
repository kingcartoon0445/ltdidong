import 'dart:convert';

import 'package:http/http.dart' as http;
import 'package:user_flutter/Object/diadanhObject.dart';

class DiaDanhProvider {
  static List<DiaDanhObject> paraseDiaDanh(String reponseBody) {
    final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return parsed.map<DiaDanhObject>((e) => DiaDanhObject.fromjson(e)).toList();
  }

  static Future<List<DiaDanhObject>> fectDiaDanh() async {
    final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/DiaDanh'));
    return paraseDiaDanh(response.body);
  }

  static Future<List<DiaDanhObject>> oneDiaDanh(int ND_ID) async {
    final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/DiaDanh/$ND_ID'));
    return paraseDiaDanh(response.body);
  }
}
