<?php declare(strict_types=1);

namespace App\Task\Crontab;

use Swoft\Crontab\Annotaion\Mapping\Cron;
use Swoft\Crontab\Annotaion\Mapping\Scheduled;
use Swoft\Log\Helper\CLog;
use Swoft\Task\Annotation\Mapping\Task;

/**
 * Class DemoTask
 * @since 2.0
 * @Scheduled("DemoTask")
 */
class DemoTask
{
    /**
     * @Cron("* * * * * *")
     */
    public function secondTask()
    {
        while (true){
            Clog::info("定时器测试aa: %s ", date('Y-m-d H:i:s', time()));
            sleep(2);
        }
    }

    /**
     * @Cron("* * * * * *")
     */
    public function secondTask2()
    {
        Clog::info("定时器测试2: %s ", date('Y-m-d H:i:s', time()));
    }

    /**
     * @Cron("0 * * * * *")
     */
    public function minuteTask()
    {
        Clog::info("minute task run: %s ", date('Y-m-d H:i:s', time()));
    }

    /**
     * @Cron("* * * * * *")
     */
    public function executeTask()
    {
        Clog::info("手动调度的任务 task run: %s ", date('Y-m-d H:i:s', time()));
    }

}