<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Dolphin extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::DOLPHIN;
	const HEIGHT = 1.0;
}
