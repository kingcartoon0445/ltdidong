import 'package:http/http.dart' as http;
import 'dart:convert';

class CallApi {
  final String url = "https://reqres.in/api/";

  postData(data, apiUrl) async {
    var fullUrl = url + apiUrl;

    return await http.post(
      Uri.parse(fullUrl),
      headers: {
        'Content-type': 'application/json',
        'Accept': 'application/json'
      },
      body: jsonEncode(data),
    );
  }
}
