<?php

namespace App\Http\Controllers;


use App\Exceptions\JwtEncodeException;
use App\Services\JwtService;

class JwtController extends Controller
{
    /**
     * @var JwtService
     */
    private $jwtServ;

    /**
     * JwtController constructor.
     * @param JwtService $service
     */
    public function __construct(JwtService $service)
    {
        $this->jwtServ = $service;
    }

    /**
     * @return array
     * @throws JwtEncodeException
     */
    protected function encode(): array
    {
        return [
            'jwt' => $this->jwtServ->encode()
        ];
    }

}
