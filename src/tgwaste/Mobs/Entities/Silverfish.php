<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class Silverfish extends MobsEntity {
	const TYPE_ID = EntityIds::SILVERFISH;
	
    protected int $health = 8;
    protected float $speed = 0.4;

    protected float $entitySizeHeigth = 0.3;
    protected float $entitySizeWidth = 0.4;

    public $isLooting = false;

    protected function applyPostDamageEffects(EntityDamageEvent $source) : void {
        if (!$this->isLooting) {
            if ($source instanceof EntityDamageByEntityEvent && ($attacker = $source->getDamager()) !== null) {
                $this->isLooting = ($attacker instanceof Player);
            }
        }
        parent::applyPostDamageEffects($source);
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;
        
        return 5;
    }
    
}
