<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;

class Creeper extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::CREEPER;
	const HEIGHT = 1.7;
}
