<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class PolarBear extends MobsEntity {
	const TYPE_ID = EntityIds::POLAR_BEAR;
	
    protected int $health = 30;
    protected float $speed = 0.25;

    protected float $entitySizeHeigth = 1.4;
    protected float $entitySizeWidth = 1.3;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::RAW_FISH()->setCount(mt_rand(0, 2));
        $drops[] = VanillaItems::RAW_SALMON()->setCount(mt_rand(0, 2));

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
}
