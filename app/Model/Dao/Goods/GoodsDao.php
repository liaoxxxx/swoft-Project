<?php declare(strict_types=1);


namespace App\Model\Dao\Goods;


use App\Model\Entity\Admin;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Exception\DbException;

class GoodsDao
{
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
}
