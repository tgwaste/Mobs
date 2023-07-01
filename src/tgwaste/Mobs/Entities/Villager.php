<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Villager extends MobsEntity {
	const TYPE_ID = EntityIds::VILLAGER;
	const HEIGHT = 1.95;
}
