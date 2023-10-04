<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class ElderGuardian extends MobsEntity {
	const TYPE_ID = EntityIds::ELDER_GUARDIAN;
    
    protected int $health = 80;
    protected float $speed = 0.3;

    protected float $entitySizeHeigth = 1.99;
    protected float $entitySizeWidth = 1.45;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops = [
            VanillaItems::PRISMARINE_CRYSTALS()->setCount(mt_rand(0, 1)),
            VanillaItems::PRISMARINE_SHARD()->setCount(mt_rand(0, 2)),
            VanillaItems::RAW_FISH()->setCount(mt_rand(0, 1)),
        ];

        // rare drops
        $prob = 25;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::RAW_SALMON();
        }
        $prob = 13;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::PUFFERFISH();
        }
        $prob = 2;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::CLOWNFISH();
        }

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;
        
        return 10;
    }

}
