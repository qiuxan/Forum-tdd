<?php

namespace App\Http\Controllers;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    //
    //
    public function index(){


        return view('sms');
    }

    public function store(Request $request){

//        dd($request->number);
//        dd($request->content);



        AlibabaCloud::accessKeyClient($_ENV['ALIYUN_ASSESSKEY'], $_ENV['ALIYUN_ASSESSSECRET'])
            ->regionId('ap-southeast-1')
            ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                ->product('sms-intl')
                // ->scheme('https') // https | http
                ->version('2018-05-01')
                ->action('SendMessageToGlobe')
                ->method('POST')
                ->host('sms-intl.ap-southeast-1.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "ap-southeast-1",
                        'To' => "61467239975",
                        'From' => "CompanyName",
                        'Message' => "hello",
                    ],
                ])
                ->request();
            print_r($result->toArray());
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }


        return 'store function';
    }
}
