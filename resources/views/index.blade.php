<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        
        <link rel="stylesheet" href="{{ URL::asset('css/form.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <title></title>
    </head>

    <body>
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">ลงทะเบียน</h1>
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <!--<div id="succes-alert" class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                ลงทะเบียนข้อมูลสำเร็จ
                            </div>-->
                            @if($errors->any())
                            <div id="fail-alert" class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $errors->first()}}
                            </div>
                            @endif
                            <div class="tab-content">
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form id="Form" action="/store" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group"> 
                                            <label for="idcard">
                                                <h6>เลขบัตรประชาชน</h6>
                                            </label> 
                                            <input type="text" id="idcard" name="idcard" placeholder="หมายเลขบัตร" maxlength="13" required class="form-control "> 
                                            <span id="id_error" class="error"></span>
                                        </div>
                                        <div class="form-group"> 
                                            <label for="birthdate">
                                                <h6>ปีเกิด</h6>
                                            </label>
                                            <div class="input-group"> 
                                                <input type="date" id="birthdate" name="birthdate" placeholder="" class="form-control " required>
                                            </div>
                                        </div>
                                        <div class="form-group"> 
                                            <label for="phone">
                                                <h6>เบอร์โทร</h6>
                                            </label> 
                                            <input type="text" id="phone" name="phone" placeholder="เบอร์โทร" maxlength="10" required class="form-control "> 
                                            <span id="phone_error" class="error"></span>
                                        </div>
                                        <div class="card-footer"> 
                                            <input type="submit" id="submit" class="subscribe btn btn-primary btn-block shadow-sm" value="ยืนยัน">
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type = "text/javascript">

            ////    Send form data  ////
            function register() {
                var form = $('#Form')[0];
                var formData = new FormData(form);

                console.log('Send Message');
                
                $.ajax({
                    type: "post",
                    url: "/store",
                    data: formData,
                    dataType: 'text',
                    contentType: false,
                    processData: false,
                    success: function(result){
                        console.log(result);
                        if(result == true){
                            $("#succes-alert").show();
                        }else{
                            $("#fail-alert").show();
                        }
                    },
                        error: function (xhr, status, error) {
                        alert("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
                    }
                })

                $('#Form')[0].reset();
                $('#id_error').text('');
                $('#phone_error').text('');
            }

            ////    Form submit     ////
            /*$('#Form').submit(function (e) {
                e.preventDefault();
                if( check_validate() == false ) return 0;
                register();
            });*/

            ////    Check Form is validate  ////
            function check_validate(){
                if( $('#id_error').hasClass('true') == true && $('#phone_error').hasClass('true') == true ) return true;
                return false;
            }

            ////    Check ID input  ////
            $(document).ready(function(){
                $('#idcard').on('keyup',function(){
                    if($.trim($(this).val()) != '' && $(this).val().length == 13){
                        id = $(this).val().replace(/-/g,"");
                        var result = Script_checkID(id);
                        if(result === false){
                            fail_validate('id_error', 'เลขบัตรไม่ถูกต้อง');
                        }else{
                            success_validate('id_error', 'เลขบัตรถูกต้อง');
                        }
                    }else{
                        fail_validate('id_error', 'เลขบัตรไม่ครบ');
                    }
                })
            });

            ////    Check Phone Number input    ////
            $(document).ready(function(){
                $('#phone').on('keyup',function(){
                    if($.trim($(this).val()) != '' && $(this).val().length == 10){
                        phone = $(this).val();
                        var result = isPhoneNo(phone);
                        if(result === false){
                            fail_validate('phone_error', 'รูปแบบเบอร์โทรผิด');
                        }else{
                            success_validate('phone_error', 'รูปแบบเบอร์โทรถูกต้อง');
                        }
                    }else{
                        fail_validate('phone_error', 'เบอร์โทรไม่ครบ');
                    }
                })
            });

            ////    Show success validation     ////
            function success_validate(id, text){
                $('#' + id).addClass('true').text(text);
            }

            ////    Show fail validation    ////
            function fail_validate(id, text){
                $('#' + id).removeClass('true').text(text);
            }

            ////    ID Card Validation  ////
            function Script_checkID(id){
                if(! IsNumeric(id)) return false;
                if(id.substring(0,1)== 0) return false;
                if(id.length != 13) return false;
                for(i=0, sum=0; i < 12; i++)
                    sum += parseFloat(id.charAt(i))*(13-i);
                if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
                return true;
            }

            function IsNumeric(input){
                var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
                return (RE.test(input));
            }

            ////    Phone Number Validation    ////
            function isPhoneNo(input){
                var regExp = /^0[0-9]{8,9}$/i;
                return regExp.test(input);
            }

        </script>
    </body>

</html>