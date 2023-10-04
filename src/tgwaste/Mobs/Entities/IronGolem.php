<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class IronGolem extends MobsEntity {
	const TYPE_ID = EntityIds::IRON_GOLEM;
	
    protected int $health = 100;
    protected float $speed = 0.25;

    protected float $entitySizeHeigth = 2.7;
    protected float $entitySizeWidth = 1.4;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::IRON_INGOT()->setCount(mt_rand(3, 5));

        return $drops;
    }
    
}
