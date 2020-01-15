<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Helper\HttpHeader;
use App\Helper\Response\JsonResponse;
use App\Helper\TokenHelper;
use App\Model\Dao\Admin\AdminRedisStrategy;
use App\Model\Dao\Admin\AdminDao;
use App\Model\Entity\Admin;
use App\Model\Logic\AdminLogic;
use ReflectionException;
use Swoft;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Throwable;
use Swoft\Redis\Redis;

/**
 * Class HomeController
 * @Controller(prefix="/admin")
 */
class LoginController extends BaseController
{


    /**
     * @RequestMapping(route="login")
     * @Validate(validator="TestValidator")
     * @param Request $request
     * @param Response $response
     * @return Response|Swoft\WebSocket\Server\Message\Response
     */
    public function login(Request $request,Response $response)
    {

        $username=$request->input("username","");
        $password=$request->input("password","");
        //$admin=Admin::find(1);
        //$admin->setStatus(1);
        //$admin->setSalt("123456");
        //$admin->setPassword(AdminLogic::genPassword("123456","123456"));
        //$admin->save();

        $response= AdminLogic::handleLogin($username,$password);
        return $response;

    }

    /**
     * @RequestMapping(route="info")
     * @Validate(validator="TestValidator")
     * @param Request $request
     * @param Response $response
     * @return Response|Swoft\WebSocket\Server\Message\Response
     */
    public function info(Request $request,Response $response)
    {

        $username=$request->input("username","");
        $password=$request->input("password","");
        //$admin=Admin::find(1);
        //$admin->setStatus(1);
        //$admin->setSalt("123456");
        //$admin->setPassword(AdminLogic::genPassword("123456","123456"));
        //$admin->save();

        $response= AdminLogic::handleLogin($username,$password);
        return $response;

    }
}
