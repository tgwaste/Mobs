<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class PufferFish extends MobsEntity {
	const TYPE_ID = EntityIds::PUFFERFISH;
	
    protected int $health = 3;
    protected float $speed = 1.0;

    protected float $entitySizeHeigth = 0.7;
    protected float $entitySizeWidth = 0.7;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::PUFFERFISH();

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
}
