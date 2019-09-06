<?php

namespace App\Http\Controllers;



use App\Http\Requests\SmsRequest;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    //
    //
    public function index(){


        return view('sms');
    }

    public function store(SmsRequest $request){
        $number="61".trim($request->number,0);

        //dd($number);
//        dd($request->message);

        $result= sendMessage($number,$request->message);

        session()->flash('success','Message Sent');

        return redirect(route('smsPage'));


    }


}


