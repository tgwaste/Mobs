<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Dolphin extends MobsEntity {
	const TYPE_ID = EntityIds::DOLPHIN;
    
    protected int $health = 10;
    protected float $speed = 1.2;

    protected float $entitySizeHeigth = 0.9;
    protected float $entitySizeWidth = 0.6;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops = [
            VanillaItems::RAW_FISH()->setCount(mt_rand(0, 1))
        ];

        return $drops;
    }
}
