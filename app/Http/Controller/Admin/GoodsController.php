<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Model\Entity\Goods;
use App\Model\Logic\GoodsLogic;
use ReflectionException;
use Swoft;
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
 * @Controller(prefix="/admin_goods")
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
     * @RequestMapping(route="add_goods", method={RequestMethod::POST})
     * @param Request $request
     * @param Response $response
     * @return \Swoft\Http\Message\Response
     * @throws ReflectionException
     * @throws Swoft\Bean\Exception\ContainerException
     * @throws Swoft\Db\Exception\DbException
     */
    public function add_goods(Request $request,Response $response):Response {
        $post=$request->post();
        $goodsEn=GoodsLogic::buildEntityByDto($post);





        $goodsEn->save();
        return $response->withContent("addd");
    }
}
