<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\entity\WaterAnimal;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use tgwaste\Mobs\Traits;

class Salmon extends WaterAnimal {
	use Traits;

	public static function getNetworkTypeId() : string {
		return EntityIds::SALMON;
	}

	public function getName() : string {
		return "Salmon";
	}

	public function mortalEnemy() : string {
		return "none";
	}

	public function catchesFire() : bool {
		return false;
	}

	public function isFlying() : bool {
		return false;
	}

	public function isJumping() : bool {
		return false;
	}

	public function isHostile() : bool {
		return false;
	}

	public function isNether() : bool {
		return false;
	}

	public function isSnow() : bool {
		return false;
	}

	public function isSwimming() : bool {
		return true;
	}

	public function fall(float $fallDistance) : void {
	}
}
