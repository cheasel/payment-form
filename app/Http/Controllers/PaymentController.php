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

        if ( DB::table('payment_info')->where('id', $id)->exists() || DB::table('payment_info')->where('tel', $tel)->exists() ) {
            return false;
        }

        $data = array('id'=>$id,"birthdate"=>$birthdate,"tel"=>$tel);
        $result = DB::table('payment_info')->insert($data);
        //dd($result);
        return $result;
    }
}
