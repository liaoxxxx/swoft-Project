<?php


namespace App\Helper;


class AppProperty
{
    public static function getImageBasePath(){
        //$suffix="/public/upload/image/".date("Ymd")."/";
        $imageBasePath= \Swoft::getAlias("@base")."/public/upload/image/".date("Ym")."/";
        if(!is_dir($imageBasePath)){
           var_dump( mkdir($imageBasePath,0755,true));
        }
        return $imageBasePath;
    }

}