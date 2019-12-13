<?php


namespace App\Helper;


class FileOperator
{
    public static function getImageBasePath(){
        $imageBasePath= \Swoft::getAlias("@base")."/public/upload/image/".date("Ym")."/".date("d")."/";
        if(!is_dir($imageBasePath)){
            mkdir($imageBasePath,0755,true);
        }
        return $imageBasePath;
    }


    public static function getFileSuffixName($fileName,$trimStr='.'):string {
        $b=explode($trimStr,$fileName);
        return $b[count($b)-1];
    }

}