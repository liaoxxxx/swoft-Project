<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use ReflectionException;
use Swoft;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;

/**
 * Class HomeController
 * @Controller(prefix="/admin")
 */
class AdminController extends BaseController
{


    /**
     * @RequestMapping(route="/admin/index")
     * @param Request $request
     * @param Response $response
     * @return \Swoft\Http\Message\Response
     */
    public function login(Request $request,Response $response): Response
    {

        $post=$request->post();


        $data = ['name'=>'Swoft2.0'];



        $response=$response->withData($data)
            ->withHeader('Access-Control-Allow-Origin','http://localhost:8080');


        //var_dump($response);
        return $response;
    }
}
