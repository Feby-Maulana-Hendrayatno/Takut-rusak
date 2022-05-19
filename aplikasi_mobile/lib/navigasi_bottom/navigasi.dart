import 'package:aplikasi_mobile/page/buyer/profile_page.dart';
import 'package:aplikasi_mobile/page/dahboard.dart';
import 'package:aplikasi_mobile/page/home.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';

// import 'package:curved_navigation_bar/curved_navigation_bar.dart';

import 'package:flutter/material.dart';

import 'package:aplikasi_mobile/page/property/add_product.dart';
import 'package:aplikasi_mobile/page/property/property.dart';

import '../page/chat_page.dart';

class Navigasi extends StatefulWidget {
  Navigasi({Key? key}) : super(key: key);

  @override
  State<Navigasi> createState() => _NavigasiState();
}

class _NavigasiState extends State<Navigasi> {
  final navigationKey = GlobalKey<CurvedNavigationBarState>();
  int? index = 0;
  final screens = [
    HomePage(),
    ChatPage(),
    PropertyPage(),
    ProfilePage(),
    DashboardPage(),
  ];
  @override
  Widget build(BuildContext context) {
    final items = <Widget>[
      Icon(Icons.home, size: 30),
      Icon(Icons.search, size: 30),
      Icon(Icons.favorite, size: 30),
      Icon(Icons.settings, size: 30),
      Icon(Icons.person, size: 30),
    ];
    return Scaffold(
        bottomNavigationBar: Theme(
          data: Theme.of(context).copyWith(
              iconTheme: IconThemeData(color: Color.fromARGB(255, 255, 255, 255))),
          child: CurvedNavigationBar(
            key: navigationKey,
            color: Color.fromARGB(255, 79, 238, 190),
            buttonBackgroundColor: Color.fromARGB(255, 76, 156, 221),
            backgroundColor: Colors.transparent,
            // backgroundColor: Color.fromARGB(255, 255, 255, 255),
            items: items,
            height: 60,
            animationCurve: Curves.easeInOut,
            animationDuration: Duration(milliseconds: 650),
            index: index!,
            onTap: (index) => setState(() => this.index = index),
          ),
        ),
        body: screens[index!]);
  }
}
