<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Helper\HttpHeader;
use App\Helper\JsonResponse;
use App\Model\Entity\GoodsCategory;
use App\Model\Logic\GoodsCategoryLogic;
use http\Exception;
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
        GoodsCategoryLogic::save($goodsCategory);




        //$data = ['name'=>'Swoft2.0000'];

        //$response=HttpHeader::crossOrigin($response);
        $response= $response->withData(JsonResponse::Success("登陆成功",$post));
        return $response;
    }


    /**
     * @RequestMapping(route="/admin_goods/getAllCategory")
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getAllCategory(Request $request,Response $response): Response
    {

        $post=$request->post();


        $data = ['name'=>'Swoft2.0000'];

        //$response=HttpHeader::crossOrigin($response);
        $response= $response->withData(JsonResponse::Success("登陆成功",$data));
        return $response;
    }






}
