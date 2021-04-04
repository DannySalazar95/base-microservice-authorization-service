<?php

namespace App\Http\Controllers;


use Eureka\EurekaClient;
use Eureka\Exceptions\DeRegisterFailureException;
use Eureka\Exceptions\RegisterFailureException;

class EurekaClientController extends Controller
{
    /**
     * @return string
     */
    protected function deRegister(): string
    {
        $client = new EurekaClient(config('eureka.config'));
        try {
            $client->deRegister();
        } catch (DeRegisterFailureException $e) {
            return $e->getMessage();
        }

        return 'Eureka client: successfully unsubscribe';
    }

    /**
     * @return string
     */
    protected function register(): string
    {
        $client = new EurekaClient(config('eureka.config'));
        try {
            $client->register();
            $client->heartbeat();
        } catch (RegisterFailureException $e) {
            return $e->getMessage();
        }

        return 'Eureka client: successfully registered';
    }
}
