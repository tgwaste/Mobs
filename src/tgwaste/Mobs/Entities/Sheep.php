<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\item\VanillaItems;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;
use pocketmine\block\utils\DyeColor;
use pocketmine\block\VanillaBlocks;

class Sheep extends MobsEntity {
	const TYPE_ID = EntityIds::SHEEP;
	
    protected int $health = 8;
    protected float $speed = 0.45;

    protected float $entitySizeHeigth = 1.3;
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
        $colors = DyeColor::getAll();
        $randomColor = $colors[array_rand($colors)];
        $drops = [
            VanillaBlocks::WOOL()->setColor($randomColor)->asItem(), 
            VanillaItems::RAW_MUTTON()->setCount(mt_rand(1, 2))
        ];

        return $drops;
    }

    public function getXpDropAmount(): int {
        if (!$this->isLooting) return 0;
        
        return mt_rand(1, 3);
    }

}
