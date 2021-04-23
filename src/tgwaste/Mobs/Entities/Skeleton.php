<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\entity\Living;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use tgwaste\Mobs\Traits;

class Skeleton extends Living {
	use Traits;

	public static function getNetworkTypeId() : string {
		return EntityIds::SKELETON;
	}

	public function getName() : string {
		return "Skeleton";
	}

	public function mortalEnemy() : string {
		return "Wolf";
	}

	public function catchesFire() : bool {
		return true;
	}

	public function isFlying() : bool {
		return false;
	}

	public function isJumping() : bool {
		return false;
	}

	public function isHostile() : bool {
		return true;
	}

	public function isNether() : bool {
		return false;
	}

	public function isSnow() : bool {
		return false;
	}

	public function isSwimming() : bool {
		return false;
	}

	public function fall(float $fallDistance) : void {
	}
}
