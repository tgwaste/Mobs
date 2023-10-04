<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class ZombieVillager extends MobsEntity {
	const TYPE_ID = EntityIds::ZOMBIE_VILLAGER;
	
    protected int $health = 20;
    protected float $speed = 0.23;

    protected float $entitySizeHeigth = 1.95;
    protected float $entitySizeWidth = 0.6;

    public $isLooting = false;

    protected function applyPostDamageEffects(EntityDamageEvent $source) : void {
        if (!$this->isLooting) {
            if ($source instanceof EntityDamageByEntityEvent && ($attacker = $source->getDamager()) !== null) {
                $this->isLooting = ($attacker instanceof Player);
            }
        }
        parent::applyPostDamageEffects($source);
    }

    public function getDrops(): array {
        if (!$this->isLooting) return [];

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
        if (!$this->isLooting) return 0;

        return 5 + mt_rand(1, 3);
    }

}
