<?php declare(strict_types=1);
namespace App\Helper;
use App\Model\Entity\User;
use Lcobucci\JWT;
use Lcobucci\JWT\Builder;
use phpDocumentor\Reflection\Types\Integer;

class TokenHelper{

    /**
     * @param $token
     * @return string
     */
    public static function encode(JWT\Token $token) :string {
        return base64_encode(serialize( $token));

    }

    /**
     * @return JWT\Token
     */
    public static  function buildToken(int $identified ,int $uid):JWT\Token{
        $time = time();
        $token= (new Builder())->issuedBy(config('jwt.issuedBy')) // Configures the issuer (iss claim)
        ->permittedFor(config('jwt.permittedFor')) // Configures the audience (aud claim)
        ->identifiedBy($identified, true) // Configures the id (jti claim), replicating as a header item
        ->issuedAt($time) // Configures the time that the token was issue (iat claim)
        ->canOnlyBeUsedAfter($time + config('jwt.UsedAfterTime')) // Configures the time that the token can be used (nbf claim)
        ->expiresAt($time + 3600) // Configures the expiration time of the token (exp claim)
        ->withClaim('uid', $uid) // Configures a new claim, called "uid"
        ->getToken(); // Retrieves the generated token
        return $token;
    }


    public static function decode($tokenStr){

    }

}



