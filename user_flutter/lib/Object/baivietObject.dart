class BaiVietObject{
  final int Bv_Ma;
  final int Bv_MaNguoiDung;
  final int Bv_MaDiaDanh;
  final String Bv_TieuDe;
  final String Bv_NoiDung;
  final String Bv_TimeUp;
  final int Bv_TrangThai;
  BaiVietObject(this.Bv_Ma,this.Bv_MaNguoiDung,this.Bv_MaDiaDanh,this.Bv_TieuDe,this.Bv_NoiDung,this.Bv_TimeUp,this.Bv_TrangThai);
  BaiVietObject.fromjson(Map<String,dynamic>res)
  : Bv_Ma=res["Bv_Ma"],
    Bv_MaNguoiDung=res["Bv_MaNguoiDung"],
    Bv_MaDiaDanh=res["Bv_MaDiaDanh"],
    Bv_TieuDe=res["Bv_TieuDe"],
    Bv_NoiDung=res["Bv_NoiDung"],
    Bv_TimeUp=res["Bv_TimeUp"],
    Bv_TrangThai=res["Bv_TrangThai"];
}