<?php


namespace App\Helper\Response;



class JsonResponse
{
    /**
     * @var array
     */
    private static array $message = [
        'msg' => "",
        'success' => 'success',
        'code' => 200,
        'data' => [],
        'status' => 1

    ];


    /**
     * @param string $message
     * @param array $data
     * @return array
     */
    public final static function Success(string $message='success',array $data=[]):array {
        self::$message['msg']=$message;
        self::$message['data']=$data;
        return self::$message;
    }


    /**
     * @param string $message
     * @param array $data
     * @return array
     */
    public final static function Error(string $message='error',array $data=[]):array {
        self::$message['msg']=$message;
        self::$message['data']=$data;
        self::$message['success']='error';
        self::$message['status']=0;
        return self::$message;
    }

}
