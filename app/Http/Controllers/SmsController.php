<?php

namespace App\Http\Controllers;
use App\Http\Requests\SmsRequest;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(){
        return view('sms');
    }
    public function store(SmsRequest $request){

        $number="61".trim($request->number,0);


        if ($_ENV['ALIYUN_ASSESSKEY']==''||$_ENV['ALIYUN_ASSESSSECRET']==''){

            session()->flash('error','SMS sending system problem, Please contact web master with error code : ACK404');
            return redirect(route('smsPage'));
        }
        $result= sendMessage($number,$request->message);

        session()->flash('success','Message Sent');
        return redirect(route('smsPage'));

    }


}


