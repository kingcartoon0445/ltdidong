import 'package:http/http.dart' as http;
import 'dart:convert';

class CallApi {
  final String url = "http://127.0.0.1:8000/api/sanctum/token";

  postData(data, apiUrl) async {
    var fullUrl = url + apiUrl;

    return await http.post(
      Uri.parse(fullUrl),
      headers: {'Accept': 'application/json'},
      body: jsonEncode(data),
    );
  }
}
