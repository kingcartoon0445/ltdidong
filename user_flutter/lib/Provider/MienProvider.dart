import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/class_chung.dart';

import '../background.dart';

class MienProvider {
  static mienthem(BuildContext context, String tenmien, int a) async {
    String url = https+'/Mien/' + a.toString();
    Map body = {'TenMien': tenmien};
    var response = await http.put(Uri.parse(url), headers: <String, String>{'Accept': 'application/json; charset=UTF-8  '}, body: body);
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      print("object");
    }
  }
}
