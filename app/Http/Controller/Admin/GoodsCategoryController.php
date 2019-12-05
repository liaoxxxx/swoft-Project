<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Helper\HttpHeader;
use App\Helper\JsonResponse;
use App\Model\Entity\GoodsCategory;
use App\Model\Logic\GoodsCategoryLogic;
use http\Exception;
use phpDocumentor\Reflection\Type;
use ReflectionException;
use Swoft;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;

/**
 * Class HomeController
 * @Controller(prefix="/admin_goods")
 */
class GoodsCategoryController extends BaseController
{


    /**
     * @RequestMapping(route="/admin_goods/category_list")
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function list(Request $request,Response $response): Response
    {

        $post=$request->post();


        $data = ['name'=>'Swoft2.0000'];


        $response=$response->withData($data)
            ->withHeader('Access-Control-Allow-Origin','http://localhost:8080');


        //var_dump($response);
        return $response;
    }


    /**
     * @RequestMapping(route="add_category")
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws Swoft\Db\Exception\DbException
     */
    public function addCategory(Request $request,Response $response): Response
    {

        $post=$request->post();
        $goodsCategory =GoodsCategoryLogic::buildEntityByDto($post);

        $saveRes= GoodsCategoryLogic::save($goodsCategory);
        if ($saveRes){
            $response= $response->withData(JsonResponse::Success("添加商品分类成功",$post));
        }
        else{
            $response= $response->withData(JsonResponse::Success("添加商品分类失败",$post));
        }

        return $response;
    }


    /**
     * @RequestMapping(route="get_all_category")
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws Swoft\Db\Exception\DbException
     */
    public function getAllCategory(Request $request,Response $response): Response
    {
        $goodsCategoryArray= GoodsCategory::where("status",1)
            ->get()
            ->toArray();
        //var_dump($goodsCategoryArray);
        return  $response->withData(JsonResponse::Success("获取分类成功",$goodsCategoryArray));

    }


    /**
     * @RequestMapping(route="get_category_by_id")
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws Swoft\Db\Exception\DbException
     */
    public function getCategoryById(Request $request,Response $response): Response
    {
        $id=$request->post("id",0);
        if ($id==0){
            $response->withData(JsonResponse::Success("错误的商品分类id",[]));
        }

        $categoryItem=GoodsCategoryLogic::findOne(intval($id));
        return $response->withData(JsonResponse::Success("商品分类{$id}获取成功",$categoryItem));

    }



    /**
     * @RequestMapping(route="edit_category")
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function editCategory(Request $request,Response $response): Response
    {
        $post=$request->post();
        $response->withData(JsonResponse::Success("错误的商品分类id",[]));
    }


}
