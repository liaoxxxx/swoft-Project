<?php
namespace App\Model\Logic;

/*
 *
 */

use phpDocumentor\Reflection\Types\Self_;

class UploadLogic{

    private static array   $IMAGE_TYPE=[
      "jpeg","jpg","gif","png"
    ];
    private static array   $DOC_TYPE=[
        "docx","doc","xls","xlss"
    ];


    private  function  transToProperty($CheckType){
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



    public static function checkFileType($fileSuffixName,$selfType){
       return in_array($fileSuffixName,self::$CheckType);
    }



}