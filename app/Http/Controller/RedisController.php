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

use RuntimeException;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Log\Helper\CLog;
use Swoft\Redis\Exception\RedisException;
use Swoft\Redis\Pool;
use Swoft\Redis\Redis;
use function sgo;

/**
 * Class RedisController
 *
 * @since 2.0
 * @Controller("redis")
 */
class RedisController
{
    /**
     * @Inject()
     *
     * @var Pool
     */
    private $redis;

    /**
     * @RequestMapping("poolSet")
     */
    public function poolSet(): array
    {
        $key   = 'key';
        $value = uniqid();

        $this->redis->set($key, $value);

        $get = $this->redis->get($key);

        $isError = $this->redis->call(function (\Redis $redis) {
            $redis->eval('returnxxxx 1');

            return $redis->getLastError();
        });

        return [$get, $value, $isError];
    }

    /**
     * @RequestMapping()
     */
    public function set(): array
    {
        $key   = 'key';
        $value = uniqid();

        $this->redis->zAdd($key, [
            'add'    => 11.1,
            'score2' => 11.1,
            'score3' => 11.21
        ]);

        $get = $this->redis->sMembers($key);

        return [$get, $value];
    }

    /**
     * @RequestMapping("str")
     */
    public function str(): array
    {
        $key    = 'key';
        $result = Redis::set($key, 'key');

        $keyVal = Redis::get($key);

        $isError = Redis::call(function (\Redis $redis) {
            $redis->eval('return 1');

            return $redis->getLastError();
        });

        $data = [
            $result,
            $keyVal,
            $isError
        ];

        return $data;
    }

    /**
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("release")
     *
     * @return array
     * @throws RedisException
     */
    public function release(): array
    {
        sgo(function () {
            Redis::connection();
        });

        Redis::connection();

        return ['release'];
    }

    /**
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("ep")
     *
     * @return array
     */
    public function exPipeline(): array
    {
        sgo(function () {
            Redis::pipeline(function () {
                CLog::info("开始时间 ".microtime(true));
                for ($i = 0; $i <= 100000; $i++) {
                    $name=  Redis::set("name".$i, "liaoxxx");
                    $age=  Redis::set("age".$i, "18");
                }
                CLog::info("开始时间 ".microtime(true));            });
        });


        return ['exPipeline'];
    }

    /**
     * 使用事物批量添加
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("et")
     *
     * @return array
     */
    public function exTransaction(): array
    {
        sgo(function () {
            Redis::transaction(function () {
                CLog::info("开始时间 ".microtime(true));
                for ($i = 0; $i <= 100000; $i++) {
                  $name=  Redis::set("name".$i, "liaoxxx");
                  $age=  Redis::set("age".$i, "18");
                }
                CLog::info("开始时间 ".microtime(true));

            });
        });
        //2020/01/10-16:17:22 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(155) 开始时间 1578644242.3376
        //2020/01/10-16:17:34 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(160) 开始时间 1578644254.9984

        return ['exPipeline'];
    }


    /**
     *
     * 使用事物批量删除
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("et2")
     *
     * @return array
     */
    public function exTransaction2(): array
    {
        sgo(function () {
            Redis::transaction(function () {
                CLog::info("开始时间 ".microtime(true));
                for ($i = 0; $i <= 100000; $i++) {
                    $name=  Redis::del("name".$i);
                    $age=  Redis::del("age".$i);
                }
                CLog::info("开始时间 ".microtime(true));

            });
        });

        //2020/01/10-16:13:45 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(181) 开始时间 1578644025.4906
        //2020/01/10-16:13:58 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(186) 开始时间 1578644038.8169

        return ['exPipeline'];
    }



    /**
     * 未使用事物批量添加
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("net1")
     *
     * @return array
     */
    public function noExTransaction(): array
    {
        sgo(function () {

            CLog::info("开始时间 " . microtime(true));
            for ($i = 0; $i <= 100000; $i++) {
                $name = Redis::set("name" . $i, "liaoxxx");
                $age = Redis::set("age" . $i, "18");
            }
            CLog::info("开始时间 " . microtime(true));
        });
        //2020/01/10-16:19:59 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(215) 开始时间 1578644399.5742
        //2020/01/10-16:20:11 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(220) 开始时间 1578644411.9251

        return ['exPipeline'];
    }

    /**
     *
     * 使用事物批量删除
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("net2")
     *
     * @return array
     */
    public function NoExTransaction2(): array
    {
        sgo(function () {

            CLog::info("开始时间 ".microtime(true));
            for ($i = 0; $i <= 100000; $i++) {
                $name=  Redis::del("name".$i);
                $age=  Redis::del("age".$i);
            }
            CLog::info("开始时间 ".microtime(true));

        });

        //2020/01/10-16:21:00 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(241) 开始时间 1578644460.2365
        //2020/01/10-16:21:12 [INFO] App\Http\Controller\RedisController:App\Http\Controller\{closure}(246) 开始时间 1578644472.3618

        return ['exPipeline'];
    }


    /**
     *
     * 使用事物批量删除
     * Only to use test. The wrong way to use it
     *
     * @RequestMapping("pub")
     *
     * @return void
     */
    public function publish(){
       $res= Redis::publish('chan_1', 'Hello, World!');
       Clog::info((string)$res);
    }

}
