<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class PolarBear extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::POLAR_BEAR;
	const HEIGHT = 1.4;
}
