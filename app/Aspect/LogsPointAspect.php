<?php

namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointAnnotation;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Point\ProceedingJoinPoint;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Log\Helper\CLog;
use Throwable;
use App\Model\Logic\Order\OrderLogic;

/**
* the test of aspect
*
* @Aspect(order=1)
*
 * @PointBean(
 *     include={OrderLogic::class},
 * )
*/

class LogsPointAspect
{

    /**
     * @AfterReturning()
     * @param JoinPoint $joinPoint
     * @return mixed
     */
    public function afterReturn(JoinPoint $joinPoint)
    {

        //$result = $joinPoint->getReturn();
        /**
         * @var Request $request
         */
        $request =$joinPoint->getArgs()[0];
        $header= $request->getHeaders();
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html",print_r($header ,true),FILE_APPEND);
        CLog::info( "afterReturn");
        //var_dump(get_class( ));
        return $joinPoint->getReturn() ;
    }





    /**
     * @Around()
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @throws Throwable
     */
    /*public function around(ProceedingJoinPoint $proceedingJoinPoint)
    {
        //$this->test .= ' around-before1 ';
        //$result = $proceedingJoinPoint->proceed();
        //$this->test .= ' around-after1 ';
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html"," around ==============================\r\n",FILE_APPEND);
        //return $result . $this->test;
    }*/

}
