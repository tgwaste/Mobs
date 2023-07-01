<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Cow extends MobsEntity {
	const TYPE_ID = EntityIds::COW;
	const HEIGHT = 1.4;
}
