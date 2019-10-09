<?php
/**
 * Created by PhpStorm.
 * User: mateo-gbb
 * Date: 2019-10-09
 * Time: 14:14
 */

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new \Dojo\FizzBuzz();
    }

    public function testSimplestNumber()
    {
        // arrange
        $input = 1;

        $excpectedOutput = 1;

        // act
        $output = $this->fizzBuzz->forNumber($input);

        $this->assertEquals($excpectedOutput, $output);
    }

    /**
     * @param int        $input
     * @param int|string $expectedOutput
     *
     * @dataProvider fizzProvider
     */
    public function testFizzIsReturned(int $input, $expectedOutput)
    {
        $this->assertEquals(
            $expectedOutput,
            $this->fizzBuzz->forNumber($input)
        );
    }

    public function fizzProvider()
    {
        return [
            [1, 1],
            [3, 'fizz'],
        ];
    }

}
