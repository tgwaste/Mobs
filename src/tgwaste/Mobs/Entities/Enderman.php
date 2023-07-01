<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Enderman extends MobsEntity {
	const TYPE_ID = EntityIds::ENDERMAN;
	const HEIGHT = 2.9;
}
