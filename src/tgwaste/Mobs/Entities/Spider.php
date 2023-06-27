<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Spider extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::SPIDER;
	const HEIGHT = 0.9;
}
