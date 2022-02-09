class NguoiDungObject {
   int Nd_Ma;
   String Nd_TenDaiDien;
   String Nd_HovaTen;
   String Nd_emai;
   String Nd_SDT;
   String Nd_AnhNen;
   String Nd_MatKhau;
   int Nd_TrangThai;
  NguoiDungObject({required this.Nd_Ma,required this.Nd_TenDaiDien,required this.Nd_HovaTen,required this.Nd_emai,
     required this.Nd_SDT,required this.Nd_AnhNen,required this.Nd_MatKhau,required this.Nd_TrangThai});
  factory NguoiDungObject.fromjson(Map<String, dynamic> res){
    return NguoiDungObject( Nd_Ma: res["id"],
        Nd_TenDaiDien: res["TenDaiDien"],
        Nd_HovaTen: res["HovaTen"],
        Nd_emai: res["Email"],
        Nd_SDT: res["SDT"],
        Nd_AnhNen: res["AnhNen"],
        Nd_MatKhau: res["MatKhau"],
        Nd_TrangThai: res["TrangThai"]);
  }
}
