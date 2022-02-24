import 'dart:convert';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:user_flutter/Object/anhbaivietObject.dart';
import 'package:user_flutter/Object/baivietObject.dart';
import 'package:http/http.dart' as http;
import 'package:user_flutter/class_chung.dart';

class BaiVietProvider {
  static List<BaiVietObject> paraseBaiViet(String reponseBody) {
      final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
      return parsed
          .map<BaiVietObject>((e) => BaiVietObject.fromjson(e))
          .toList();

  }

  static List<AnhBaiVietObject> paraseAnhBV(String reponseBody) {
    final parsed = jsonDecode(reponseBody).cast<Map<String, dynamic>>();
    return parsed
        .map<AnhBaiVietObject>((e) => AnhBaiVietObject.fromjson(e))
        .toList();
  }

  static Future<List<BaiVietObject>> fecthBaiViet() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response = await http.get(Uri.parse(https + '/baiviets'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }

 static Future<List<BaiVietObject>> oneBaiViet(int id) async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response = await http.get(Uri.parse(https + '/baiviets/$id'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }


  static Future<String> ThemBV(String TieuDe, String NoiDung, int MDD, int MND,
      double DanhGia, List<File> lstimg) async {
    String url = https + '/baiviets';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    /*Map body = {'TieuDe': TieuDe,'NoiDung':NoiDung,'MaDiaDanh':MDD.toString(),'MaNguoiDung':MND.toString(),'rating':DanhGia.toString()};
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    var response = await http.post(Uri.parse(url), body: body);
     if (response.statusCode == 200) {
       var jsonResponse = json.decode(response.body);
       sharedPreferences.setString("thanhcong", jsonResponse['thanhcong']);
     }
    String thanhcong= (sharedPreferences.getString('thanhcong') ?? "w");
    return thanhcong;*/

      var lst = [];
      Dio dio = new Dio();
      for (var img in lstimg) {
        print(lstimg.length);
        print(img.path);
        img.existsSync();
        lst.add(await MultipartFile.fromFile(img.path));
      }
      FormData formData = new FormData.fromMap({
        "images[]": await lst,
        'TieuDe': TieuDe,
        'NoiDung': NoiDung,
        'MaDiaDanh': MDD.toString(),
        'MaNguoiDung': MND.toString(),
        'rating': DanhGia.toString()
      });
      final response = await dio.post(url,
          data: formData,
          options: Options(headers: {
            'Authorization': 'Bearer $tokens',
          }));
      var jsonResponse;
      if (response.statusCode == 200) {
        jsonResponse = response.data.toString();
      }
      sharedPreferences.setString("bvmoi", jsonResponse);
      return jsonResponse.toString();
  
  }

  static Future<List<BaiVietObject>> BaiVietUS(String a) async {
    String url = https + '/BaivietUS';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    Map body = {'id': a};
    var response = await http.post(Uri.parse(url), body: body, headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }

  static Future<List<BaiVietObject>> BaiVietDC() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response =
        await http.get(Uri.parse(https + '/baiviettop5'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }

  static Future<List<BaiVietObject>> BVLienQuan(int a) async {
    String url = https + '/BVLienQuan/+$a';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    var response = await http.get(Uri.parse(url), headers: {
      'Authorization': 'Bearer $tokens',
    });
    print(response.body);
    return paraseBaiViet(response.body);
  }

static Future<List<BaiVietObject>> BVNhieuLike() async {
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    final response = await http.get(Uri.parse(https + '/BaiVietNhieuLike'), headers: {
      'Authorization': 'Bearer $tokens',
    });
    return paraseBaiViet(response.body);
  }

static  suaBaiViet(int id,String TieuDe,String NoiDung,String MDD,String MND,String DanhGia, List<File> lstimg )async{
 String url = https + '/baiviets';
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    String tokens = (sharedPreferences.getString('token') ?? "");
    /*Map body = {'TieuDe': TieuDe,'NoiDung':NoiDung,'MaDiaDanh':MDD.toString(),'MaNguoiDung':MND.toString(),'rating':DanhGia.toString()};
    SharedPreferences sharedPreferences = await SharedPreferences.getInstance();
    var response = await http.post(Uri.parse(url), body: body);
     if (response.statusCode == 200) {
       var jsonResponse = json.decode(response.body);
       sharedPreferences.setString("thanhcong", jsonResponse['thanhcong']);
     }
    String thanhcong= (sharedPreferences.getString('thanhcong') ?? "w");
    return thanhcong;*/

      var lst = [];
      Dio dio = new Dio();
      for (var img in lstimg) {
        print(lstimg.length);
        print(img.path);
        img.existsSync();
        lst.add(await MultipartFile.fromFile(img.path));
      }
      FormData formData = new FormData.fromMap({
        "images[]": await lst,
        'TieuDe': TieuDe,
        'NoiDung': NoiDung,
        'MaDiaDanh': MDD.toString(),
        'MaNguoiDung': MND.toString(),
        'rating': DanhGia.toString()
      });
      final response = await dio.post(url,
          data: formData,
          options: Options(headers: {
            'Authorization': 'Bearer $tokens',
          }));
      var jsonResponse;
      if (response.statusCode == 200) {
        jsonResponse = response.data.toString();
      }
      sharedPreferences.setString("bvmoi", jsonResponse);
      return jsonResponse.toString();
  
}
}
