<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Parrot extends MobsEntity {
	const TYPE_ID = EntityIds::PARROT;
    
    protected int $health = 6;
    protected float $speed = 1.2;
    protected bool $gravityMob = false;

    protected float $entitySizeHeigth = 0.9;
    protected float $entitySizeWidth = 0.5;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        return [VanillaItems::FEATHER()->setCount(mt_rand(1, 2))];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }

}
