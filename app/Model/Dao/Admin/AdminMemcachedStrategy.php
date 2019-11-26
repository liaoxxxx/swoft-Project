<?php


namespace App\Model\Dao\Admin;


use Swoft\Redis\Redis;

class AdminMemcachedStrategy implements AdminCacheStrategy
{

    public static $memcached ;


    public function __construct()
    {
        self::$memcached=new Redis();
    }

    /**
     * @param string $key
     * @param array $adminData
     */
    function save(string $key, array $adminData)
    {
        self::$memcached::hMSet($key,$adminData);
    }

    /**
     * @param string $key
     * @return array
     */
    function get(string $key): array
    {
        // TODO: Implement get() method.
        return self::$memcached::hGetAll($key);
    }
}
