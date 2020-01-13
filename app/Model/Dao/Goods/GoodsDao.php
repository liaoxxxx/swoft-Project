<?php declare(strict_types=1);


namespace App\Model\Dao\Goods;


use App\Model\Entity\Admin;
use App\Model\Entity\Goods;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;

class GoodsDao
{

    public static array $map=[
        'status'=>1,
        'is_delete'=>0
        ];


    /**
     * @param string $userName
     * @return Admin
     * @throws DbException
     */
    public static function findByUsername(string $userName): Admin
    {
        $admin=new Admin();
        try {
            $admin= Admin::where('username', $userName)->firstOr( );
        }
        catch (\ReflectionException $e) {
            //var_dump($e);
        }
        catch (ContainerException $e) {
            //var_dump($e);
        }
        catch (DbException $e) {
            //var_dump($e);
        }
        //var_dump($admin);
        return  $admin;
    }


    public static function save(Goods $goods):bool {

        //$goods->setImages("2222");
        try {
            return $goods->save();
        } catch (\ReflectionException $e) {
            $e->getMessage();
            return false;
        } catch (ContainerException $e) {
            return false;
        } catch (DbException $e) {
            return false;
        }
    }


    public static function list(): array
    {
        return Goods::where(self::$map)->get()->toArray();
    }

    public static function find($id)
    {
        try {
          return Goods::find($id)->toArray();

        } catch (DbException $e) {
            return new Goods();
        }
    }
}
