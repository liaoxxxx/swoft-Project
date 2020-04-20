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
use Swoft\Http\Session\HttpSession;
use Swoft\View\Renderer;
use Throwable;

/**
 * Class HomeController
 * @Controller(prefix="/admin")
 */
class AdminController extends BaseController
{


    /**
     * @RequestMapping(route="login")
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws Throwable
     */
    public function login(Request $request,Response $response): Response
    {
        $name= HttpSession::current()->set("name","liaoxxxxx");
        var_dump( HttpSession::current()->get("name"));
        $post=$request->post();


        $data = ['name'=>'Swoft2.0'];



        $response=$response->withData($data)
            ->withHeader('Access-Control-Allow-Origin','http://localhost:8080');
        //\Swoft::getBean('renderer')->rander('admin/login');
        //var_dump($response);
        $content=file_get_contents( '@resources/views/admin/login.php');
        return $response->withContent();
        //return view('admin/login',[],'');
    }


    /**
     * @RequestMapping(route="logout")
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws Throwable
     */
    public function logout(Request $request,Response $response): Response
    {
        var_dump(111);
        $name= HttpSession::current()->set("name","liaoxxxxx");
        var_dump( HttpSession::current()->get("name"));
        $post=$request->post();


        $data = ['name'=>'Swoft2.0'];



        $response=$response->withData($data)
            ->withHeader('Access-Control-Allow-Origin','http://localhost:8080');


        //var_dump($response);
        //return $response;
        return view('admin/login',[],false);
    }
}
