<?php declare(strict_types=1);

namespace App\Http\Controller\Index;



use App\Helper\AppProperty;
use App\Helper\FileOperator;
use App\Helper\HttpHeader;
use App\Helper\JsonResponse;
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
     */
    public function login(Request $request,Response $response)//: Response
    {
        $file = $request->getUploadedFiles();
        $file=$file["file"];

        if( UploadLogic::checkFileType(FileOperator::getFileSuffixName($file->getClientFilename()),"IMAGE_TYPE")){
            echo 888;
        }
        else{
            echo "error";
        }
        $newFileName=time().mt_rand(100,999).".".FileOperator::getFileSuffixName($file->getClientFilename());;
        $file->moveTo(FileOperator::getImageBasePath().$newFileName);
    }





}
