<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Llama extends MobsEntity {
	const TYPE_ID = EntityIds::LLAMA;
	
    protected int $health = 15;
    protected float $speed = 0.2;

    protected float $entitySizeHeigth = 1.87;
    protected float $entitySizeWidth = 0.9;

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
            VanillaItems::LEATHER()->setCount(mt_rand(0, 2)),
        ];
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;
        
        return mt_rand(1, 3);
    }

}
