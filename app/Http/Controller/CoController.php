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
use Swoft;
use Swoft\Co;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Log\Helper\CLog;
use Swoft\Redis\Redis;
use Swoft\View\Renderer;
use Swoole\Coroutine\Http\Client;
use Throwable;
use function random_int;

/**
 * Class CoController
 *
 * @since 2.0
 *
 * @Controller("coroutine")
 */
class CoController
{
    /**
     * @RequestMapping()
     *
     * @return array
     *
     * @throws Exception
     */
    public function multi(): array
    {
        $requests = [
            'addUser' => [$this, 'addUser'],
            'getUser' => "App\Http\Controller\CoController::getUser",
            'curl'    => function () {
                $cli = new Client('127.0.0.1', 18306);
                $cli->get('/redis/str');
                $result = $cli->body;
                $cli->close();

                return $result;
            }
        ];

        return Co::multi($requests);
    }

    /**
     * @return array
     */
    public static function getUser(): array
    {
        $result = Redis::set('key', 'value');

        return [$result, Redis::get('key')];
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function addUser(): array
    {
        $user = User::new();
        $user->setAge(random_int(1, 100));
        $user->setUserDesc('desc');

        // Save result
        $result = $user->save();

        return [$result, $user->getId()];
    }


    /**
     * @RequestMapping("test1")
     * @return Swoft\Http\Message\Response|Swoft\Rpc\Server\Response
     * @throws Throwable
     */
    public  function test1(){

        /**
         * @var Swoft\Crontab\Crontab $crontab
         */

        /** @var Renderer $renderer */
        CLog::info("开始时间-----".microtime(true));
        sgo( function (){
            $path=Swoft::getAlias("@runtime");
            for ($i=0;$i<=100000;$i++){
                file_put_contents($path.'/a.txt',"-----------------\r\n",FILE_APPEND);
            }
        });
        sgo( function (){
            $path=Swoft::getAlias("@runtime");
            for ($i=0;$i<=100000;$i++){
                file_put_contents($path.'/b.txt',"-----------------\r\n",FILE_APPEND);
            }
        });
        sgo( function (){
            $path=Swoft::getAlias("@runtime");
            for ($i=0;$i<=100000;$i++){
                file_put_contents($path.'/c.txt',"-----------------\r\n",FILE_APPEND);
            }
        });
        CLog::info("结束时间-----".microtime(true));

        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/index');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }


    /**
     * @RequestMapping("test2")
     * @return void
     */
    public  function test2 (){
       $cid= Co::create(function (){
            CLog::info("Co::create 协程 cid测试");
       });
       CLog::info("Co::create 获取到的 cid 是 ".$cid);

        $cid= sgo(function (){
            CLog::info(" sgo() 协程 cid测试");
        });
        CLog::info("sgo() 获取到的 cid 是 ".$cid);

        $tid = Co::tid();
        CLog::info("top 协程id 是 ".$tid);
    }

    /**
     * @RequestMapping("test3")
     * @return Swoft\Http\Message\Response|Swoft\Rpc\Server\Response
     */
    public  function test3 (){
        CLog::info("已经在协程模式中 协程id 为：".(string)Co::id());
        CLog::info("开始时间 ".microtime(true));
        $runRes= srun(function (){
            $path=Swoft::getAlias("@runtime");
            for ($i=0;$i<=100000;$i++){
                file_put_contents($path."/coroutine_test3.log","");
            }

        });
        CLog::info("结束时间 ".microtime(true));
        CLog::info("运行结果  ：  ".(string)$runRes);

        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/index');
        if ($runRes){
            CLog::info("渲染时间 ： ".microtime(true));
            return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
        }
        else{

            CLog::info("srun 失败 ： ".microtime(true));
            return    context()->getResponse()->withData("srun 失败");
        }

    }
}
