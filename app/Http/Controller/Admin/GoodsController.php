<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Helper\LogTool;
use App\Helper\Response\JsonResponse;
use App\Model\Entity\Goods;
use App\Model\Logic\GoodsLogic;
use Swoft\Db\Exception\DbException;
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
     * @RequestMapping(route="goods_list")
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function list(Request $request,Response $response): Response
    {
        $list=GoodsLogic::list();
        return $response->withData(JsonResponse::Success('商品列表',$list));
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


    /**
     * @RequestMapping(route="findone,method={RequestMethod::GET}")
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function  findOne(Request $request,Response $response):Response{

        $goodsItem=[];
        //$goodsItem= GoodsLogic::findOne((int)$id);
        return $response->withData(JsonResponse::Success('商品添加失败',$goodsItem));
    }



    /**
     * @RequestMapping(route="edit_goods", method={RequestMethod::POST})
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function edit(Request $request,Response $response):Response {
        $post=$request->post();
        $res=GoodsLogic::save($post);

        if ($res){
            return $response->withData(JsonResponse::Success('商品添加成功'));
        }
        else{
            return $response->withData(JsonResponse::Error('商品添加失败'));
        }

    }
}
