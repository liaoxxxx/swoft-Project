<?php declare(strict_types=1);


namespace App\Model\Dao\Goods;


use App\Model\Entity\GoodsCategory;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;

class GoodsCategoryDao
{
    private static array $map=['status'=>1];

    /**
     * @param GoodsCategory $goodsCategory
     * @return bool
     */
    public static function save(GoodsCategory $goodsCategory):bool{
        try {
            return $goodsCategory->save();
        } catch (\ReflectionException $e) {
            //var_dump($e);
        } catch (ContainerException $e) {
            //var_dump($e);
        } catch (DbException $e) {
            //var_dump($e);
        }
        return  false;
    }

    public static function findOne(int $id  ):GoodsCategory
    {
        return  GoodsCategory::where(self::$map)->find($id);
    }

    public static function edit(){

    }

}
