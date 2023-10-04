<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class SkeletonHorse extends MobsEntity {
	const TYPE_ID = EntityIds::SKELETON_HORSE;
	
    protected int $health = 15;
    protected float $speed = 0.2;

    protected float $entitySizeHeigth = 1.6;
    protected float $entitySizeWidth = 0.79;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::BONE()->setCount(mt_rand(0, 2));

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return mt_rand(1, 3);
    }
}
