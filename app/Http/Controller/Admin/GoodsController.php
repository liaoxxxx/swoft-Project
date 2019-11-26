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
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\View\Renderer;
use Throwable;

/**
 * Class HomeController
 * @Controller(prefix="/admin")
 */
class GoodsController extends BaseController
{


    /**
     * @RequestMapping(route="/admin/goods_list")
     * @param Request $request
     * @param Response $response
     * @return \Swoft\Http\Message\Response
     */
    public function list(Request $request,Response $response): Response
    {
        return $response->withContent("111");
    }



    /**
     * @RequestMapping(route="/admin/goods_add", method={RequestMethod::POST})
     * @param Request $request
     * @param Response $response
     * @return \Swoft\Http\Message\Response
     */
    public function goods_add(Request $request,Response $response):Response {
        $goodsName=$request->post('goodsName', 'default value');
        $goodsColor=$request->post('goodsName', 'default value');
        $goodsCategory=$request->post('goodsCategory', 'default value');
        $goodsTruePrice=$request->post('goodsTruePrice', 'default value');
        $goodsBasePrice=$request->post('goodsBasePrice', 'default value');
        $goodsName=$request->post('goodsName', 'default value');




        return $response->withContent("addd");
    }
}
