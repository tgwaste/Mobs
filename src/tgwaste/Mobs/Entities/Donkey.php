<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Donkey extends MobsEntity {
	const TYPE_ID = EntityIds::DONKEY;

    protected int $health = 15;
    protected float $speed = 1.1;

    protected float $entitySizeHeigth = 1.6;
    protected float $entitySizeWidth = 0.9;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];
        return [
            VanillaItems::LEATHER()->setCount(mt_rand(0, 2)),
        ];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
}
