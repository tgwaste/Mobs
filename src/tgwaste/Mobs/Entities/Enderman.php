<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Enderman extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::ENDERMAN;
	const HEIGHT = 2.9;
}
