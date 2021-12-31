import 'package:flutter/material.dart';
import 'colorplush.dart';
import 'package:flutter_svg/svg.dart';
Widget nut_Icon(var icon,var label,var on)
{
return ElevatedButton.icon(
                onPressed: (){on;},
                style:  ElevatedButton.styleFrom(primary: Colors.white,elevation: 0), 
                icon:  icon,
                label: label,
              );
            }
            