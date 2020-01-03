<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\WebSocket\Chat;

use Swoft\Session\Session;
use Swoft\WebSocket\Server\Annotation\Mapping\MessageMapping;
use Swoft\WebSocket\Server\Annotation\Mapping\WsController;

/**
 * Class HomeController
 *
 * @WsController()
 */
class EchoController
{
    /**
     * Message command is: 'echo.index'
     *
     * @return void
     * @MessageMapping()
     */
    public function index(): void
    {
        Session::mustGet()->push('hi, this is echo.index');
    }

    /**
     * Message command is: 'echo.echo'
     *
     * @param $data
     * @MessageMapping(‘echo’)
     */
    public function echo(string $data): void
    {
        Session::mustGet()->push('this is EchoController:: echoMethod Recv: ' . $data);
    }

    /**
     * Message command is: 'echo.ar'
     *
     * @param $data
     * @MessageMapping("ar")
     *
     * @return string
     */
    public function autoReply(string $data): string
    {
        return '(home.ar)Recv: ' . $data;
    }
}
