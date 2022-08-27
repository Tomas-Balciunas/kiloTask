<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use kilo\Execute;

class FailCountByVendorTest extends TestCase {
    
    public function testFailsCountByVendorId() {
        $params = array (
            0 => 'count_by_vendor_id',
            1 => 'not_digit'

        );

        $data = new Execute($params);
        $result = $data->callCommand();

        $this->assertEquals("Incorrect parameter given.", $result);
    }
}