import 'package:aplikasi_mobile/page/home.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:aplikasi_mobile/auth/login_page.dart';

class WelcomePage extends StatefulWidget {
  @override
  State<WelcomePage> createState() => _WelcomePageState();
}

class _WelcomePageState extends State<WelcomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SingleChildScrollView(
        child: Container(
          height: MediaQuery.of(context).size.height,
          width: MediaQuery.of(context).size.width,
          // color: Colors.black,
          child: Stack(
            alignment: Alignment.center,
            children: <Widget>[
              Positioned(
                child: Container(
                  width: MediaQuery.of(context).size.width,
                  decoration: BoxDecoration(
                      image: DecorationImage(
                          image: AssetImage('assets/images/welcome.png', ),
                          fit: BoxFit.fill)),
                ),
              ),
              Positioned(
                height: MediaQuery.of(context).size.height,
          width: MediaQuery.of(context).size.width,
                child: Container(
                  decoration: BoxDecoration(
                      image: DecorationImage(
                        image: AssetImage('assets/images/nama_aplikasi.png', ))),
                ),
              ),
              Positioned(
                top: 400,
                width: MediaQuery.of(context).size.width,
                child: Container(
                  child: TextButton(
                    style: TextButton.styleFrom(
                      textStyle: const TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 30,
                        color: Color.fromARGB(255, 255, 255, 255),
                      ),
                    ),
                    onPressed: () {
                      Navigator.pushNamed(context, 'login_page');
                    },
                    child: const Text('Get Started',
                        style: TextStyle(
                            color: Color.fromARGB(213, 116, 113, 94))),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}