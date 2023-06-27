<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Cow extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::COW;
	const HEIGHT = 1.4;
}
