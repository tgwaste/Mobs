<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Creeper extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::CREEPER;
	const HEIGHT = 1.7;
}
