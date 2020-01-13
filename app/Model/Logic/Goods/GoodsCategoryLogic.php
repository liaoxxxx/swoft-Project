<?php declare(strict_types=1);


namespace App\Model\Logic;


use App\Model\Dao\Admin\AdminCacheStrategy;
use App\Model\Dao\Goods\GoodsCategoryDao;
use App\Model\Entity\Admin;
use App\Model\Entity\GoodsCategory;
use ReflectionException;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;
use Swoft\Http\Message\Request;
use App\Helper\SqlTimeTool;
use App\Exception\Handler\HttpExceptionHandler;

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
     * 编辑商品分类
     * @param array $post
     * @return bool
     * @throws DbException
     * @throws ReflectionException
     * @throws ContainerException
     */
    public  function edit(array $post ):bool {
      $Category = $this->editBuild($post);
      return $Category->save();
    }


    public  function editBuild(array $post):GoodsCategory {
        $cateGoryItem= GoodsCategoryDao::findOne( $post['id']);

        $cateGoryItem->setCateName($post['cateName']);
        $cateGoryItem->setSummary($post['summary']);
        $cateGoryItem->setParentId($post['parentId']);
        $cateGoryItem->setStatus($post['status']);
        $cateGoryItem->setUpdatedAt(SqlTimeTool::getMicroTime());
        return $cateGoryItem;
    }



}
