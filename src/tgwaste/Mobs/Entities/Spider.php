<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Spider extends MobsEntity {
	const TYPE_ID = EntityIds::SPIDER;
    
    protected int $health = 16;
    protected float $speed = 0.3;

    protected float $entitySizeHeigth = 0.9;
    protected float $entitySizeWidth = 1.4;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops = [
            VanillaItems::STRING()->setCount(mt_rand(0, 2)),
            VanillaItems::SPIDER_EYE()->setCount(mt_rand(0, 1))
        ];

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return 5;
    }
}
