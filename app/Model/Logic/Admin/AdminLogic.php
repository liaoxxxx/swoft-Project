<?php declare(strict_types=1);


namespace App\Model\Logic;


use App\Helper\Response\JsonResponse;
use App\Model\Dao\Admin\AdminCacheStrategy;
use App\Model\Dao\Admin\AdminDao;
use App\Model\Entity\Admin;
use Swoft\Context\Context;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;
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
    public static function checkPassword( $admin,string $password):bool {

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
    public static function checkAdminStatus(Admin $admin): bool {
        if (intval($admin->getStatus())==1){
            return true;
        }
        return  false;

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

    public static function handleLogin(string $username,string $password, $httpResponse =null){
        if ($httpResponse==null){
            $httpResponse = Context::mustGet()->getResponse();
        }
       // 查找用户
       $admin= AdminDao::findByUsername($username);
       if ($admin==null){

           return $httpResponse->withData(JsonResponse::Error('用户不存在:admin  no exist') );
       }
       //判断密码
       $checkBool= self::checkPassword($admin,$password);
       if (!$checkBool){
           return $httpResponse->withData(JsonResponse::Error('密码错误:password no match',) );
       }

        $checkBool= self::checkAdminStatus($admin);
        if (!$checkBool){
            return $httpResponse->withData(JsonResponse::Error('管理员已经被禁用:Administrators have been disabled',) );
        }
       return  $httpResponse->withData(JsonResponse::Success('登陆成功',) );
    }


}
