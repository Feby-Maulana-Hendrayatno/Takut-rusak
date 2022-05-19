import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:aplikasi_mobile/page/property/property.dart';
import 'package:http/http.dart' as http;

class EditProduct extends StatelessWidget {
  final Map product;
  EditProduct({required this.product});
  final _formKey = GlobalKey<FormState>();
  TextEditingController _nameController = new TextEditingController();
  TextEditingController _descriptionController = new TextEditingController();
  TextEditingController _priceController = new TextEditingController();
  TextEditingController _locationController = new TextEditingController();
  TextEditingController _imageController = new TextEditingController();
  Future updateProduct() async {
    final response = await http.put(
        Uri.parse("http://192.168.1.15:8000/api/propertys/" + product['id'].toString()),
        body: {
          "name": _nameController.text,
          "description": _descriptionController.text,
          "price": _priceController.text,
          "location": _locationController.text,
          "image": _imageController.text,
        });
    return json.decode(response.body);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Edit Product'),
      ),
      body: Form(
        key: _formKey,
        child: Column(children: [
          TextFormField(
              controller: _nameController..text = product['name'],
              decoration: InputDecoration(labelText: "Name"),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return "Please enter product name";
                }
                return null;
              }),
          TextFormField(
              controller: _descriptionController..text = product['description'],
              decoration: InputDecoration(labelText: "Description"),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return "Please enter product Description";
                }
                return null;
              }),
          TextFormField(
              controller: _locationController..text = product['location'],
              decoration: InputDecoration(labelText: "location"),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return "Please enter product Description";
                }
                return null;
              }),
          TextFormField(
              controller: _priceController..text = product['price'],
              decoration: InputDecoration(labelText: "Price"),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return "Please enter product Price";
                }
                return null;
              }),
          TextFormField(
              controller: _imageController..text = product['image'],
              decoration: InputDecoration(labelText: "Image"),
              validator: (value) {
                if (value == null || value.isEmpty) {
                  return "Please enter product Image";
                }
                return null;
              }),
          SizedBox(
            height: 20,
          ),
          ElevatedButton(
              onPressed: () {
                if (_formKey.currentState!.validate()) {
                  updateProduct().then((value) {
                    Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => PropertyPage(),
                        ));
                    ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                      content: Text("Product berhasil di update"),
                    ));
                  });
                }
                // print(__nameController.text);
              },
              child: Text("Update"))
        ]),
      ),
    );
  }
}
