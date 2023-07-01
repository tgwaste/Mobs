<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Pig extends MobsEntity {
	const TYPE_ID = EntityIds::PIG;
	const HEIGHT = 0.9;
}
