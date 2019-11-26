<?php declare(strict_types=1);

namespace App\Http\Controller\Admin;



use App\Helper\HttpHeader;
use App\Helper\JsonResponse;
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
     * @RequestMapping(route="/admin/login")
     * @Validate(validator="TestValidator")
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws Swoft\Db\Exception\DbException
     */
    public function login(Request $request,Response $response): Response
    {

        $username=$request->input("username","");
        $password=$request->input("password","");
        $admin= AdminDao::findByUsername($username);

        //校验密码
        if(!AdminLogic::checkPassword($admin,$password)){
            $response=$response->withData(JsonResponse::Error('密码错误:password  does not match') );
            $response=HttpHeader::crossOrigin($response);
            return $response;
        }


        //var_dump(AdminLogic::getAdminByCache(new AdminRedisStrategy() ,AdminLogic::genCacheKey($admin)));

        //AdminLogic::checkAdminStatus($admin);
        $time = time();

        $identified= mt_rand(10000,99999);
        $tokenStr = TokenHelper::encode(  TokenHelper::buildToken($identified,$admin->getId() ) );


        $data['admin']=$admin;
        $data['token']=$tokenStr;

        //保存用户数据到缓存
        AdminLogic::saveAdmin2Cache(new AdminRedisStrategy(),AdminLogic::genCacheKey($admin), (array)$admin);
        $response= $response->withData(JsonResponse::Success("登陆成功",$data));
        $response=HttpHeader::crossOrigin($response);
        return $response->withHeader("name","Swoft2.0");

    }
}
