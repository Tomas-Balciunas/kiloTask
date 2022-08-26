<?php

namespace kilo;

class Fetch implements ReaderInterface
{
    private $url;
    private $endpoint;

    public function __construct($base)
        {
            $this->url = $base;
        }

    public function read(string $endp)
    {
        $this->endpoint = $endp;
        $ch = curl_init($this->url . $this->endpoint);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        
        return $response_json;
    }
}
