<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Pig extends MobsEntity {
	const TYPE_ID = EntityIds::PIG;
	
    protected int $health = 10;
    protected float $speed = 0.45;

    protected float $entitySizeHeigth = 0.9;
    protected float $entitySizeWidth = 0.9;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        return [
            VanillaItems::RAW_PORKCHOP()->setCount(mt_rand(1, 3)),
        ];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }

}
