<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Helper\LogTool;
use App\Helper\Response\JsonResponse;
use App\Model\Entity\Goods;
use App\Model\Logic\GoodsLogic;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
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
     * @RequestMapping(route="list")
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function list(Request $request,Response $response): Response
    {
        echo (new LogTool())->basePath;
        return $response->withContent("111");
    }


    /**
     * @RequestMapping(route="add_goods", method={RequestMethod::POST})
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function add_goods(Request $request,Response $response):Response {
        $post=$request->post();
        $res=GoodsLogic::add($post);

        if ($res){
            return $response->withData(JsonResponse::Success('商品添加成功'));
        }
        else{
            return $response->withData(JsonResponse::Error('商品添加失败'));
        }

    }
}
