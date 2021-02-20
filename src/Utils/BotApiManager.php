<?php

namespace App\Utils;

class BotApiManager
{
    public function convertBinaryFromPrison(BotApiConnector $apiConnector,$token)
    {
        $result = $apiConnector->getPrison($token);
        $newConvertor = new BinaryConvertor();
        $cell = $newConvertor->makeWordFrom($result['cell']);
        $block = $newConvertor->makeWordFrom($result['block']);
        return "{$cell} {$block}";
    }
}