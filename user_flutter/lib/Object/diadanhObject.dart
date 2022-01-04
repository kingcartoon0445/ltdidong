class DiaDanhObject{
  final int Dd_Ma;
  final String Dd_Ten;
  final int Dd_MaMien;
  final double Dd_KinhDo;
  final double Dd_ViDo;
  final String Dd_MoTa;
  final DateTime Dd_TimeUp;
  final int Dd_TrangThai;
  DiaDanhObject(this.Dd_Ma,this.Dd_Ten,this.Dd_MaMien,this.Dd_KinhDo,this.Dd_ViDo,this.Dd_MoTa,this.Dd_TimeUp,this.Dd_TrangThai);
  DiaDanhObject.fromjson(Map<String,dynamic>res):
  Dd_Ma=res["Dd_Ma"],
  Dd_Ten=res["Dd_Ten"],
  Dd_MaMien=res["Dd_MaMien"],
  Dd_KinhDo=res["Dd_KinhDo"],
  Dd_ViDo=res["Dd_ViDo"],
  Dd_MoTa=res["Dd_MoTa"],
  Dd_TimeUp=res["Dd_TimeUp"],
  Dd_TrangThai=res["Dd_TrangThai"];
}