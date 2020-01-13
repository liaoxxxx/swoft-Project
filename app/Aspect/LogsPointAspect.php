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
use Swoft\Log\Helper\CLog;
use Throwable;

/**
* the test of aspcet
*
* @Aspect()
*
* @PointBean(
*     include={AopBean::class},
* )
* @PointAnnotation(
*     include={
*      \App::class,
*      CachePut::class
*      }
*  )
* @PointExecution(
*     include={
*      "Swoft\Testing\Aop\RegBean::reg.*",
 *     "App\Http\Controller\HttpClientController::calss"
*     }
* )
*/

class LogsPointAspect
{
    /**
     * @Before()
     */
    public function before()
    {
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html","==============================",FILE_APPEND);
        var_dump(' before1 ');
    }

    /**
     * @After()
     */
    public function after()
    {
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html","==============================",FILE_APPEND);
        var_dump(' after1 ');
    }

    /**
     * @AfterReturning()
     * @param JoinPoint $joinPoint
     * @return string
     */
    public function afterReturn(JoinPoint $joinPoint)
    {
        $result = $joinPoint->getReturn();

        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html","==============================",FILE_APPEND);
        return $result . ' afterReturn1 ';
    }

    /**
     * @Around()
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @return mixed
     * @throws Throwable
     */
    public function around(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $this->test .= ' around-before1 ';
        $result = $proceedingJoinPoint->proceed();
        $this->test .= ' around-after1 ';
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html","==============================",FILE_APPEND);
        return $result . $this->test;
    }

    /**
     * @AfterThrowing()
     */
    public function afterThrowing()
    {
        file_put_contents("/www/wwwroot/swoft-my/runtime/liao.html","==============================",FILE_APPEND);
        echo "aop=1 afterThrowing !\n";
    }
}
