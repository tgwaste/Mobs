<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class MagmaCube extends MobsEntity {
	const TYPE_ID = EntityIds::MAGMA_CUBE;

    protected int $health = 8;
    protected float $speed = 0.4;

    protected float $entitySizeHeigth = 0.8;
    protected float $entitySizeWidth = 0.8;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        return [VanillaItems::MAGMA_CREAM()->setCount(mt_rand(0, 1))];
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return mt_rand(1, 4);
    }
}
