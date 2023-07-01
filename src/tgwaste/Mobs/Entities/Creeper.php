<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Creeper extends MobsEntity {
	const TYPE_ID = EntityIds::CREEPER;
	const HEIGHT = 1.7;
}
