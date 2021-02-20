<?php
use PHPUnit\Framework\TestCase;

class BinaryConvertorTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testConvertBinaryToWord($input,$expected)
    {
        $calculator = new \App\Utils\BinaryConvertor();
        $result = $calculator->makeWordFrom($input);

        $this->assertEquals($expected, $result);
    }

    public function additionProvider(): array
    {
        return [
            ['01000011 01100101 01101100 01101100', 'Cell'],
            ['01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110', 'Detention'],
            ['00100000 00110010 00110001 00111000 00110111', ' 2187'],
        ];
    }
}
