<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Cow extends MobsEntity {
	const TYPE_ID = EntityIds::COW;

    protected int $health = 10;
    protected float $speed = 0.45;

    protected float $entitySizeHeigth = 1.4;
    protected float $entitySizeWidth = 0.9;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        return [
            VanillaItems::RAW_BEEF()->setCount(mt_rand(1, 3)),
            VanillaItems::LEATHER()->setCount(mt_rand(0, 2)),
        ];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
}
