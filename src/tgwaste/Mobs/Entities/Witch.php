<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Witch extends MobsEntity {
	const TYPE_ID = EntityIds::WITCH;
    
	protected int $health = 26;
    protected float $speed = 0.25;

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

        $drops[] = VanillaItems::GLASS_BOTTLE()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::GLOWSTONE_DUST()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::GUNPOWDER()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::REDSTONE_DUST()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::SPIDER_EYE()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::STICK()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::SUGAR()->setCount(mt_rand(0, 6));
        $drops[] = VanillaItems::POTION();

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;

        return 5 + mt_rand(1, 3);
    }

}
