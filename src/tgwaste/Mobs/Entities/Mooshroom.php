<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class Mooshroom extends MobsEntity {
	const TYPE_ID = EntityIds::MOOSHROOM;
	
    protected int $health = 10;
    protected float $speed = 0.45;

    protected float $entitySizeHeigth = 1.4;
    protected float $entitySizeWidth = 0.9;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];
        $drops[] = VanillaItems::MUSHROOM_STEW();
        $drops[] = VanillaItems::LEATHER()->setCount(mt_rand(0, 2));
        $drops[] = VanillaItems::RAW_BEEF()->setCount(mt_rand(1, 3));

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
    
}
