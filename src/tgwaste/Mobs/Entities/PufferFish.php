<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\WaterAnimal;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use tgwaste\Mobs\Traits;

class PufferFish extends WaterAnimal {
	use Traits;

	const TYPE_ID = EntityLegacyIds::PUFFERFISH;

	public static function getNetworkTypeId() : string {
		return EntityIds::PUFFERFISH;
	}

	public function getName() : string {
		return "PufferFish";
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
