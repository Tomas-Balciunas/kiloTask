<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use kilo\Controller;

class FailCountByVendorTest extends TestCase {
    
    public function testFailsCountByVendorId() {
        $params = array (
            0 => 'count_by_vendor_id',
            1 => 'not_digit'

        );

        $data = new Controller($params);
        $result = $data->fetch();

        $this->assertEquals("Incorrect parameter given.", $result);
    }
}