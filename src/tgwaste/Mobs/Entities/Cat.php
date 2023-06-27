<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Cat extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::CAT;
	const HEIGHT = 1.0;
}
