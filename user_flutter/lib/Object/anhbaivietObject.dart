class AnhBaiVietObject {
  final int ABV_Ma;
  final int ABV_MaBaiViet;
  final String ABV_Anh;
  final int ABV_TrangThai;
  AnhBaiVietObject(this.ABV_Ma, this.ABV_MaBaiViet, this.ABV_Anh, this.ABV_TrangThai);
  AnhBaiVietObject.fromjson(Map<String, dynamic> res)
      : ABV_Ma = res["id"],
        ABV_MaBaiViet = res["MaBaiViet"],
        ABV_Anh = res['Anh'],
        ABV_TrangThai = res["TrangThai"];
}
