class ViewObject {
  final int V_MaBaiViet;
  final int V_MaNguoiDung;

  ViewObject(this.V_MaBaiViet, this.V_MaNguoiDung);
  ViewObject.fromjson(Map<String, dynamic> res)
      : V_MaBaiViet = res['MaBaiViet'],
        V_MaNguoiDung = res['MaNguoiDung'];
}
