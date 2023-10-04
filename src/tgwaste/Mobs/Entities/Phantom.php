<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Phantom extends MobsEntity {
	const TYPE_ID = EntityIds::PHANTOM;
	
    protected int $health = 20;
    protected float $speed = 0.6;

    protected float $entitySizeHeigth = 0.5;
    protected float $entitySizeWidth = 0.9;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        return [VanillaItems::PHANTOM_MEMBRANE()->setCount(mt_rand(0, 1))];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return 5;
    }
    
}
