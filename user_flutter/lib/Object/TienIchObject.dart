class TienIchObject {
  final int Ti_Ma;
  final String Ti_Ten;
  final String Ti_Anh;
  final String Ti_Loai;
  final String Ti_DiaChi;
  final String Ti_MoTa;
  final String Ti_SDT;
  TienIchObject(this.Ti_Anh, this.Ti_Ma, this.Ti_DiaChi, this.Ti_Loai, this.Ti_MoTa, this.Ti_SDT, this.Ti_Ten);
  TienIchObject.fromjson(Map<String, dynamic> res)
      : Ti_Ma = res["id"],
        Ti_Ten = res["Ten"],
        Ti_Anh = res["Anh"],
        Ti_Loai = res["Loai"],
        Ti_DiaChi = res["DiaChi"],
        Ti_MoTa = res["MoTa"],
        Ti_SDT = res["SDT"];
}
