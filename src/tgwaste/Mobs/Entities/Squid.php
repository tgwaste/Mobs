<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Squid extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::SQUID;
	const HEIGHT = 0.8;
}
