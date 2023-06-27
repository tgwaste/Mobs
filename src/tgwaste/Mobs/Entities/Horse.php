<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Horse extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::HORSE;
	const HEIGHT = 1.6;
}
