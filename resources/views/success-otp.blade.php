@section('script-add')
    <link rel="stylesheet" href="{{ URL::asset('css/success-otp.css') }}">

    <title></title>

    <?php
        $json_string = json_encode($result, JSON_PRETTY_PRINT);
    ?>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container py-5 " >
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="tab-content pt-3 text-center">
                            <pre> {{ $json_string }} </pre>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection