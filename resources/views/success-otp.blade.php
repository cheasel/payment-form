<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="x-apple-disable-message-reformatting">
        
        <link rel="stylesheet" href="{{ URL::asset('css/success-otp.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <title></title>

        <?php
            $json_string = json_encode($result, JSON_PRETTY_PRINT);
        ?>
    </head>

    <body>
        <div class="container py-5 " >
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card ">
                        <div class="card-header">
                            <div class="tab-content pt-3 text-center">
                                <!--<div class="tick">
                                    <img src="/img/tick.png">
                                </div>
                                <h2 style="color:#0fad00">ยืนยันสำเร็จ</h2>
                                <p class="my-3"> ยืนยัน OTP ด้วยโทรศัพท์หมายเลข สำเร็จ </p>-->
                                
                                <pre> {{ $json_string }} </pre>
                                
                                <!--<div class="home">
                                    <a href="/" class="subscribe btn btn-primary btn-block shadow-sm"> กลับหน้าแรก </a>
                                </div>-->
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