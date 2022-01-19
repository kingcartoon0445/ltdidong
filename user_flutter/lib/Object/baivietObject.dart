class BaiVietObject{
  final int Bv_Ma;
  final int Bv_MaNguoiDung;
  final String Bv_TenND;
  final int Bv_MaDiaDanh;
  final String Bv_TenDD;
  final String Bv_TieuDe;
  final String Bv_NoiDung;
  BaiVietObject(this.Bv_Ma,this.Bv_MaNguoiDung,this.Bv_TenND,this.Bv_MaDiaDanh,this.Bv_TenDD,this.Bv_TieuDe,this.Bv_NoiDung);
  BaiVietObject.fromjson(Map<String,dynamic>res)
  : Bv_Ma=res["id"],
    Bv_MaNguoiDung=res["MaNguoiDung"],
    Bv_TenND=res['TenDaiDien'],
    Bv_MaDiaDanh=res["MaDiaDanh"],
    Bv_TenDD=res['Ten'],
    Bv_TieuDe=res["TieuDe"],
    Bv_NoiDung=res["NoiDung"];
}