import 'package:flutter/material.dart';

class ForgotPage extends StatefulWidget {
  @override
  State<StatefulWidget> createState() {
    return ForgotPageState();
  }
}

class ForgotPageState extends State<ForgotPage> {
  int _currentStep = 0;

  final txtEmail = TextEditingController();
  final txtPass = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Stack(
      children: [
        Container(
          decoration: BoxDecoration(
            image: DecorationImage(
              image: AssetImage('assets/imgs/login/forgot.jpg'),
              fit: BoxFit.cover,
              colorFilter: ColorFilter.mode(Colors.black38, BlendMode.darken),
            ),
          ),
        ),
        Scaffold(
          appBar: AppBar(
            backgroundColor: Colors.transparent,
            elevation: 0.0,
          ),
          backgroundColor: Colors.transparent,
          body: SingleChildScrollView(
            child: SafeArea(
              child: Column(
                children: [
                  Container(
                    height: 50,
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        Text(
                          'Quên mật khẩu',
                          style: TextStyle(
                            fontSize: 25,
                            fontWeight: FontWeight.bold,
                            color: Colors.white,
                          ),
                        ),
                      ],
                    ),
                  ),
                  SizedBox(height: 70),
                  Container(
                    padding: EdgeInsets.symmetric(horizontal: 40),
                    child: Column(
                      children: [
                        Stepper(
                          steps: _mySteps(),
                          currentStep: _currentStep,
                          onStepContinue: () {
                            final _isLastStep =
                                _currentStep == _mySteps().length - 1;

                            print(_currentStep);
                            if (_isLastStep) {
                              print('Completed');

                              //code here
                            } else {
                              setState(() {
                                _currentStep += 1;
                              });
                            }
                          },
                          onStepCancel: () {
                            _currentStep == 0
                                ? null
                                : setState(() {
                                    _currentStep -= 1;
                                  });
                          },
                          onStepTapped: (step) {
                            setState(() {
                              _currentStep = step;
                            });
                          },
                          controlsBuilder: (context, ControlsDetails controls) {
                            final _isLastStep =
                                _currentStep == _mySteps().length - 1;
                            return Container(
                              margin: EdgeInsets.only(top: 15),
                              child: Row(
                                children: [
                                  Expanded(
                                    child: MaterialButton(
                                      onPressed: controls.onStepContinue,
                                      minWidth: double.infinity,
                                      height: 40,
                                      color: Color.fromRGBO(125, 130, 188, 1),
                                      shape: RoundedRectangleBorder(
                                        side: BorderSide(color: Colors.black),
                                        borderRadius: BorderRadius.circular(50),
                                      ),
                                      child: Text(
                                        _isLastStep ? 'Xác nhận' : 'Tiếp theo',
                                        style: TextStyle(
                                          color: Colors.white,
                                          fontWeight: FontWeight.w600,
                                          fontSize: 18,
                                        ),
                                      ),
                                    ),
                                  ),
                                  SizedBox(width: 12),
                                  Expanded(
                                    child: MaterialButton(
                                      onPressed: controls.onStepCancel,
                                      minWidth: double.infinity,
                                      height: 40,
                                      color: Colors.grey.shade300,
                                      shape: RoundedRectangleBorder(
                                        side: BorderSide(color: Colors.black),
                                        borderRadius: BorderRadius.circular(50),
                                      ),
                                      child: Text(
                                        'Quay lại',
                                        style: TextStyle(
                                          color: Colors.white,
                                          fontWeight: FontWeight.w600,
                                          fontSize: 18,
                                        ),
                                      ),
                                    ),
                                  ),
                                ],
                              ),
                            );
                          },
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          ),
        ),
      ],
    );
  }

  List<Step> _mySteps() {
    List<Step> _steps = [
      Step(
        state: _currentStep >= 0 ? StepState.complete : StepState.indexed,
        isActive: _currentStep >= 0,
        title: Text(
          'Xác nhận email',
          style: TextStyle(
            fontSize: 20,
            fontWeight: FontWeight.bold,
            color: Colors.white,
          ),
        ),
        content: Column(
          crossAxisAlignment: CrossAxisAlignment.end,
          children: [
            Padding(
              padding: EdgeInsets.symmetric(vertical: 12),
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.grey.shade600.withOpacity(0.5),
                  borderRadius: BorderRadius.circular(20),
                ),
                child: TextField(
                  controller: txtEmail,
                  decoration: InputDecoration(
                    contentPadding: EdgeInsets.symmetric(vertical: 20),
                    border: InputBorder.none,
                    hintText: 'Nhập email để nhận mã code',
                    prefixIcon: Padding(
                      padding: EdgeInsets.symmetric(horizontal: 20),
                      child: Icon(
                        Icons.email_outlined,
                        color: Colors.white,
                        size: 25,
                      ),
                    ),
                    hintStyle: TextStyle(
                      fontSize: 15,
                      color: Colors.white60,
                    ),
                  ),
                  style: TextStyle(
                    fontSize: 15,
                    color: Colors.white,
                  ),
                  keyboardType: TextInputType.emailAddress,
                  textInputAction: TextInputAction.next,
                ),
              ),
            ),
          ],
        ),
      ),
      Step(
        state: _currentStep >= 1 ? StepState.complete : StepState.indexed,
        isActive: _currentStep >= 1,
        title: Text(
          'Xác nhận code',
          style: TextStyle(
            fontSize: 20,
            fontWeight: FontWeight.bold,
            color: Colors.white,
          ),
        ),
        content: Column(
          crossAxisAlignment: CrossAxisAlignment.end,
          children: [
            Padding(
              padding: EdgeInsets.symmetric(vertical: 12),
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.grey.shade600.withOpacity(0.5),
                  borderRadius: BorderRadius.circular(20),
                ),
                child: TextField(
                  decoration: InputDecoration(
                    contentPadding: EdgeInsets.symmetric(vertical: 20),
                    border: InputBorder.none,
                    hintText: 'Nhập mã code',
                    prefixIcon: Padding(
                      padding: EdgeInsets.symmetric(horizontal: 20),
                      child: Icon(
                        Icons.confirmation_number_outlined,
                        color: Colors.white,
                        size: 25,
                      ),
                    ),
                    hintStyle: TextStyle(
                      fontSize: 15,
                      color: Colors.white60,
                    ),
                  ),
                  style: TextStyle(
                    fontSize: 15,
                    color: Colors.white,
                  ),
                  keyboardType: TextInputType.number,
                  textInputAction: TextInputAction.next,
                ),
              ),
            ),
          ],
        ),
      ),
      Step(
        state: _currentStep >= 2 ? StepState.complete : StepState.indexed,
        isActive: _currentStep >= 2,
        title: Text(
          'Đổi mật khẩu',
          style: TextStyle(
            fontSize: 20,
            fontWeight: FontWeight.bold,
            color: Colors.white,
          ),
        ),
        content: Column(
          children: [
            Column(
              crossAxisAlignment: CrossAxisAlignment.end,
              children: [
                Padding(
                  padding: EdgeInsets.symmetric(vertical: 12),
                  child: Container(
                    decoration: BoxDecoration(
                      color: Colors.grey.shade600.withOpacity(0.5),
                      borderRadius: BorderRadius.circular(20),
                    ),
                    child: TextField(
                      readOnly: true,
                      decoration: InputDecoration(
                        contentPadding: EdgeInsets.symmetric(vertical: 20),
                        border: InputBorder.none,
                        hintText: txtEmail.text,
                        prefixIcon: Padding(
                          padding: EdgeInsets.symmetric(horizontal: 20),
                          child: Icon(
                            Icons.email_outlined,
                            color: Colors.white,
                            size: 25,
                          ),
                        ),
                        hintStyle: TextStyle(
                          fontSize: 15,
                          color: Colors.white60,
                        ),
                      ),
                      style: TextStyle(
                        fontSize: 15,
                        color: Colors.white,
                      ),
                      keyboardType: TextInputType.emailAddress,
                      textInputAction: TextInputAction.next,
                    ),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.symmetric(vertical: 12),
                  child: Container(
                    decoration: BoxDecoration(
                      color: Colors.grey.shade600.withOpacity(0.5),
                      borderRadius: BorderRadius.circular(20),
                    ),
                    child: TextField(
                      decoration: InputDecoration(
                        contentPadding: EdgeInsets.symmetric(vertical: 20),
                        border: InputBorder.none,
                        hintText: 'Mật khẩu mới',
                        prefixIcon: Padding(
                          padding: EdgeInsets.symmetric(horizontal: 20),
                          child: Icon(
                            Icons.lock_outline,
                            color: Colors.white,
                            size: 25,
                          ),
                        ),
                        hintStyle: TextStyle(
                          fontSize: 15,
                          color: Colors.white60,
                        ),
                      ),
                      style: TextStyle(
                        fontSize: 15,
                        color: Colors.white,
                      ),
                      textInputAction: TextInputAction.next,
                      obscureText: true,
                    ),
                  ),
                ),
                Padding(
                  padding: EdgeInsets.symmetric(vertical: 12),
                  child: Container(
                    decoration: BoxDecoration(
                      color: Colors.grey.shade600.withOpacity(0.5),
                      borderRadius: BorderRadius.circular(20),
                    ),
                    child: TextField(
                      decoration: InputDecoration(
                        contentPadding: EdgeInsets.symmetric(vertical: 20),
                        border: InputBorder.none,
                        hintText: 'Xác nhận mật khẩu',
                        prefixIcon: Padding(
                          padding: EdgeInsets.symmetric(horizontal: 20),
                          child: Icon(
                            Icons.lock_outline,
                            color: Colors.white,
                            size: 25,
                          ),
                        ),
                        hintStyle: TextStyle(
                          fontSize: 15,
                          color: Colors.white60,
                        ),
                      ),
                      style: TextStyle(
                        fontSize: 15,
                        color: Colors.white,
                      ),
                      textInputAction: TextInputAction.next,
                      obscureText: true,
                    ),
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    ];
    return _steps;
  }
}
