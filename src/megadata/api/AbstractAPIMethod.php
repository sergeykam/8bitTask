<?php
declare(strict_types = 1);

namespace src\megadata\api;

use src\HttpClient;

abstract class AbstractAPIMethod
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}