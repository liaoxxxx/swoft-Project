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
    private static array $map=['status'=>1];

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
    public static function save(GoodsCategory $goodsCategory):bool {

      return GoodsCategoryDao::save($goodsCategory);
    }


    /**
     * @param int $id
     * @return array
     * @throws DbException
     */
    public static function findOne(int $id  ): array
    {
         $cateGoryItem= GoodsCategoryDao::findOne($id);
           return $cateGoryItem->toArray();
    }


    /**
     * 生成缓存的key
     * @param array $post
     * @return string
     */
    public static function edit(array $post):string {
    }



}
