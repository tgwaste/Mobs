<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Rabbit extends MobsEntity {
	const TYPE_ID = EntityIds::RABBIT;
	const HEIGHT = 0.5;
}
