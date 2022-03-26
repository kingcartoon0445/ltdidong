import 'package:flutter/material.dart';
class formcho extends StatefulWidget {
  const formcho({ Key? key }) : super(key: key);

  @override
  _formchoState createState() => _formchoState();
}

class _formchoState extends State<formcho> {
  @override
  Widget build(BuildContext context) {
    return Stack(
      children: [
          Container(
          decoration: BoxDecoration(
            image: DecorationImage(
              image: NetworkImage('https://lh4.googleusercontent.com/-IvRh36k0tDs/XSB0e8MJlKI/AAAAAAAANs0/G2P9yUUgShkn-QLddt0laY417YAZ3gJkACEwYBhgL/s1600/tai-hinh-nen-phong-canh-dep-full-hd-mien-phi-100%2525-5.jpeg'),
              fit: BoxFit.cover,
              colorFilter: ColorFilter.mode(Colors.black38, BlendMode.darken),
            ),
          ),
        ),
        Scaffold(
          backgroundColor: Colors.transparent,
          body: Column(
            mainAxisAlignment: MainAxisAlignment.end,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              Center(child: ElevatedButton(onPressed: (){},child: Text('dsa'),),),
              Center(child: ElevatedButton(onPressed: (){},child: Text('dsa'),),)
            ],
          ),)
      ],
    );
  }
}