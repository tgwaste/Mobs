<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class CaveSpider extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::CAVE_SPIDER;
	const HEIGHT = 0.5;
}
