<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public $encr;

    public function construct(){
        $this->encr = new EncryptController();
    }

    public function encrypt(){
        

        dd($this->encr);

    }

    public function store(Request $request){
        $id = $request->id;
        $birthdate = $request->birthdate;
        $tel = $request->tel;

        $request->validate([
            'id' => 'required|unique:payment_info',
            'birthdate' => 'required',
            'tel' => 'required|unique:payment_info',
        ]);

        //// Checking data exist ////
        if ( DB::table('payment_info')->where('id', $id)->exists() ) {
            return back()->withErrors(['msg' => 'เลขบัตรประชาชนซ้ำ']);
        }elseif ( DB::table('payment_info')->where('tel', $tel)->exists() ) {
            return back()->withErrors(['msg' => 'หมายเลขโทรศัพท์ซ้ำ']);
        }

        //// Insert data ////
        $data = array('id'=>$id, "birthdate"=>$birthdate, "tel"=>$tel);
        $result = DB::table('payment_info')->insert($data);

        return view("otp");
    }

    public function otp(Request $request){
        
        return view("pin");
    }

    public function pin(){
        $result = [
            "deviceid" => "0ed2cb7f-6727-4e55-bda7-8c122526d253",
            "phone" => "+66 (934) 577-2772",
            "devices" => [
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
        
        return view("success-otp", ["result" => $result]);
    }
}
