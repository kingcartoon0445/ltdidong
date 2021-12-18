import 'package:flutter/material.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'package:user_flutter/baiviet/baiviet_ds.dart';

class Background extends StatefulWidget {
  @override
  _BackgroundState createState() => _BackgroundState();
}

class _BackgroundState extends State<Background> {
  int _page = 0;
  GlobalKey<CurvedNavigationBarState> _bottomNavigationKey = GlobalKey();
  Widget Page(int p) {
    switch (p) {
      case 0:
        return MyApp();
        break;
      case 1:
        return MyApp();
        break;
      case 2:
        return MyApp();
        break;
    }
    return Text("null");
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      bottomNavigationBar: CurvedNavigationBar(
        key: _bottomNavigationKey,
        index: 0,
        height: 60.0,
        items: <Widget>[
          Icon(Icons.search_outlined, color: Colors.white, size: 30),
          Icon(Icons.place_outlined, color: Colors.white, size: 30),
          Icon(Icons.article_outlined, color: Colors.white, size: 30),
        ],
        color: Color(0xFF7d82bc),
        buttonBackgroundColor: Color(0xFF7D82BC),
        backgroundColor: Colors.white,
        animationCurve: Curves.easeInOut,
        animationDuration: Duration(milliseconds: 600),
        onTap: (index) {
          setState(() {
            _page = index;
          });
        },
        letIndexChange: (index) => true,
      ),
      body: Container(
        color: Colors.white,
        child: Page(_page),
      ),
    );
  }
}
