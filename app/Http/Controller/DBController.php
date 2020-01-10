<?php
declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use Swoft\Db\Schema;
use Swoft\Db\Schema\Blueprint;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * Class DbBuilderController
 *
 * @since 2.0
 *
 * @Controller("db")
 */
class DBController
{
    /**
     * @RequestMapping()
     *
     * @return void
     */
    public function test1(): void
    {
       echo print_r(    \Swoft::getBean('db'),true);
    }

    /**
     * @RequestMapping()
     *
     * @return void
     */
    public function test2(): void
    {
        echo print_r(    \Swoft::getBean('db'),true);
    }



}
