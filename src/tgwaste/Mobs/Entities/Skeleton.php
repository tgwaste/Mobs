<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Skeleton extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::SKELETON;
	const HEIGHT = 2.0;
}
