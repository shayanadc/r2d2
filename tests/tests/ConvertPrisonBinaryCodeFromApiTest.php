<?php


namespace App\Tests\tests;


use App\Utils\BotApiConnector;
use App\Utils\BotApiManager;
use PHPUnit\Framework\TestCase;

class ConvertPrisonBinaryCodeFromApiTest extends TestCase
{
    public function testGetBinaryFromApi(){
        $stub = $this->createStub(BotApiConnector::class);
        $stub->method('getPrison')
            ->willReturn([
                'cell' => '01000011 01100101 01101100 01101100 00100000 00110010 00110001 00111000 00110111',
                'block' => '01000100 01100101 01110100 01100101 01101110 01110100 01101001 01101111 01101110 00100000 01000010 01101100 01101111 01100011 01101011 00100000 01000001 01000001 00101101 00110010 00110011 00101100'
                ]);
        $new = new BotApiManager();
        $this->assertEquals('Cell 2187 Detention Block AA-23,' , $new->convertBinaryFromPrison($stub,'FAKE_TOKEN'));
    }
}