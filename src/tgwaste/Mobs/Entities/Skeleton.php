<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Skeleton extends MobsEntity {
	const TYPE_ID = EntityIds::SKELETON;
	const HEIGHT = 1.99;
}
