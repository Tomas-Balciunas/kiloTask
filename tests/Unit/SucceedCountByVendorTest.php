<?php

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use kilo\Execute;

class SucceedCountByVendorTest extends TestCase {
    
    public function testSucceedsCountByVendorId() {
        $params = array (
            0 => 'count_by_vendor_id',
            1 => '1'

        );

        $data = new Execute($params);
        $result = $data->callCommand();

        $this->assertStringContainsString("Amount of products found: ", $result);
    }
}