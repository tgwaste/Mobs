<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Rabbit extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::RABBIT;
	const HEIGHT = 0.5;
}
