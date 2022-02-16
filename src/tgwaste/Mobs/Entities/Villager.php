<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;

class Villager extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::VILLAGER;
	const HEIGHT = 1.95;
}
