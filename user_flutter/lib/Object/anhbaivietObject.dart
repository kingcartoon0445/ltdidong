class AnhBaiVietObject{
  final int ABV_Ma;
  final int ABV_MaBaiViet;
  final String ABV_Anh;
  final DateTime ABV_TimeUp;
  final ABV_TrangThai;
  AnhBaiVietObject(this.ABV_Ma,this.ABV_MaBaiViet,this.ABV_Anh,this.ABV_TimeUp,this.ABV_TrangThai);
  AnhBaiVietObject.fromjson(Map<String,dynamic>res):
  ABV_Ma=res["ABV_Ma"],
  ABV_MaBaiViet=res["ABV_MaBaiViet"],
  ABV_Anh=res["ABV_Anh"],
  ABV_TimeUp=res["ABV_ABV_TimeUP"],
  ABV_TrangThai=res["ABV_TrangThai"];
}