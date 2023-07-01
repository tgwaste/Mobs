<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Phantom extends MobsEntity {
	const TYPE_ID = EntityIds::PHANTOM;
	const HEIGHT = 1.0;
}
