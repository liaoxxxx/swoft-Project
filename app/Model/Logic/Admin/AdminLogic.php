<?php declare(strict_types=1);


namespace App\Model\Logic;


use App\Model\Dao\Admin\AdminCacheStrategy;
use App\Model\Entity\Admin;
use Swoft\Db\Eloquent\Collection;
use Swoft\Http\Message\Request;


class AdminLogic
{


    public function __construct()
    {

    }

    /**
     * 校验密码
     * @param Admin $admin
     * @param string $password
     * @return bool
     */
    public static function checkPassword(Admin $admin,string $password):bool {

        //var_dump($admin->getPassword());
        //var_dump(self::genPassword($admin->getSalt(), $password));
        if ($admin->getPassword()==  self::genPassword($admin->getSalt(), $password)) {
            return true;
        }
        else{
            return false;
        }

    }



    /** 校验admin 状态，权限等
     * @param $admin  Admin
     * @return string
     */
    public static function checkAdminStatus(Admin $admin): string {

            return  '1';

    }




    /** 生成密码
     *@param $salt string
     *@param $password string
     * @return string
     */
    public static function genPassword(string $salt,string $password):string {
        return md5($salt.$password);
    }

    /**
     * 保存 admin 的数据到  缓存系统
     * @param AdminCacheStrategy $adminCacheObject
     * @param string $key
     * @param array $adminData
     */
    public static function saveAdmin2Cache(AdminCacheStrategy $adminCacheObject, string $key, array $adminData){
        $adminCacheObject->save($key,$adminData);
    }


    /**
     * 通过缓存系统获取 admin的数据
     * @param AdminCacheStrategy $adminCacheObject
     * @param string $key
     * @return array
     */
    public static function getAdminByCache(AdminCacheStrategy $adminCacheObject, string $key):array {
        return $adminCacheObject->get($key);
    }


    /**
     * 生成缓存的key
     * @param Admin $admin
     * @return string
     */
    public static function genCacheKey(Admin $admin):string {
        return "admin".$admin->getId();
    }



}
