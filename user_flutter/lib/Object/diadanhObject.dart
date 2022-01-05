class DiaDanhObject{
  final int Dd_Ma;
  final String Dd_Ten;
  final String Dd_DiaChi;
  final int Dd_MaMien;
  final String Dd_KinhDo;
  final String Dd_ViDo;
  final String Dd_MoTa;
  final int Dd_TrangThai;
  DiaDanhObject(this.Dd_Ma,this.Dd_Ten,this.Dd_DiaChi,this.Dd_MaMien,this.Dd_KinhDo,this.Dd_ViDo,this.Dd_MoTa,this.Dd_TrangThai);
  DiaDanhObject.fromjson(Map<String,dynamic>res):
  Dd_Ma=res["id"],
  Dd_Ten=res["Ten"],
  Dd_DiaChi=res["DiaChi"],
  Dd_MaMien=res["MaMien"],
  Dd_KinhDo=res["KinhDo"].toString(),
  Dd_ViDo=res["ViDo"].toString(),
  Dd_MoTa=res["MoTa"],
  Dd_TrangThai=res["TrangThai"];
}