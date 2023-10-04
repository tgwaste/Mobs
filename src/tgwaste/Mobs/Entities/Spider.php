<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Spider extends MobsEntity {
	const TYPE_ID = EntityIds::SPIDER;
	const HEIGHT = 0.9;

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

        $drops = [
            VanillaItems::STRING()->setCount(mt_rand(0, 2)),
            VanillaItems::SPIDER_EYE()->setCount(mt_rand(0, 1))
        ];

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;

        return 5;
    }
}
