<?php declare(strict_types=1);


namespace App\Model\Logic\Goods;


use App\Exception\Handler\HttpExceptionHandler;
use App\Model\Dao\Admin\AdminCacheStrategy;
use App\Model\Dao\Goods\GoodsCategoryDao;
use App\Model\Entity\Admin;
use App\Model\Entity\GoodsCategory;
use ReflectionException;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Db\Exception\DbException;
use Swoft\Log\Helper\CLog;

class GoodsCategoryExtLogic extends GoodsCategoryLogic
{
    /**
     * 编辑商品分类
     * @param array $post
     * @return bool
     */
    public  function edit(array $post ):bool {
        // TODO: 记录$post 的数据及时间
        try {
            $Category = parent::editBuild($post);
            // TODO: 处理父方法返回结果，根据返回结果进行相关处理
            return parent::save();
        }
        catch (HttpExceptionHandler $exception){
            // TODO: 如有异常，记录异常日志并发送邮件，然后继续将异常抛出
            CLog::info($exception->getMessage());
            return  false;
        }
        finally {
            //TODO： 最终纪录到日至
        }
    }
}
