import 'dart:io';
// import 'package:coba/theme/colors.dart';
import '../../widget/syarat_widget.dart';
import 'package:file_picker/file_picker.dart';
import 'package:flutter/material.dart';
// import 'package:coba/screens/home_page.dart';
import 'package:flutter/services.dart';
import 'package:http/http.dart' as http;
import 'package:async/async.dart';

class FileUpload extends StatefulWidget {
  const FileUpload({Key? key}) : super(key: key);

  @override
  State<FileUpload> createState() => _FileUploadState();
}

class _FileUploadState extends State<FileUpload> {
  late File _file;
  late String _namaFile;
  late String _filePath;
  FilePicker filePicker = FilePicker.platform;
  final GlobalKey<ScaffoldState> _scaffoldKey = GlobalKey<ScaffoldState>();
  final _scaffoldMessengerKey = GlobalKey<ScaffoldMessengerState>();
  String? _fileName;
  File? imageKtp;
  File? imagePasFoto;
  File? imageKk;
  File? imageRekening;
  File? imageNpwp;
  File? imageSiup;
  File? imageFotoNikah;
  String? suratKaryawan;
  String? suratGaji;
  String? suratPegawai;
  String? sk;
  String? _saveAsFileName;
  List<PlatformFile>? _paths;
  String? _directoryPath;
  String? _extension;
  bool _isLoading = false;
  bool _userAborted = false;
  bool _multiPick = false;
  FileType _pickingType = FileType.any;

  void _ambilFile() async {
    var path = await filePicker.getDirectoryPath();
    var file = await filePicker.pickFiles(
        type: FileType.custom, allowedExtensions: ["pdf", "doc", "docx"]);
    // print(path.runtimeType);
    setState(() {
      _filePath = path.toString();
      _namaFile = path.toString().split("/").last;
      _file = file as File;
    });

    print(_filePath);
    print(_namaFile);
  }

  // void _uploadFile(File file) async {
  //   var stream = http.ByteStream(DelegatingStream.typed(file.openRead()));
  //   var length = file.length();
  //   var url = Uri.parse('http://10.5.50.224/api/syarat');

  //   var request = http.MultipartRequest("POST", url);
  //   var multipartFile = http.MultipartFile.fromPath("dokumen", file.path);

  //   request.files.add(multipartFile);
  //   var response = await request.send();
  //   if (response.statusCode == 200) {
  //     print("File berhasil diupload");
  //   } else {
  //     print("File gagal diupload");
  //   }
  // }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Formulir Syarat"),
        actions: <Widget>[
          IconButton(
            onPressed: () {
              _ambilFile();
            },
            icon: Icon(Icons.file_upload),
          )
        ],
      ),
      body: Container(
        width: MediaQuery.of(context).size.width,
        child: ListView(
          children: <Widget>[
            SizedBox(
              height: 30,
            ),
            Text(
              "Silahkan Isi Formulir Terlebih Dahulu",
              style: TextStyle(
                  fontSize: 20, color: Color.fromARGB(255, 97, 78, 84)),
            ),

            TextFieldSyarat(
                hintText: "Nama Lengkap", textInputType: TextInputType.text),
            // TextFieldSyarat(
            //     hintText: "Nomor KTP", textInputType: TextInputType.text),
            // TextFieldSyarat(
            //     hintText: "Alamat Rumah Huni Sekarang",
            //     textInputType: TextInputType.text),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Surat Keterangan Karyawan"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickSuratKaryawan(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih File'),
                ),
              ],
            ),
            Text(suratKaryawan.toString()),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Surat Legalisir Penghasilan (Slip Gaji)"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickSuratgaji(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih File'),
                ),
              ],
            ),
            Text(suratGaji.toString()),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Surat Legalisir Kartu Pegawai"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickSuratPegawai(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih File'),
                ),
              ],
            ),
            Text(suratPegawai.toString()),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Surat Legalisir SK Pertama dan Terakhir"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickSk(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih File'),
                ),
              ],
            ),
            Text(sk.toString()),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto Berwarna Suami dan Istri"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImagePasFoto(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imagePasFoto == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imagePasFoto),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto KTP"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImageKtp(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imageKtp == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imageKtp),

            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto Surat Nikah"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImageFotoNikah(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imageFotoNikah == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imageFotoNikah),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto Kartu Keluarga"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImageKk(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imageKk == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imageKk),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto Rekening Tabungan (Min 4 Bulan)"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImageRekening(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imageRekening == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imageRekening),
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto SIUP dan TDP Perusahaan"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImageSiup(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imageSiup == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imageSiup),

            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Text("Foto NPWP Pribadi"),
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () => _pickImageNpwp(),
                  child: Text(_multiPick ? 'Pilih Gambars' : 'Pilih Gambar'),
                ),
              ],
            ),
            imageNpwp == null
                ? const Text("Pilih Gambar")
                : WidgetGmbar(imageFile: imageNpwp),
            // Text()
            Row(
              crossAxisAlignment: CrossAxisAlignment.center,
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                ElevatedButton(
                  style: ButtonStyle(
                      backgroundColor: MaterialStateProperty.all<Color>(
                          Color.fromARGB(255, 181, 149, 137))),
                  onPressed: () {
                    ScaffoldMessenger.of(context).showSnackBar(const SnackBar(
                        content: Text('Data Berhasil Disimpan')));
                  },
                  child: const Text("Simpan"),
                ),
                SizedBox(
                  height: 10,
                )
              ],
            ),
            // _namaFile == null
            //     ? Text("Lampirkan Surat NPWP : ")
            //     : Text("Surat NPWP : $_namaFile "),
            // SizedBox(height: 15),
            // _filePath == null
            //     ? Text("Lampirkan Surat NPWP : ")
            //     : Text("Surat NPWP : $_filePath "),
            // SizedBox(
            //   height: 15,
            // ),
            // OutlineButton(
            //   child: Text("Upload File"),
            //   onPressed: () {},
            //
          ],
        ),
      ),
    );
  }

  void _pickSuratKaryawan() async {
    _resetState();
    try {
      _directoryPath = null;
      _paths = (await FilePicker.platform.pickFiles(
              type: FileType.custom,
              allowMultiple: _multiPick,
              onFileLoading: (FilePickerStatus status) => print(status),
              allowedExtensions: ["pdf"]))
          ?.files;
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
    if (!mounted) return;
    setState(() {
      _isLoading = false;
      suratKaryawan =
          (_paths != null ? _paths!.map((e) => e.name).toString() : '...');
      _userAborted = _paths == null;
    });
  }

  void _pickSuratgaji() async {
    _resetState();
    try {
      _directoryPath = null;
      _paths = (await FilePicker.platform.pickFiles(
              type: FileType.custom,
              allowMultiple: _multiPick,
              onFileLoading: (FilePickerStatus status) => print(status),
              allowedExtensions: ["pdf"]))
          ?.files;
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
    if (!mounted) return;
    setState(() {
      _isLoading = false;
      suratGaji =
          (_paths != null ? _paths!.map((e) => e.name).toString() : '...');
      _userAborted = _paths == null;
    });
  }

  void _pickSuratPegawai() async {
    _resetState();
    try {
      _directoryPath = null;
      _paths = (await FilePicker.platform.pickFiles(
              type: FileType.custom,
              allowMultiple: _multiPick,
              onFileLoading: (FilePickerStatus status) => print(status),
              allowedExtensions: ["pdf"]))
          ?.files;
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
    if (!mounted) return;
    setState(() {
      _isLoading = false;
      suratPegawai =
          (_paths != null ? _paths!.map((e) => e.name).toString() : '...');
      _userAborted = _paths == null;
    });
  }

  void _pickSk() async {
    _resetState();
    try {
      _directoryPath = null;
      _paths = (await FilePicker.platform.pickFiles(
              type: FileType.custom,
              allowMultiple: _multiPick,
              onFileLoading: (FilePickerStatus status) => print(status),
              allowedExtensions: ["pdf"]))
          ?.files;
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
    if (!mounted) return;
    setState(() {
      _isLoading = false;
      sk = _paths != null ? _paths!.map((e) => e.name).toString() : '...';
      _userAborted = _paths == null;
    });
  }

  void _pickImageKtp() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imageKtp = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _pickImagePasFoto() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imagePasFoto = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _pickImageKk() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imageKk = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _pickImageRekening() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imageRekening = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _pickImageNpwp() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imageNpwp = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _pickImageSiup() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imageSiup = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _pickImageFotoNikah() async {
    _resetState();
    try {
      FilePickerResult? result =
          await FilePicker.platform.pickFiles(type: FileType.media);
      if (result != null) {
        File file = File(result.files.single.path!);
        // print(ZZZZzz);
        setState(() {
          imageFotoNikah = file;
        });
      } else {
        // User canceled the picker
      }
    } on PlatformException catch (e) {
      _logException('Unsupported operation' + e.toString());
    } catch (e) {
      _logException(e.toString());
    }
  }

  void _resetState() {
    if (!mounted) {
      return;
    }
    setState(() {
      _isLoading = true;
      _directoryPath = null;
      _fileName = null;
      _paths = null;
      _saveAsFileName = null;
      _userAborted = false;
    });
  }

  void _logException(String message) {
    print(message);
    _scaffoldMessengerKey.currentState?.hideCurrentSnackBar();
    _scaffoldMessengerKey.currentState?.showSnackBar(
      SnackBar(
        content: Text(message),
      ),
    );
  }
}

class WidgetGmbar extends StatelessWidget {
  const WidgetGmbar({
    Key? key,
    required this.imageFile,
  }) : super(key: key);

  final File? imageFile;

  @override
  Widget build(BuildContext context) {
    return Padding(
      padding: const EdgeInsets.all(20),
      child: SizedBox(
        width: 100,
        height: 200,
        child: Image.file(imageFile!, fit: BoxFit.cover),
      ),
    );
  }
}
