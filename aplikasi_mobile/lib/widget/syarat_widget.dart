import 'package:flutter/material.dart';

class TextFieldSyarat extends StatelessWidget {
  TextEditingController? textEditingController;
  bool? isPass;
  final String hintText;
  final TextInputType? textInputType;

  TextFieldSyarat(
      {this.textEditingController,
      required this.hintText,
      this.isPass = false,
      required this.textInputType,
      Key? key})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    final inputBorder =
        OutlineInputBorder(borderSide: Divider.createBorderSide(context));
    return Container(
      margin: EdgeInsets.only(top: 10),
      child: TextField(
        controller: textEditingController,
        decoration: InputDecoration(
          fillColor: Colors.white,
          hintText: hintText,
          border: inputBorder,
          focusedBorder: inputBorder,
          enabledBorder: inputBorder,
          filled: true,
          contentPadding: EdgeInsets.all(8),
        ),
        keyboardType: textInputType!,
        obscureText: isPass!,
      ),
    );
  }
}
