<?php


namespace App\Model\Dao\Admin;


use Swoft\Redis\Redis;

class AdminRedisStrategy implements AdminCacheStrategy
{

    public static $redis ;


    public function __construct()
    {
        self::$redis=new Redis();
    }

    /**
     * @param string $key
     * @param array $adminData
     */
    function save(string $key, array $adminData)
    {
        self::$redis::hMSet($key,$adminData);
    }

    /**
     * @param string $key
     * @return array
     */
    function get(string $key): array
    {

        return self::$redis::hGetAll($key);
    }
}
