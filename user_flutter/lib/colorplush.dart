import 'package:flutter/material.dart';

const kCardInfoBG = Color(0XFF686868);
TextStyle cabin_B(BuildContext context,var color, var fsize) {
  Size dt = MediaQuery.of(context).size;

  
  return TextStyle(fontFamily: 'Cabin_B', fontWeight: FontWeight.bold, color: color, fontSize: fsize,overflow: TextOverflow.ellipsis,);
}

TextStyle cabin(var color, var size) {
  return TextStyle(fontFamily: 'Cabin_B', color: color, fontSize: size);
}
