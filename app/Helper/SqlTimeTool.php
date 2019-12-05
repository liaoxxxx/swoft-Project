<?php declare(strict_types=1);
namespace App\Helper;
class SqlTimeTool{

    /**
     * 获取超长 的毫秒时间戳
     * @return int
     */
    public static function getMicroTime():int {
        return   intval( microtime(true)*1000);
    }




}








