<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;

class Zombie extends MobsEntity {
	const TYPE_ID = LegacyEntityIdToStringIdMap::ZOMBIE;
	const HEIGHT = 1.9;
}
