<?php


namespace App\Utils;


use GuzzleHttp\Client;

class BinaryConvertor
{
    private function makeCharFrom($binaryCode)
    {
        return pack('H*', dechex(bindec($binaryCode)));
    }

    public function makeWordFrom($binaryCode)
    {
        $binaries = explode(' ', $binaryCode);
        $string = null;
        foreach ($binaries as $binary) {
            $string .= $this->makeCharFrom($binary);
        }
        return $string;
    }
}