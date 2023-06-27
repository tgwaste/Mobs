<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Husk extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::HUSK;
	const HEIGHT = 1.9;
}
