
@extends('layouts.app')

@section('script-add')
    <link rel="stylesheet" href="{{ URL::asset('css/form.css') }}">
    <script src="{{ URL::asset('js/form.js') }}"></script>

    <title></title>
@endsection

@section('content')
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
                                ลงทะเบียนข้อมูลไม่สำเร็จ
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
                                        <input type="text" id="id" name="id" placeholder="หมายเลขบัตร" maxlength="13" required class="form-control @error('id') is-invalid @enderror" required> 
                                        <span id="id_error" class="error"></span>
                                    </div>
                                    <div class="form-group"> 
                                        <label for="birthdate">
                                            <h6>ปีเกิด</h6>
                                        </label>
                                        <div class="input-group"> 
                                            <input type="date" id="birthdate" name="birthdate" placeholder="" class="form-control @error('birthdate') is-invalid @enderror" required>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <label for="phone">
                                            <h6>เบอร์โทร</h6>
                                        </label> 
                                        <input type="text" id="tel" name="tel" placeholder="เบอร์โทร" maxlength="10" required class="form-control @error('tel') is-invalid @enderror" required> 
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

@endsection