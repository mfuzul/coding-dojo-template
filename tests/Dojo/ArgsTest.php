<?php
/**
 * Created by PhpStorm.
 * User: mateo-gbb
 * Date: 2019-10-09
 * Time: 14:32
 */

use PHPUnit\Framework\TestCase;
use Dojo\SchemaParam;

class ArgsTest extends TestCase
{
    /**
     * @var \Dojo\ArgsParser
     */
    private $argsParser;

    protected function setUp(): void
    {
        $this->argsParser = new \Dojo\ArgsParser();
    }

    /**
     * @param string $input
     * @param array $schema
     * @param array $expectedOutput
     *
     * @dataProvider parseProvider
     */
    public function testParse(string $input, array $schema, array $expectedOutput)
    {
        $actualOutput = $this->argsParser->parse($input, $schema);

        /**
         * @var string $key
         * @var SchemaParam $schemaParam
         */
        foreach ($expectedOutput as $key => $expectedValue) {
            $this->assertArrayHasKey($key, $actualOutput);
            if (SchemaParam::BOOLEAN === $schema[$key]->paramType) {
                $this->assertNull($expectedOutput[$key]);
            } else {
                $this->assertEquals($expectedValue, $actualOutput[$key]);
            }
        }
    }
    
    public function parseProvider()
    {
        return [
            [
                '-d -e -f 1000',
                [
                    'd' => new SchemaParam(false, SchemaParam::BOOLEAN),
                    'e' => new SchemaParam(0, SchemaParam::VALUE),
                    'f' => new SchemaParam(100, SchemaParam::VALUE),
                ],
                [
                    'd' => null,
                    'e' => 0,
                    'f' => 1000,
                ]
            ],
        ];
    }

//    public function testForBooleanFlags()
//    {
//    }
//
//    public function testFlagsWithRequiredInput()
//    {
//
//    }
//
//    public function testMixedFlagsInput()
//    {
//
//    }

}