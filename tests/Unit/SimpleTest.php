<?php 
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase {
    public function testTrueIstrue(): void {
        $this->assertEquals(true, true);
    }
}