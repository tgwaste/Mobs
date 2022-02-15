<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\Living;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use tgwaste\Mobs\Traits;

class Zombie extends Living {
	use Traits;

	const TYPE_ID = EntityLegacyIds::ZOMBIE;

	public static function getNetworkTypeId() : string {
		return EntityIds::ZOMBIE;
	}

	public function getName() : string {
		return "Zombie";
	}

	public function mortalEnemy() : string {
		return "Villager";
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
