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

        //// Checking data exist ////
        if ( DB::table('payment_info')->where('id', $id)->exists() ) {
            return back()->withErrors(['msg' => 'เลขบัตรประชาชนซ้ำ']);
        }elseif ( DB::table('payment_info')->where('tel', $tel)->exists() ) {
            return back()->withErrors(['msg' => 'หมายเลขโทรศัพท์ซ้ำ']);
        }

        //// Insert data ////
        $data = array('id'=>$id, "birthdate"=>$birthdate, "tel"=>$tel);
        $result = DB::table('payment_info')->insert($data);

        return view("otp", ["phone"=>$tel]);
    }

    public function otp(Request $request){
        $tel = $request->phone;
        $result = DB::table('payment_info')->select('api_refresh', 'devices', 'tel')->where('tel', $tel)->get();
        
        return view("success-otp", ["result" => $result]);
    }
}
