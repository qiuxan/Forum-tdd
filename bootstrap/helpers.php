<?php
/**
 * Created by PhpStorm.
 * User: xianqiu
 * Date: 7/9/19
 * Time: 3:33 AM
 */

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;


function sendMessage($number,$content){



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
                    'To' => $number,
                    'From' => $_ENV['APP_NAME'],
                    'Message' => $content
                ],
            ])
            ->request();
//            print_r($result->toArray());

        return $result->toArray();
    }


    catch (ClientException $e) {
//            echo $e->getErrorMessage() . PHP_EOL;
//            session()->flash('success','Wrong');
    } catch (ServerException $e) {
        echo $e->getErrorMessage() . PHP_EOL;
        session()->flash('error','SMS sending system problem, Please contact web master with error code : AKP404');

    }





}