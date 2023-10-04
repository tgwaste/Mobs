<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Rabbit extends MobsEntity {
	const TYPE_ID = EntityIds::RABBIT;
	const HEIGHT = 0.5;

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

        $drops[] = VanillaItems::RAW_RABBIT()->setCount(1);
        $drops[] = VanillaItems::RABBIT_HIDE()->setCount(mt_rand(0, 1));

        // rare drops
        $prob = 10;
        if (mt_rand(1, 100) <= $prob) {
            $drops[] = VanillaItems::RABBIT_FOOT();
        }

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;
        
        return mt_rand(1, 3);
    }

}
