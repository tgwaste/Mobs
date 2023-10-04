<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Stray extends MobsEntity {
	const TYPE_ID = EntityIds::STRAY;
	
    protected int $health = 20;
    protected float $speed = 0.25;

    protected float $entitySizeHeigth = 1.99;
    protected float $entitySizeWidth = 0.6;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::ARROW()->setCount(mt_rand(0, 2));
        $drops[] = VanillaItems::BONE()->setCount(mt_rand(0, 2));

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return 5 + mt_rand(1, 3);
    }
}
