<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Guardian extends MobsEntity {
	const TYPE_ID = EntityIds::GUARDIAN;
	const HEIGHT = 0.85;

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
            VanillaItems::RAW_FISH()->setCount(mt_rand(0, 1)),
            VanillaItems::PRISMARINE_SHARD()->setCount(mt_rand(0, 2)),
            VanillaItems::PRISMARINE_CRYSTALS()->setCount(mt_rand(0, 1))
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
        if (!$this->isLooting) return 0;

        return 10;
    }

}
