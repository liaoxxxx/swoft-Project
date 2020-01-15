<?php declare(strict_types=1);


namespace App\Model\Logic\Goods;


use App\Model\Dao\Admin\AdminCacheStrategy;
use App\Model\Dao\Goods\GoodsCategoryDao;
use App\Model\Dao\Goods\GoodsDao;
use App\Model\Entity\Admin;
use App\Model\Entity\Goods;
use App\Model\Entity\GoodsCategory;
use ReflectionException;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;
use Swoft\Http\Message\Request;
use App\Helper\SqlTimeTool;
use App\Exception\Handler\HttpExceptionHandler;

class GoodsLogic
{
    private static array $map=['status'=>1];

    public function __construct()
    {

    }



    public static function list():array {
        return GoodsDao::list();
    }

    /**
     * 通过post提交的数据构建 商品分类 Entity实体
     * @param array $post
     * @return Goods
     * @throws DbException
     */
    public static function buildEntityByDto(array $post):Goods {
        $post['images']=self::serializeImages($post['images']);
        $goods=new Goods($post);
        $goods->setCreatedAt(SqlTimeTool::getMicroTime());
        $goods->setUpdatedAt(SqlTimeTool::getMicroTime());
        $goods->setIsDelete(0);

        return $goods;

    }


    /**
     * 保存商品分类
     * @param Goods $goods
     * @return bool
     */
    public static function save(Goods $goods):bool {
        return GoodsDao::save($goods);
    }


    public static function add(array $post): bool
    {
        $goodsEn =self::buildEntityByDto($post);
       return  self::save($goodsEn);
    }


    /**
     * @param int $id
     * @return array
     * @throws DbException
     */
    public static function findOne(int $id  )
    {
        return GoodsDao::find($id);

    }


    /**
     * 生成缓存的key
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



    /**
     * @param array $imageArr ||序列化前的数组
     * @return string  || 序列化后获得的  图片路径 文本
     */
    public  static function serializeImages ( array $imageArr):string {
        return serialize($imageArr);
    }

    /**
     * @param string $imageString  || 序列化的图片路径 文本
     * @return array  ||反序列化后获得的数组
     */
    public  static function unSerializeImages ( string $imageString):array {
        return unserialize($imageString);
    }

}
