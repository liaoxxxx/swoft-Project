<?php declare(strict_types=1);

namespace App\Http\Controller\Index;



use App\Helper\AppProperty;
use App\Helper\FileOperator;
use App\Helper\HttpHeader;
use App\Helper\Response\JsonResponse;
use App\Model\Logic\GoodsCategoryLogic;
use App\Model\Logic\UploadLogic;
use ReflectionException;
use Swoft;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoft\Http\Message\Response;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Upload\UploadedFile;

/**
 * Class UploadController
 * @Controller(prefix="upload")
 * @package App\Http\Controller\Admin
 */
class UploadController
{


    /**
     * @RequestMapping(route="singleImage")
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function singleImage(Request $request,Response $response)//: Response
    {
        $file = $request->getUploadedFiles();
        $file=$file["file"];
        $resArr= UploadLogic::handleSingleImage($file);
        if ($resArr['status']){
            return  $response->withData(JsonResponse::Success($resArr['msg'],$resArr['data']));
        }else{
            return  $response->withData(JsonResponse::Error($resArr['msg'],$resArr['data']));
        }

    }
}
