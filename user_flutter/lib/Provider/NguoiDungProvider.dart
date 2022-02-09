import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:user_flutter/Object/nguoidungObject.dart';
import 'package:user_flutter/class_chung.dart';

class NguoiDungProvider {
  static List<NguoiDungObject> paraseNguoiDung(String reponseBody) {
    try {
      final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
      return parsed
          .map<NguoiDungObject>((e) => NguoiDungObject.fromjson(e))
          .toList();
    } catch (e) {
      return [];
    }
  }

  static Future<List<NguoiDungObject>> fecthNguoidung() async {
    final response =
        await http.get(Uri.parse(https+'/NguoiDung'));
    return paraseNguoiDung(response.body);
  }

  static Future<List<NguoiDungObject>> oneNguoiDung(int ND_ID) async {
    final response =
        await http.get(Uri.parse(https+'/NguoiDung/$ND_ID'));
    return paraseNguoiDung(response.body);
  }
}
