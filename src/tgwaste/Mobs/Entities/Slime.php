<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\Living;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use tgwaste\Mobs\Traits;

class Slime extends Living {
	use Traits;

	const TYPE_ID = EntityLegacyIds::SLIME;

	public static function getNetworkTypeId() : string {
		return EntityIds::SLIME;
	}

	public function getName() : string {
		return "Slime";
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
		return true;
	}

	public function isNether() : bool {
		return true;
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
