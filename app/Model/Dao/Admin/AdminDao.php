<?php declare(strict_types=1);


namespace App\Model\Dao\Admin;


use App\Exception\Handler\HttpExceptionHandler;
use App\Model\Entity\Admin;
use phpDocumentor\Reflection\Types\Mixed_;
use PhpParser\Node\Expr\Cast\Object_;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Eloquent\Builder;
use Swoft\Db\Eloquent\Collection;
use Swoft\Db\Eloquent\Model;
use Swoft\Db\Exception\DbException;

class AdminDao
{
    /**
     * @param string $userName
     * @return object|Builder|Model|null
     */
    public static function findByUsername(string $userName) {
        try {
         return   $admin= Admin::where('username', $userName)->first();
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
    }
}
