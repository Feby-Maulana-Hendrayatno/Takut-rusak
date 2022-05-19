import 'package:aplikasi_mobile/auth/login_page.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';


class DashboardPage extends StatefulWidget {
  @override
  _DashboardPageState createState() => _DashboardPageState();
}

class _DashboardPageState extends State<DashboardPage> {

  String email = "";

  Future getEmail()async{
    SharedPreferences preferences = await SharedPreferences.getInstance();
     setState(() {
       email = preferences.getString('email')!;
     });
  }

  Future logOut(BuildContext context)async{
    SharedPreferences preferences = await SharedPreferences.getInstance();
    preferences.remove('email');
    Navigator.push(context, MaterialPageRoute(builder: (context)=>LoginPage(),),);
  }


  @override
  void initState() {
    super.initState();
    getEmail();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('DashboardPage'),),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.center,
        children: <Widget>[
          Center(child: email == '' ? Text('') : Text(email)),
          SizedBox(height: 20,),
          MaterialButton(
            color: Colors.purple,
            onPressed: (){
              logOut(context);
          },child: Text("Log Out",style: TextStyle(color: Colors.white),),),
        ],
      ),
    );
  }
}