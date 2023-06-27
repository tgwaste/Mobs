<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Chicken extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::CHICKEN;
	const HEIGHT = 0.7;
}
