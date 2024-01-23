<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Snipped Code

### Login function
```
try {
      final GoogleSignInAccount? gUser = await GoogleSignIn().signIn();
      final GoogleSignInAuthentication gAuth = await gUser!.authentication;

      final credential = GoogleAuthProvider.credential(
        accessToken: gAuth.accessToken,
        idToken: gAuth.idToken,
      );

      await FirebaseAuth.instance.signInWithCredential(credential);

      Navigator.pushNamed(context, '/home');
    } catch (error) {
      print('Google Sign-In error: $error');
    }
  }
```

### Login UI
```
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Login Screen'),
      ),
      body: Container(
        color: Color(0xFFF4FBFE),
        padding: EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            TextField(
              controller: emailController,
              decoration: InputDecoration(
                labelText: 'Email',
                hintText: 'Enter your email',
                prefixIcon: Icon(Icons.email),
              ),
            ),
            SizedBox(height: 16.0),

            TextField(
              controller: passwordController,
              obscureText: true,
              decoration: InputDecoration(
                labelText: 'Password',
                hintText: 'Enter your password',
                prefixIcon: Icon(Icons.lock),
              ),
            ),
            SizedBox(height: 24.0),

            ElevatedButton(
              onPressed: () {
                signInWithEmailAndPassword(context);
              }, 
              child: Text('Login')
            ),
            SizedBox(height: 12.0),

            ElevatedButton(
              onPressed: () {
                handleGoogleSignIn(context);
              },
              child: Row (
                mainAxisSize: MainAxisSize.min,
                children: [
                  Image.asset('lib/images/google.png', height: 24.0),
                  SizedBox(width: 12.0),
                  Text('Sign in with Google'),
                ],
              ),
            ),
            SizedBox(height: 12.0),

            TextButton(
              onPressed: () {
                Navigator.pushNamed(context, '/register');
              },
              child: Text('Don\'t have an account? Register here'),
            ),
          ],
        ),
      ),
    );
  }
```

### Register function
```
 Future<void> createAccount(BuildContext context) async {
    try {
      UserCredential userCredential = await FirebaseAuth.instance.createUserWithEmailAndPassword(
        email: emailController.text,
        password: passwordController.text,
      );

      print('User registered: ${userCredential.user?.email}');

      Navigator.pushNamed(context, '/home');
    } catch (error) {
      print('Registration error: $error');
    }
  }
```

### Register UI
```
 Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Register Screen'),
      ),
      body: Container(
        color: Color(0xFFF4FBFE),
        padding: EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            TextField(
              controller: emailController,
              decoration: InputDecoration(
                labelText: 'Email',
                hintText: 'Enter your email',
                prefixIcon: Icon(Icons.email),
              ),
            ),
            SizedBox(height: 16.0),

            TextField(
              controller: passwordController,
              obscureText: true,
              decoration: InputDecoration(
                labelText: 'Password',
                hintText: 'Enter your password',
                prefixIcon: Icon(Icons.lock),
              ),
            ),
            SizedBox(height: 24.0),

            ElevatedButton(
              onPressed: () {
                createAccount(context);
              },
              child: Text('Register'),
            ),
            SizedBox(height: 12.0),
            SizedBox(height: 12.0),

            TextButton(
              onPressed: () {
                Navigator.pushNamed(context, '/login');
              },
              child: Text('Already have an account? Login here'),
            ),
          ],
        ),
      ),
    );
  }
```

### Firebase options
```
// File generated by FlutterFire CLI.
// ignore_for_file: lines_longer_than_80_chars, avoid_classes_with_only_static_members
import 'package:firebase_core/firebase_core.dart' show FirebaseOptions;
import 'package:flutter/foundation.dart'
    show defaultTargetPlatform, kIsWeb, TargetPlatform;

/// Default [FirebaseOptions] for use with your Firebase apps.
///
/// Example:
/// ```dart
/// import 'firebase_options.dart';
/// // ...
/// await Firebase.initializeApp(
///   options: DefaultFirebaseOptions.currentPlatform,
/// );
/// ```
class DefaultFirebaseOptions {
  static FirebaseOptions get currentPlatform {
    if (kIsWeb) {
      throw UnsupportedError(
        'DefaultFirebaseOptions have not been configured for web - '
        'you can reconfigure this by running the FlutterFire CLI again.',
      );
    }
    switch (defaultTargetPlatform) {
      case TargetPlatform.android:
        return android;
      case TargetPlatform.iOS:
        throw UnsupportedError(
          'DefaultFirebaseOptions have not been configured for ios - '
          'you can reconfigure this by running the FlutterFire CLI again.',
        );
      case TargetPlatform.macOS:
        throw UnsupportedError(
          'DefaultFirebaseOptions have not been configured for macos - '
          'you can reconfigure this by running the FlutterFire CLI again.',
        );
      case TargetPlatform.windows:
        throw UnsupportedError(
          'DefaultFirebaseOptions have not been configured for windows - '
          'you can reconfigure this by running the FlutterFire CLI again.',
        );
      case TargetPlatform.linux:
        throw UnsupportedError(
          'DefaultFirebaseOptions have not been configured for linux - '
          'you can reconfigure this by running the FlutterFire CLI again.',
        );
      default:
        throw UnsupportedError(
          'DefaultFirebaseOptions are not supported for this platform.',
        );
    }
  }

  static const FirebaseOptions android = FirebaseOptions(
    apiKey: 'AIzaSyCLf99rtsOjgIw-WjQ8OlqPF5F_qxlDtiA',
    appId: '1:650879931461:android:33c3a45b229fe89ac4ff2c',
    messagingSenderId: '650879931461',
    projectId: 'groupproject-a248b',
    storageBucket: 'groupproject-a248b.appspot.com',
  );
}

```

### Home Page
```
import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:google_sign_in/google_sign_in.dart';

class HomeScreen extends StatefulWidget {
  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {

  @override
  void initState() {
    super.initState();
    fetchData();
  }

  Future<void> _revokeGoogleTokens() async {
    final GoogleSignIn _googleSignIn = GoogleSignIn();
    await _googleSignIn.signOut();
  }

  Future<void> _logout(BuildContext context) async {
    try {
      // Sign out locally within your app
      await FirebaseAuth.instance.signOut();

      // Revoke Google tokens
      await _revokeGoogleTokens();

      // Navigate back to the login screen
      Navigator.pushReplacementNamed(context, '/login');
    } catch (error) {
      print('Logout error: $error');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Home Screen'),
      ),
      body: Center(
        child: Container(
          color: Color(0xFFF4FBFE), // Background color
          padding: EdgeInsets.all(16.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              ElevatedButton(
                onPressed: () async {
                  // Perform logout
                  await _logout(context);
                },
                child: Text('Logout'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

```
