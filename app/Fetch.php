<?php

namespace kilo;

include_once('logging.php');

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
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        $response_json = curl_exec($ch);

        if (curl_errno($ch)) {
            $msg = "Request to " . $this->url . $this->endpoint . " failed. Reason: " . curl_error($ch);
            logger($msg);

            return false;
        } else {
            return $response_json;
        }

        curl_close($ch);
    }
}
