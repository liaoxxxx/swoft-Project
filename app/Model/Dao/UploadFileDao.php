<?php


namespace App\Model\Dao;


use App\Model\Entity\UploadFile;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Exception\DbException;

class UploadFileDao
{
    public static function save(UploadFile $uploadFile){
        try {
            $uploadFile->save();
        } catch (\ReflectionException $e) {
        } catch (ContainerException $e) {
        } catch (DbException $e) {
        }
    }

    public static function insertGetId(UploadFile $uploadFile){
        try {
            $uploadFile->ins();
        } catch (\ReflectionException $e) {
        } catch (ContainerException $e) {
        } catch (DbException $e) {
        }
    }

}