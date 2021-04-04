<?php


namespace App\Services;


use App\Exceptions\JwtEncodeException;
use Exception;
use Firebase\JWT\JWT;
use Laravel\Passport\Passport;
use Lcobucci\JWT\Signer\Key;

class JwtService
{
    /**
     * @return string
     * @throws JwtEncodeException
     */
    public function encode(): string
    {
        try {
            $jwt = JWT::encode(
                $this->generatePayload(),
                $this->getKeyContent('jwt-private.key'),
                'RS256'
            );
        } catch (Exception $e) {
            throw new JwtEncodeException($e->getMessage());
        }
        return $jwt;
    }

    /**
     * @param string $jwt
     * @return object
     */
    public function decode(string $jwt): object
    {
        return JWT::decode(
            $jwt,
            $this->getKeyContent('jwt-public.key'),
            ['RS256']
        );
    }

    /**
     * @param $file
     * @return string
     */
    private function getKeyContent($file): string
    {
        $prefix = 'file://';
        return $prefix.(new Key(Passport::keyPath($file)))->contents();
    }

    /**
     * @return array
     */
    private function generatePayload(): array
    {
        $time = time();

        return array(
            'iat'  => $time,
            'exp'  => $time + (60*60),
            'aud'  => $this->aud(),
            'data' => $this->generateClaims()
        );
    }

    /**
     * @return array
     */
    private function generateClaims(): array
    {
        $auth = auth()->user();

        return [
            'dn' => $auth->document_number,
            'fn' => $auth->first_name,
            'fln'=> $auth->father_last_name,
            'mln'=> $auth->mother_last_name,
            'dt' => $auth->document_type
        ];
    }

    /**
     * @return string
     */
    private function aud(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud);
    }
}