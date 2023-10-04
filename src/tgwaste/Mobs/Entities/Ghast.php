<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Ghast extends MobsEntity {
	const TYPE_ID = EntityIds::GHAST;
    
    protected int $health = 10;
    protected float $speed = 0.001;

    protected float $entitySizeHeigth = 4.0;
    protected float $entitySizeWidth = 4.0;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::GHAST_TEAR()->setCount(mt_rand(0, 1));
        $drops[] = VanillaItems::GUNPOWDER()->setCount(mt_rand(0, 2));

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return 5;
    }
    
}
