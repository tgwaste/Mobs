<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Blaze extends MobsEntity {
	const TYPE_ID = EntityIds::BLAZE;
    
    protected int $health = 20;
    protected float $speed = 0.23;

    protected float $entitySizeHeigth = 1.8;
    protected float $entitySizeWidth = 0.6;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::BLAZE_ROD()->setCount(mt_rand(0, 1));
        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return 10;
    }

}
