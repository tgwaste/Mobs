<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Enderman extends MobsEntity {
	const TYPE_ID = EntityIds::ENDERMAN;
	const HEIGHT = 2.9;

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

        return [
            VanillaItems::ENDER_PEARL()->setCount(mt_rand(0, 1))
        ];
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;

        return 5;
    }

}
