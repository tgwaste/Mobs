<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Rabbit extends MobsEntity {
	const TYPE_ID = EntityIds::RABBIT;
	
    protected int $health = 3;
    protected float $speed = 0.5;

    protected float $entitySizeHeigth = 0.4;
    protected float $entitySizeWidth = 0.2;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::RAW_RABBIT();
        $drops[] = VanillaItems::RABBIT_HIDE()->setCount(mt_rand(0, 1));

        // rare drops
        $prob = 10;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::RABBIT_FOOT();
        }

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }

}
