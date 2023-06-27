<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Sheep extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::SHEEP;
	const HEIGHT = 1.3;
}
