<?php


namespace App\Helper;


class JsonResponse
{
    /**
     * @var array
     */
    private  static $message=[
        'msg'=>"",
        'success'=>1,
        'code'=>200,
        'data'=>[],
    ];

    /**
     * @return array
     */
    public static function getMessage(): array
    {
        return self::$message;
    }

    /**
     * @param array $data
     * @param string $message
     * @return string
     */
    public final static function Success(string $message='success',array $data=[]):string {
        self::$message['msg']=$message;
        self::$message['data']=$data;
        return json_encode(self::$message);
    }


    /**
     * @param array $data
     * @param string $message
     * @return string
     */
    public final static function Error(string $message='error',array $data=[]):string {
        self::$message['msg']=$message;
        self::$message['data']=$data;
        self::$message['success']='0';
        return json_encode(self::$message);
    }

}
