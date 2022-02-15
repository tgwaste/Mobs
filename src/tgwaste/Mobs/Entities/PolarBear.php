<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\Living;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use tgwaste\Mobs\Traits;

class PolarBear extends Living {
	use Traits;

	const TYPE_ID = EntityLegacyIds::POLAR_BEAR;

	public static function getNetworkTypeId() : string {
		return EntityIds::POLAR_BEAR;
	}

	public function getName() : string {
		return "PolarBear";
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
		return true;
	}

	public function isSwimming() : bool {
		return false;
	}

	public function fall(float $fallDistance) : void {
	}
}
