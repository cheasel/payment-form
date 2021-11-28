<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        
        <link rel="stylesheet" href="{{ URL::asset('css/otp.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <title></title>
    </head>

    <body>
        <div class="container py-5 align-middle" >
            <div class="row mb-4">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-6">ยืนยัน OTP</h1>
                </div>
            </div> 
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <div class="tab-content">
                                <div id="credit-card" class="tab-pane fade show active pt-3">
                                    <form id="Form" action="/success-otp" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group"> 

                                            <input type="hidden" id="phone" name="phone" value="{{ $phone }}" class="form-control "> 

                                            <label for="idcard">
                                                <h6>ยืนยันด้วยหมายเลขโทรศัพท์</h6>
                                            </label> 
                                            <div class="input-group">
                                                <input type="text" id="otp" name="otp" placeholder="" maxlength="6" required class="form-control "> 
                                            </div>
                                            <!--<span id="explain" class="explain"> ใส่หมายเลขที่ส่งไปยัง </span>-->
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

            ////    Send otp to phone   ////
            $('.send-otp').click( function () {
                $(this).addClass('true');
                $(this).text('ส่งรหัสแล้ว');
            });        



        </script>
    </body>

</html>