<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Phantom extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::PHANTOM;
	const HEIGHT = 1.0;
}
