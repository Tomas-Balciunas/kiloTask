<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use kilo\Fetch;

class FetchJsonTest extends TestCase
{
    public function testReturnsJson()
    {
        $url = "https://63035ab29eb72a839d7e946f.mockapi.io/";
        $endpoint = "api/v1/objects";
        $fetch = new Fetch($url);
        $result = $fetch->read($endpoint);
        
        $this->assertJson($result);
    }
}
