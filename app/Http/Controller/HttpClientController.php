<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use Exception;
use Swlib\SaberGM;
use Swoft\Co;
use Swoft\Exception\SwoftException;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class RpcController
 *
 * @since 2.0
 *
 * @Controller("httpclient")
 */
class HttpClientController
{


    /**
     * @RequestMapping("get")
     *
     * @return void
     */
    public function get()
    {
        $url='https://www.baidu.com';
        $word="";
        /**
         * @var $resp
         */
        $resp=SaberGM::get($url.$word);
        $doc= $resp->getBody()->getContents();
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html",print_r($doc,true));
    }


}
