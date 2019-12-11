<?php


namespace App\Helper;


class FileOperator
{
    public static function getImageBasePath(){
        $imageBasePath= \Swoft::getAlias("@base")."/public/upload/image/".date("Ym")."/".date("d")."/";
        if(!is_dir($imageBasePath)){
            var_dump( mkdir($imageBasePath,0755,true));
        }
        return $imageBasePath;
    }

}