<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Slime extends MobsEntity {
	const TYPE_ID = EntityIds::SLIME;
	
    protected int $health = 4;
    protected float $speed = 0.45;

    protected float $entitySizeHeigth = 0.7;
    protected float $entitySizeWidth = 0.6;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::SLIMEBALL()->setCount(mt_rand(0, 2));

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return mt_rand(1, 4);
    }
    
}
