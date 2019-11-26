<?php declare(strict_types=1);


namespace App\Model\Logic;


use App\Model\Dao\Admin\AdminCacheStrategy;
use App\Model\Dao\Goods\GoodsCategoryDao;
use App\Model\Entity\Admin;
use App\Model\Entity\GoodsCategory;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;
use Swoft\Http\Message\Request;
use App\Helper\SqlTimeTool;


class GoodsCategoryLogic
{


    public function __construct()
    {

    }


    /**
     * 通过post提交的数据构建 商品分类 Entity实体
     * @param array $post
     * @return GoodsCategory
     * @throws DbException
     */
    public static function buildEntityByDto(array $post):GoodsCategory {
        $goodsCategory=new GoodsCategory($post);


        $goodsCategory->setCreatedAt(SqlTimeTool::getMicroTime());
        $goodsCategory->setUpdatedAt(SqlTimeTool::getMicroTime());
        $goodsCategory->setIsDelete(0);

        return $goodsCategory;

    }


    /**
     * 保存商品分类
     * @param GoodsCategory $goodsCategory
     * @return bool
     */
    public static function save(GoodsCategory $goodsCategory) {
        $goodsCategory->save();
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
