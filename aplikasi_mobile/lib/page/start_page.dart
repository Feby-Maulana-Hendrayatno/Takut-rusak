import 'dart:convert';

import 'package:flutter/material.dart';
// import 'package:grouped_buttons/grouped_buttons.dart';
import 'package:intl/intl.dart';
import 'package:datetime_picker_formfield/datetime_picker_formfield.dart';
// import 'package:sn_progress_dialog/progress_dialog.dart';
import 'package:rflutter_alert/rflutter_alert.dart';
import 'package:http/http.dart' as http;


class Start extends StatefulWidget {
  Start({Key? key}) : super(key: key);

  @override
  State<Start> createState() => _StartPageState();
}

class _StartPageState extends State<Start> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Halaman Mulai')),
    );
    body:
    Column(children: <Widget>[
      Container(
          child: Column(children: <Widget>[
        TextFormField(
          decoration: InputDecoration(hintText: "HI"),
        )
      ]))
    ]);
  }
}
