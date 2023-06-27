<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Stray extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::STRAY;
	const HEIGHT = 2.0;
}
