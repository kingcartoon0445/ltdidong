import 'dart:convert';

import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

import '../background.dart';

class MienProvider {
  static mienthem(BuildContext context, String tenmien, int a) async {
    String url = 'http://10.0.2.2:8000/api/Mien/' + a.toString();
    Map body = {'TenMien': tenmien};
    var response = await http.put(Uri.parse(url), headers: <String, String>{'Accept': 'application/json'}, body: body);
    var jsonResponse;
    if (response.statusCode == 200) {
      jsonResponse = json.decode(response.body);
      print("object");
    }
  }
}
