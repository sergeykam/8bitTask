<?php
declare(strict_types = 1);

namespace src;

class HttpClient
{
    /**
     * @var resource
     */
    private $chanel;

    public function __construct()
    {
        $this->chanel = curl_init();
    }

    /**
     * @param string $url
     * @param array $params
     * @return null|string
     */
    public function get(string $url, array $params = []): ?string
    {
        curl_setopt($this->chanel, CURLOPT_URL, $url);
        curl_setopt($this->chanel, CURLOPT_RETURNTRANSFER, 1);

        $body = curl_exec($this->chanel);

        $code = curl_getinfo($this->chanel, CURLINFO_RESPONSE_CODE);

        curl_close($this->chanel);

        if ($body === false || $code !== 200) {
            return null;
        }

        return $body;
    }

    public function post(string $url, array $params = []): ?string
    {
        // TODO perform POST request
    }
}