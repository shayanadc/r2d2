<?php
use PHPUnit\Framework\TestCase;

class BinaryConvertorTest extends TestCase
{
    public function testConvertBinaryToWord()
    {
        $calculator = new \App\Utils\BinaryConvertor();
        $result = $calculator->makeWordFrom('01000011 01100101 01101100 01101100');

        // assert that your calculator added the numbers correctly!
        $this->assertEquals('Cell', $result);
    }
}
