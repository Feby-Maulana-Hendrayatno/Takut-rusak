// import 'dart:convert';

// import 'package:aplikasi_mobile/connection/app_config.dart';
// import 'package:aplikasi_mobile/login_model.dart';
// import 'package:aplikasi_mobile/page/dahboard.dart';
// import 'package:aplikasi_mobile/page/home.dart';
// import 'package:flutter/material.dart';
// import 'package:google_fonts/google_fonts.dart';
// import 'package:rflutter_alert/rflutter_alert.dart';
// import 'package:shared_preferences/shared_preferences.dart';
// import 'package:sp_util/sp_util.dart';
// import 'daftar_page.dart';
// import 'package:http/http.dart' as http;

// class LoginPage extends StatefulWidget {
//   LoginPage({Key? key}) : super(key: key);

//   @override
//   State<LoginPage> createState() => _LoginPageState();
// }

// class _LoginPageState extends State<LoginPage> {
//   TextEditingController txtPassword = new TextEditingController();
//   TextEditingController txtUsername = new TextEditingController();

//   Future _doLogin() async {
//     if (txtUsername.text.isEmpty || txtPassword.text.isEmpty) {
//       Alert(context: context, title: "Data tidak benar", type: AlertType.error)
//           .show();
//       return;
//     }
//     // ProgressDialog progressDialog = ProgressDialog(context: context);
//     // progressDialog.show(msg: "Loading......", max: 100);
//     //VERSI LAMA BRO
//     // final response = await http.post(
//     //     Uri.http('192.168.1.11:8000', 'api/login'),
//     //     body: {'email': txtUsername.text, 'password': txtPassword.text},
//     //     headers: {'Accept': 'application/json'});
//     final response =
//         // await http.post(Uri.http('192.168.1.23:8000', 'api/user'), body: {
//         await http.post(Uri.parse(AppConfig.getUrl() + 'login'), body: {
//       'email': txtUsername.text,
//       'password': txtPassword.text,
//     }, headers: {
//       'Accept': 'application/json'
//     });
//     // progressDialog.close();

//     if (response.statusCode == 200) {
//       // var responseDecode = jsonDecode(response.body);
//       // bool success = responseDecode['success'];
//       // var data = responseDecode['data'];
//       // var user = responseDecode['user'];
//       // var token = responseDecode['token'];
//       // print(user['name']);

//       final loginModel = loginModelFromJson(response.body);
//       SpUtil.putString("token", loginModel.data.token);
//       SpUtil.putString("name", loginModel.data.user.name);


//       SpUtil.putBool('isLogin', true);
//       Navigator.pushReplacementNamed(context, 'home_page');

//       Alert(
//           context: context,
//           title: "Login Berhasil",
//           type: AlertType.success,
//           buttons: [
//             DialogButton(
//               child: Text("Ok"),
//               onPressed: () {
//                 Navigator.pushNamed(context, 'home_page');
//               },
//             )
//           ]).show();
//     } else {
//       Alert(context: context, title: "Login Gagal", type: AlertType.error)
//           .show();
//     }
//   }

//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//       // appBar: AppBar(
//       //   // title: Text("Login"),
//       // ),
//       body: SingleChildScrollView(
//         child: Container(
//           height: MediaQuery.of(context).size.height,
//           width: MediaQuery.of(context).size.width,
//           // color: Colors.black,
//           child: Stack(
//             alignment: Alignment.center,
//             children: <Widget>[
//               Positioned(
//                 child: Container(
//                   // height: MediaQuery.of(context).size.height,
//                   width: MediaQuery.of(context).size.width,
//                   decoration: BoxDecoration(
//                       // color: Colors.black,
//                       image: DecorationImage(
//                           image: AssetImage('assets/images/a.png'),
//                           fit: BoxFit.fill)),
//                 ),
//               ),
//               Positioned(
//                 right: 210,
//                 top: 0,
//                 width: 90,
//                 height: 130,
//                 child: Container(
//                   decoration: BoxDecoration(
//                       image: DecorationImage(
//                           image: AssetImage('assets/images/light-2.png'))),
//                 ),
//               ),
//               Positioned(
//                 right: 300,
//                 top: 10,
//                 width: 80,
//                 height: 170,
//                 child: Container(
//                   decoration: BoxDecoration(
//                       image: DecorationImage(
//                           image: AssetImage('assets/images/light-1.png'))),
//                 ),
//               ),
//               Positioned(
//                 right: 40,
//                 top: 40,
//                 width: 80,
//                 height: 150,
//                 child: Container(
//                   decoration: BoxDecoration(
//                       image: DecorationImage(
//                           image: AssetImage('assets/images/clock.png'))),
//                 ),
//               ),
//               Positioned(
//                 right: 100,
//                 top: 40,
//                 width: 300,
//                 height: 350,
//                 child: Container(
//                   child: Center(
//                     child: Text(
//                       "Login",
//                       style: TextStyle(
//                           color: Color.fromRGBO(201, 123, 44, 1),
//                           fontSize: 40,
//                           fontWeight: FontWeight.bold),
//                     ),
//                   ),
//                 ),
//               ),
//               Positioned(
//                 right: 210,
//                 top: 0,
//                 width: 140,
//                 height: 1060,
//                 child: Container(
//                   decoration: BoxDecoration(
//                       image: DecorationImage(
//                           image: AssetImage('assets/images/logo.png'))),
//                 ),
//               ),
//               Positioned(
//                 child: Container(
//                   margin:
//                       EdgeInsets.only(left: 20, top: 580, right: 0, bottom: 0),
//                   child: TextButton(
//                     style: TextButton.styleFrom(
//                       textStyle: const TextStyle(
//                         fontSize: 20,
//                         color: Color.fromARGB(255, 255, 255, 255),
//                       ),
//                     ),
//                     onPressed: () {
//                       Navigator.pushNamed(context, 'register_page');
//                     },
//                     child: const Text('Daftar',
//                         style: TextStyle(
//                             color: Color.fromARGB(255, 187, 164, 38))),
//                   ),
//                 ),
//               ),
//               Positioned(
//                 child: Container(
//                   margin:
//                       EdgeInsets.only(left: 0, top: 580, right: 200, bottom: 0),
//                   child: TextButton(
//                     style: TextButton.styleFrom(
//                       textStyle: const TextStyle(
//                         fontSize: 20,
//                         color: Color.fromARGB(255, 255, 255, 255),
//                       ),
//                     ),
//                     onPressed: () {
//                       Navigator.pushNamed(context, 'navigasi_page');
//                     },
//                     child: const Text('Tidak Punya Akun',
//                         style: TextStyle(color: Color.fromARGB(255, 3, 1, 1))),
//                   ),
//                 ),
//               ),
//               Positioned(
//                   top: 290,
//                   // bottom: 10,
//                   left: 10,
//                   child: Container(
//                     // padding: EdgeInsets.all(18),
//                     width: 340,
//                     child: Column(children: <Widget>[
//                       TextFormField(
//                         controller: txtUsername,
//                         decoration: new InputDecoration(
//                             hintText: "masukan nama lengkap anda",
//                             labelText: "Nama Lengkap",
//                             icon: Icon(Icons.people),
//                             border: OutlineInputBorder(
//                                 borderRadius: new BorderRadius.circular(8.0)),
//                             hintStyle: GoogleFonts.oswald(
//                                 color: Color.fromARGB(255, 223, 151, 70),
//                                 fontSize: 14)),
//                         autofocus: true,
//                       ),
//                       SizedBox(height: 30),
//                       TextFormField(
//                         controller: txtPassword,
//                         decoration: new InputDecoration(
//                             hintText: "masukan password",
//                             labelText: "Pasword",
//                             icon: Icon(Icons.password_outlined),
//                             border: OutlineInputBorder(
//                                 borderRadius: new BorderRadius.circular(8.0)),
//                             hintStyle: GoogleFonts.oswald(
//                                 color: Color.fromARGB(255, 223, 151, 70),
//                                 fontSize: 14)),
//                         obscureText: true,
//                         autofocus: true,
//                       ),
//                       SizedBox(height: 20),
//                       Container(
//                         margin: EdgeInsets.only(
//                             left: 220.0, top: 80, right: 1.0, bottom: 1.0),
//                         child: ElevatedButton(
//                           style: ElevatedButton.styleFrom(
//                               primary: Color.fromARGB(255, 141, 130, 130)),
//                           onPressed: () {
//                             this._doLogin();
//                           },
//                           child: Text("Login",
//                               style: TextStyle(
//                                 color: Colors.white,
//                                 fontSize: 24,
//                               )),
//                         ),
//                       ),
//                     ]),
//                   )),
//             ],
//           ),
//         ),
//       ),
//     );
//   }

//   void rutePage(String token) async {
//     SharedPreferences pref = await SharedPreferences.getInstance();
//     await pref.setString("login", token);
//     Navigator.push(
//         context, MaterialPageRoute(builder: (context) => DashboardPage()));
//   }
// }