<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Wolf extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::WOLF;
	const HEIGHT = 0.8;
}
