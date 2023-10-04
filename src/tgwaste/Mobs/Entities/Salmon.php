<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Salmon extends MobsEntity {
	const TYPE_ID = EntityIds::SALMON;
	
    protected int $health = 3;
    protected float $speed = 0.4;

    protected float $entitySizeHeigth = 0.4;
    protected float $entitySizeWidth = 0.7;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::RAW_SALMON()->setCount(1);

        // rare drops
        $prob = 25;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::BONE()->setCount(mt_rand(0, 2));
        }

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }

}
