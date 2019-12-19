<?php


namespace App\Helper;


use phpDocumentor\Reflection\Types\Self_;

class FileOperator
{
    public function __construct()
    {
        $this->UploadImageBasePath=\Swoft::getAlias("@base")."/public/upload/image/".date("Ym")."/".date("d")."/";
    }


    public string $UploadImageBasePath;





    public  function getImageBasePath(){
        if(!is_dir($this-> UploadImageBasePath)){
            mkdir($this->UploadImageBasePath,0755,true);
        }
        return $this->UploadImageBasePath;
    }


    public  function getFileSuffixName($fileName,$trimStr='.'):string {
        $b=explode($trimStr,$fileName);
        return $b[count($b)-1];
    }

}