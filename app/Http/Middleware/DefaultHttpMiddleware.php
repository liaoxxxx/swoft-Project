<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Middleware;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;
use Swoft\Context\Context;

/**
 * Class FavIconMiddleware
 *
 * @Bean()
 */
class DefaultHttpMiddleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request.
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ('OPTIONS' === $request->getMethod()) {
            //file_put_contents("/www/wwwroot/swoft-my/liao.log",print_r(['method'=>'option'],true),FILE_APPEND);
            $response = Context::mustGet()->getResponse();
            return $this->configResponse($response);
        }
        $response = $handler->handle($request);
        return $this->configResponse($response);

    }

    private function configResponse(ResponseInterface $response)
    {

        $response =$response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        //file_put_contents('/www/wwwroot/swoft-my/liao.log',print_r($response,true),FILE_APPEND);
        return $response;


    }
}