import 'package:flutter/material.dart';
import 'package:flutter_rating_bar/flutter_rating_bar.dart';

class ChiaSeBaiViet extends StatefulWidget {
  const ChiaSeBaiViet({Key? key}) : super(key: key);

  @override
  _ChiaSeBaiVietState createState() => _ChiaSeBaiVietState();
}

class _ChiaSeBaiVietState extends State<ChiaSeBaiViet> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Material(
        child: Container(
            padding: const EdgeInsets.only(top: 30),
            child: SingleChildScrollView(
              child: ThongTinDiaDanh(),
            )),
      ),
    );
  }
}

class Rating extends StatefulWidget {
  const Rating({Key? key}) : super(key: key);

  @override
  _RatingState createState() => _RatingState();
}

class _RatingState extends State<Rating> {
  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.start,
      children: [
        RatingBar.builder(
          initialRating: 3,
          minRating: 1,
          direction: Axis.horizontal,
          allowHalfRating: true,
          itemBuilder: (context, _) => Icon(
            Icons.star,
            color: Colors.amber,
          ),
          onRatingUpdate: (rating) {
            print(rating);
          },
        )
      ],
    );
  }
}

class ThongTinDiaDanh extends StatefulWidget {
  const ThongTinDiaDanh({Key? key}) : super(key: key);

  @override
  _ThongTinDiaDanhState createState() => _ThongTinDiaDanhState();
}

class _ThongTinDiaDanhState extends State<ThongTinDiaDanh> {
  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.only(left: 10, right: 10, top: 10),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.start,
        children: [
          Rating(),
          Row(
            children: [
              Text(
                'Hạ Long',
                style: TextStyle(
                  fontSize: 30,
                ),
              ),
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            children: [
              Icon(Icons.location_on, color: Color(0xFF7D82BC)),
              SizedBox(
                width: 5,
              ),
              Text(
                'Hạ Long,Quảng Ninh',
                style: TextStyle(
                  fontSize: 18,
                ),
              )
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            children: [
              Icon(Icons.person_outline, color: Color(0xFF7D82BC)),
              SizedBox(
                width: 5,
              ),
              Text('Lê Thuận')
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Text(
                'Tiêu đề',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ],
          ),
          TextField(
            textAlign: TextAlign.start,
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Text(
                'Mô tả',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ],
          ),
          TextField(
            textAlign: TextAlign.start,
            maxLines: null,
          ),
          SizedBox(
            height: 10,
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              Text(
                'Hình ảnh',
                style: TextStyle(
                  fontSize: 16,
                ),
              ),
            ],
          ),
          SizedBox(
            height: 10,
          ),
          Container(
            width: 280,
            height: 280,
            child: Image.asset('assets/imgs/diadanh/noimage.jpg'),
          ),
          Column(
            mainAxisAlignment: MainAxisAlignment.end,
            children: [
              Row(mainAxisAlignment: MainAxisAlignment.spaceBetween, children: [
                FloatingActionButton.extended(
                  onPressed: () {
                    // Add your onPressed code here!
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "Thêm ảnh",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(
                    Icons.add_a_photo,
                    color: Color(0xFF7D82BC),
                  ),
                  heroTag: "fab1",
                ),
                FloatingActionButton.extended(
                  onPressed: () {
                    // Add your onPressed code here!
                  },
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(10),
                      side: BorderSide(color: Color(0xFF7D82BC), width: 3)),
                  backgroundColor: Colors.white,
                  label: Text(
                    "Đăng bài",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 12,
                      color: Color(0xFF7D82BC),
                    ),
                  ),
                  icon: Icon(
                    Icons.post_add,
                    color: Color(0xFF7D82BC),
                  ),
                  heroTag: "fab2",
                ),
              ]),
            ],
          ),
        ],
      ),
    );
  }
}
