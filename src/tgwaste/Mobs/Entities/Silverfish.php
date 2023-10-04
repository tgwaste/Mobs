<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Silverfish extends MobsEntity {
	const TYPE_ID = EntityIds::SILVERFISH;
	
    protected int $health = 8;
    protected float $speed = 0.4;

    protected float $entitySizeHeigth = 0.3;
    protected float $entitySizeWidth = 0.4;

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return 5;
    }
    
}
