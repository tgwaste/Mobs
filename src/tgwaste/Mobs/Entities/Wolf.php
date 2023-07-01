<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Wolf extends MobsEntity {
	const TYPE_ID = EntityIds::WOLF;
	const HEIGHT = 0.85;
}
