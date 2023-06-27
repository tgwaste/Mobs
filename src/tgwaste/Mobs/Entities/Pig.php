<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Pig extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::PIG;
	const HEIGHT = 0.9;
}
