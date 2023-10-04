<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Enderman extends MobsEntity {
	const TYPE_ID = EntityIds::ENDERMAN;
    
    protected int $health = 8;
    protected float $speed = 0.25;

    protected float $entitySizeHeigth = 0.3;
    protected float $entitySizeWidth = 0.4;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        return [
            VanillaItems::ENDER_PEARL()->setCount(mt_rand(0, 1))
        ];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return 5;
    }

}
