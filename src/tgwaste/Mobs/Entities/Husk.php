<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Husk extends MobsEntity {
	const TYPE_ID = EntityIds::HUSK;
	const HEIGHT = 1.95;

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
            $drops[] = VanillaItems::IRON_INGOT();
        }
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::CARROT();
        }
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::POTATO();
        }

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;

        return 5 + mt_rand(1, 3);
    }

}
