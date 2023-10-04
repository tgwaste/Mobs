<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Chicken extends MobsEntity {
	const TYPE_ID = EntityIds::CHICKEN;
    
    protected int $health = 4;
    protected float $speed = 0.25;

    protected float $entitySizeHeigth = 0.7;
    protected float $entitySizeWidth = 0.4;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops = [
			VanillaItems::FEATHER()->setCount(mt_rand(0, 2)),
            VanillaItems::RAW_CHICKEN()->setCount(mt_rand(0, 1)),
            VanillaItems::EGG()->setCount(mt_rand(0, 1))
        ];

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
}
