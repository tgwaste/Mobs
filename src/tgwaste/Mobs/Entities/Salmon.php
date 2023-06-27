<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Salmon extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::SALMON;
	const HEIGHT = 1.0;
}
