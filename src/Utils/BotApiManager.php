<?php

namespace App\Utils;

class BotApiManager
{
    public function convertBinaryFromPrison(BotApiConnector $apiConnector)
    {
        $result = $apiConnector->getPrison('adgag');
        $newConvertor = new BinaryConvertor();
        $cell = $newConvertor->makeWordFrom($result['cell']);
        $block = $newConvertor->makeWordFrom($result['block']);
        return "{$cell} {$block}";
    }
}