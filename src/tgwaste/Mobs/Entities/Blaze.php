<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Blaze extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::BLAZE;
	const HEIGHT = 1.8;
}
