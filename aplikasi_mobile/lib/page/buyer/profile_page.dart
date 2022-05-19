import 'dart:convert';
import 'package:flutter/material.dart';

class ProfilePage extends StatelessWidget {

final String url = 'http://192.168.1.15:8000/api/propertys';
static String routeName = "/profile";

  Widget textfield({required String hintText}){
    return Material(
      elevation: 3,
      shadowColor: Colors.brown[100],
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(3),
      ),
          child: TextField(
        decoration: InputDecoration(
          hintText: hintText,
          hintStyle: TextStyle(
            letterSpacing: 1.5,
            color: Colors.black54,
            fontWeight: FontWeight.bold,
          ),
          fillColor: Colors.white,
          filled: true,
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(7),
            borderSide: BorderSide.none
          ),
        ),
      ),
    );
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
      elevation: 0.0,
      backgroundColor: Colors.brown[200],
      leading: IconButton(icon: Icon(Icons.arrow_back),
      onPressed: () {},
        ),
      ),
      body: Stack(alignment: Alignment.center,
      children: [
        Column(
          mainAxisAlignment: MainAxisAlignment.end,
          children: [
            Container(
              height: 330,
              width: 330,
              margin: EdgeInsets.symmetric(horizontal: 5),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                children: [
                  textfield(
                    hintText: 'Username', 
                  ),
                  textfield(
                    hintText: 'Email', 
                  ),
                  textfield(
                    hintText: 'Password', 
                  ),
                  textfield(
                    hintText: 'Confirm password', 
                  ),
                  Container(
                    height: 35,
                    width: double.infinity,
                    child: RaisedButton(
                      onPressed: (){},
                      color: Colors.black12,
                      child: Center(
                        child: Text("Update", style: TextStyle(
                          fontSize: 23,
                          color: Colors.white,
                          ),
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            ),
          ]
        ),
        CustomPaint(child: Container(
          width: MediaQuery.of(context).size.width,
          height: MediaQuery.of(context).size.height,
        ),
        painter: HeaderCurvedContainer(),
      ),
        Column(
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Padding(
            padding: EdgeInsets.all(2),
            child: Text(
            "Profile",
            style: TextStyle(
            fontSize: 35,
            letterSpacing: 2,
            color: Colors.white,
            fontWeight: FontWeight.w600,
            ),
            ),
            ),
            Container(
              padding: EdgeInsets.all(2),
              width: MediaQuery.of(context).size.width/2,
              height: MediaQuery.of(context).size.width/2,
              decoration: BoxDecoration(
                border: Border.all(color: Colors.grey.shade300, width: 3),
                shape: BoxShape.circle,
                color: Colors.white,
                image: DecorationImage(
                  fit: BoxFit.cover,
                  image: AssetImage('assets/images/profile.png'),
                  ),
              ),
            ),
          ],
        ),
        Padding(padding: EdgeInsets.only(bottom: 270, left: 184),
        child: CircleAvatar(
          backgroundColor: Colors.black54,
          child: IconButton(
            icon: Icon(
              Icons.edit,
              color: Colors.white,
              ),
              onPressed: (){},
            ),
        ),
        ),
      ],
      )
    );
  }
}

class HeaderCurvedContainer extends CustomPainter{

  @override
  void paint(Canvas canvas, Size size) {
    Paint paint= Paint()..color=Colors.brown.shade200;
    Path path= Path()
    ..relativeLineTo(0, 150)
    ..quadraticBezierTo(size.width/2, 225, size.width, 150)
    ..relativeLineTo(0, -150)
    ..close();
    canvas.drawPath(path, paint);
  }
  @override
  bool shouldRepaint(CustomPainter oldDelegate)=>false;
}

// class ProfilePage extends StatefulWidget {
//   // const ProfilePage({ Key? key }) : super(key: key);

//   @override
//   State<ProfilePage> createState() => _ProfilePageState();
// }


//   get SvgPicture => null;
//   @override
//   Widget build(BuildContext context) {
//     var profile;
//     return Scaffold(
//       appBar: AppBar(
//         title: Text("Profile"),
//       ),
//       body: Column(children: [
//         SizedBox(
//           height: 115, 
//           width: 115, 
//           child: Stack(
//             fit: StackFit.expand,
//             children: [
//               CircleAvatar(backgroundImage: AssetImage('assets/images/1.jpg'),
//               ),
//               SizedBox(
//                 height: 46, 
//                 width: 46, 
//                 child: FlatButton(
//                   onPressed: () {},
//                   child: SvgPicture.assets('assets/images/1.jpg'),
//                 )
//               )
//             ],
//           ), 
//           )
//       ]),
//       bottomNavigationBar: CustomBottomNavBar(selectedMenu: MenuState),
//     );
//   }

//   CustomBottomNavBar({selectedMenu}) {}
// }

// class MenuState {
// }