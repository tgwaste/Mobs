<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Wolf extends MobsEntity {
	const TYPE_ID = EntityIds::WOLF;
	
    protected int $health = 8;
    protected float $speed = 0.3;

    protected float $entitySizeHeigth = 0.85;
    protected float $entitySizeWidth = 0.6;

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }

}
