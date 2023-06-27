<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Villager extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::VILLAGER;
	const HEIGHT = 1.9;
}
