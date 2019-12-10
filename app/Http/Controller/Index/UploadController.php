<?php declare(strict_types=1);

namespace App\Http\Controller\Index;



use App\Helper\HttpHeader;
use App\Helper\JsonResponse;
use App\Model\Logic\GoodsCategoryLogic;
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
     */
    public function login(Request $request,Response $response)//: Response
    {
        $file = $request->getUploadedFiles();
        $file=$file["file"];

        var_dump($file->getSize());
        var_dump($path = \Swoft::getAlias('@app'));
//        $file['']

    }





}
