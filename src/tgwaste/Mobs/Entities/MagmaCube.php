<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class MagmaCube extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::MAGMA_CUBE;
	const HEIGHT = 1.0;
}
