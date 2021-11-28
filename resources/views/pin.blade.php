@section('script-add')
    <link rel="stylesheet" href="{{ URL::asset('css/otp.css') }}">

    <title></title>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container py-5 align-middle" >
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">PIN</h1>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="tab-content">
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form id="Form" action="/pin-check" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group"> 
                                        <label for="idcard">
                                            <h6>กรุณาระบุ PIN</h6>
                                        </label> 
                                        <div class="input-group">
                                            <input type="text" id="pin" name="pin" placeholder="" maxlength="4" required class="form-control "> 
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
@endsection