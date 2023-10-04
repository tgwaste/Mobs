<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Creeper extends MobsEntity {
	const TYPE_ID = EntityIds::CREEPER;
    
    protected int $health = 20;
    protected float $speed = 0.25;

    protected float $entitySizeHeigth = 1.7;
    protected float $entitySizeWidth = 0.6;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops = [
            VanillaItems::GUNPOWDER()->setCount(mt_rand(0, 2))
        ];

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return 5;
    }

}
