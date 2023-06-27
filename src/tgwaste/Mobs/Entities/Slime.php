<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Slime extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::SLIME;
	const HEIGHT = 0.5;
}
