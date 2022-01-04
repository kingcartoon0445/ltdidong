class BaiVietObject{
  final int Bv_Ma;
  final int Bv_MaNguoiDung;
  final int Bv_MaDiaDanh;
  final String Bv_TieuDe;
  final String Bv_NoiDung;
  final int Bv_TrangThai;
  BaiVietObject(this.Bv_Ma,this.Bv_MaNguoiDung,this.Bv_MaDiaDanh,this.Bv_TieuDe,this.Bv_NoiDung,this.Bv_TrangThai);
  BaiVietObject.fromjson(Map<String,dynamic>res)
  : Bv_Ma=res["id"],
    Bv_MaNguoiDung=res["MaNguoiDung"],
    Bv_MaDiaDanh=res["MaDiaDanh"],
    Bv_TieuDe=res["TieuDe"],
    Bv_NoiDung=res["NoiDung"],
    Bv_TrangThai=res["TrangThai"];
}