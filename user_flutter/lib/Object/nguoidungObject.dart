class NguoiDungObject {
  final int Nd_Ma;
  final String Nd_TenDaiDien;
  final String Nd_HovaTen;
  final String Nd_emai;
  final String Nd_SDT;
  final String Nd_AnhNen;
  final String Nd_MatKhau;
  final int Nd_TrangThai;
  NguoiDungObject(this.Nd_Ma, this.Nd_TenDaiDien,this.Nd_HovaTen, this.Nd_emai, this.Nd_SDT,
      this.Nd_AnhNen, this.Nd_MatKhau, this.Nd_TrangThai);
  NguoiDungObject.fromjson(Map<String, dynamic> res)
      : Nd_Ma = res["id"],
        Nd_TenDaiDien = res["TenDaiDien"],
        Nd_HovaTen = res["HovaTen"],
        Nd_emai = res["Email"],
        Nd_SDT = res["SDT"],
        Nd_AnhNen = res["AnhNen"],
        Nd_MatKhau = res["MatKhau"],
        Nd_TrangThai = res["TrangThai"];
}