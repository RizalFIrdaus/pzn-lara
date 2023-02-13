<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $result =  array_sum(preg_split("/[^\d]/", "The30quick20brown10f0x1203jumps914ov3r1349the102l4zy dog"));
        self::assertEquals(3635, $result);
    }
}
