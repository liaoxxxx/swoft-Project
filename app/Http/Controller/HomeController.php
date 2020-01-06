<?php declare(strict_types=1);

namespace App\Http\Controller;

use ReflectionException;
use Swoft;
use Swoft\Bean\BeanFactory;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function context;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        /**
         * @var Swoft\Crontab\Crontab $crontab
         */
        //$crontab = BeanFactory::getBean("crontab");
        //$crontab->execute("DemoTask","secondTask");
        //var_dump($crontab);
        /** @var Renderer $renderer */
        Swoft\Log\Helper\CLog::info("开始时间-----".microtime(true));
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
        Swoft\Log\Helper\CLog::info("结束时间-----".microtime(true));

        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/index');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/hi")
     *
     * @return Response
     * @throws SwoftException
     */
    public function hi(): Response
    {
        return context()->getResponse()->withContent('hi');
    }

    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     * @throws SwoftException
     */
    public function hello(string $name): Response
    {
        return context()->getResponse()->withContent('Hello' . ($name === '' ? '' : ", {$name}"));
    }
}
