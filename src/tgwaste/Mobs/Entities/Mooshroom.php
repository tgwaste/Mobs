<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Mooshroom extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::MOOSHROOM;
	const HEIGHT = 1.0;
}
