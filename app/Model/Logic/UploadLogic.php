<?php
namespace App\Model\Logic;

/*
 *
 */

use App\Helper\FileOperator;
use App\Helper\JsonResponse;
use App\Helper\SqlTimeTool;
use App\Model\Dao\UploadFileDao;
use App\Model\Entity\UploadFile;
use Dotenv\Regex\Error;
use phpDocumentor\Reflection\Types\Self_;

class UploadLogic{

    private static array   $IMAGE_TYPE=[
      "jpeg","jpg","gif","png"
    ];
    private static array   $DOC_TYPE=[
        "docx","doc","xls","xlss"
    ];


    private static function  transToProperty($CheckType){
        switch ($CheckType){
            case "IMAGE_TYPE":
                return self::$IMAGE_TYPE;
                break;
            case "DOC_TYPE":
                return self::$DOC_TYPE;
                break;
            default:
                return self::$IMAGE_TYPE;
        }
    }


    /**
     * 检测文件类型
     * @param $fileSuffixName
     * @param $checkType
     * @return bool
     */
    public static function checkFileType($fileSuffixName,$checkType):bool {
       return in_array($fileSuffixName,self::transToProperty($checkType));
    }


    public static function save2DB(string $path){
        $uploadFile=new UploadFile();
        $uploadFile->setPath($path);
        $uploadFile->setCreatedAt(SqlTimeTool::getMicroTime());
        $uploadFile->setUpdatedAt(SqlTimeTool::getMicroTime());
        UploadFileDao::save($uploadFile);
    }



    public static  function handleSingleImage($file){
        //检测文件类型
        if( !self::checkFileType((new FileOperator)->getFileSuffixName($file->getClientFilename()),"IMAGE_TYPE")){
            return ["status"=>0,'msg'=>"文件类型不符合要求"];
        }

        $newFileName=(new FileOperator)->getImageBasePath().time().mt_rand(100,999).".". (new \App\Helper\FileOperator)->getFileSuffixName($file->getClientFilename());
        $file->moveTo($newFileName);

        self::save2DB($newFileName);


        return ['msg'=>"文件上传成功",'data'=>['path',$newFileName],'status'=>1];
    }


}