<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;

class ZombieVillager extends MobsEntity {
	const TYPE_ID = EntityIds::ZOMBIE_VILLAGER;
	
    protected int $health = 20;
    protected float $speed = 0.23;

    protected float $entitySizeHeigth = 1.95;
    protected float $entitySizeWidth = 0.6;

    public function getDrops(): array {
        if (!$this->canDrop()) return [];

        $drops[] = VanillaItems::ROTTEN_FLESH()->setCount(mt_rand(0, 2));

        // rare drops
        $prob = 3;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::IRON_INGOT()->setCount(1);
        }
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::CARROT()->setCount(1);
        }
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::POTATO()->setCount(1);
        }

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->canDrop()) return 0;

        return 5 + mt_rand(1, 3);
    }

}
