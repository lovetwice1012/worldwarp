<?php

declare(strict_types=1);

namespace lovetwice1012\worldwarp;

use pocketmine\Server;

class WMAPI {
    public static function getAllLevels(): array {
        $levels = [];
        foreach (glob(Server::getInstance()->getDataPath() . "/worlds/*") as $world) {
            if(count(scandir($world)) >= 4) { // don't forget to .. & .
                $levels[] = basename($world);
            }
        }
        return $levels;
    }
}
