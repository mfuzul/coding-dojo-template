<?php
declare(strict_types=1);

use Dojo\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    // This method will be called *before* each test run.
    public function setUp(): void {}
    
    // This method will be called *after* each test run.
    public function tearDown(): void {}
    
    public function testRandom()
    {
        // arrange
        // act
        // assert
        $object = new Example();
        $this->assertEquals(4, $object->random());

        // 1 - 1
        // 3 - fizz
        // 5 - buzz
        // 15 - fizzbuzz
        // 17 - 17
    }
}
