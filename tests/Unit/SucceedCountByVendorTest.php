<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use kilo\Controller;

class SucceedCountByVendorTest extends TestCase {
    
    public function testSucceedsCountByVendorId() {
        $params = array (
            0 => 'count_by_vendor_id',
            1 => '1'

        );

        $data = new Controller($params);
        $result = $data->fetch();

        $this->assertStringContainsString("Amount of products found: ", $result);
    }
}