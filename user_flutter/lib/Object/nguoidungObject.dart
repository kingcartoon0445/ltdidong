class NguoiDungObject{
  final int Nd_Ma;
  final String Nd_TenDaiDien;
  final String Nd_emai;
  final String Nd_SDT;
  final String Nd_AnhNen;
  final String Nd_MatKhau;
  final DateTime Nd_TimeUp;
  final int Nd_TrangThai;
  NguoiDungObject(this.Nd_Ma,this.Nd_TenDaiDien,this.Nd_emai,this.Nd_SDT,this.Nd_AnhNen,this.Nd_MatKhau,this.Nd_TimeUp,this.Nd_TrangThai);
  NguoiDungObject.fromjson(Map<String,dynamic>res):
  Nd_Ma=res["Nd_Ma"],
  Nd_TenDaiDien=res["Nd_TenDaiDien"],
  Nd_emai=res["Nd_email"],
  Nd_SDT=res["Nd_SDT"],
  Nd_AnhNen=res["Nd_AnhNen"],
  Nd_MatKhau=res["Nd_MatKhau"],
  Nd_TimeUp=res["Nd_TimeUp"],
  Nd_TrangThai=res["Nd_TrangThai"];
}