<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Parrot extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::PARROT;
	const HEIGHT = 1.0;
}
