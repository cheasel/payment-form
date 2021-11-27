<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request){
        $id = $request->idcard;
        $birthdate = $request->birthdate;
        $tel = $request->phone;

        if ( DB::table('payment_info')->where('id', $id)->exists() ) {
            return back()->withErrors(['msg' => 'เลขบัตรประชาชนซ้ำ']);
        }elseif ( DB::table('payment_info')->where('tel', $tel)->exists() ) {
            return back()->withErrors(['msg' => 'หมายเลขโทรศัพท์ซ้ำ']);
        }

        $data = array('id'=>$id,"birthdate"=>$birthdate,"tel"=>$tel);
        $result = DB::table('payment_info')->insert($data);
        //dd($result);
        return view("otp", ["phone"=>$tel]);
    }

    public function otp(Request $request){
        $tel = $request->phone;
        $result = [
            "deviceid" => "0ed2cb7f-6727-4e55-bda7-8c122526d253",
            "phone"=> "+66 (934) 577-2772",
            "devices"=> [
                [
                    "id"=> "7044afcc-0397-46aa-b529-30a8eaf81914",
                    "name"=> "iPhone XR"
                ],
                [
                    "id"=> "6dbae88f-6560-489c-abba-ede69f8666d7",
                    "name"=> "Google Pixel 3XL"
                ],
                [
                    "id"=> "e3443692-0e3a-457d-839d-4d3a1abb0411",
                    "name"=> "iPhone 13 Pro Max"
                ]
            ]
        ];
        
        return view("success-otp", ["result"=>$result]);
    }
}
