<?php


namespace App\Helper;

use Swoft\Http\Message\Response;
use Swoft\Http\Message\Concern\MessageTrait;

class HttpHeader
{
    /**
     * @param Response $response
     * @param string $origin
     * @return Response
     */
    public static function crossOrigin(Response $response,string $origin="http://localhost:9527")
    {

        return $response->withHeader('Access-Control-Allow-Origin', $origin?? '*' )
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

}
