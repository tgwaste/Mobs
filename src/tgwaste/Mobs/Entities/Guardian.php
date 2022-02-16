<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;

class Guardian extends MobsEntity {
	const TYPE_ID = EntityLegacyIds::GUARDIAN;
	const HEIGHT = 0.85;
}
