<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

class Attributes {
	public function isFlying(string $name) : bool {
		return in_array($name, ["Bat", "Blaze", "Parrot", "Phantom", "Ghast"]);
	}

	public function isJumping(string $name) : bool {
		return in_array($name, ["Rabbit"]);
	}

	public function isSwimming(string $name) : bool {
		return in_array($name, ["Cod", "Dolphin", "ElderGuardian", "PufferFish", "Salmon", "Silverfish", "Squid", "TropicalFish"]);
	}

	public function isHostile(string $name) : bool {
		return in_array($name, [
			"Blaze", "CaveSpider", "Creeper", "Guardian", "Husk", "Silverfish", "Skeleton", "SkeletonHorse",
			"Slime", "Spider", "Stray", "Witch", "Wolf", "Zombie", "ZombieVillager"
		]);
	}

	public function isNetherMob(string $name) : bool {
		return in_array($name, ["Blaze", "Chicken", "Enderman", "Ghast", "MagmaCube", "Mooshroom", "Skeleton", "Slime"]);
	}

	public function isSnowMob(string $name) : bool {
		return in_array($name, ["PolarBear"]);
	}

	public function canCatchFire(string $name) : bool {
		return in_array($name, ["Skeleton", "Zombie"]);
	}

	public function getMortalEnemy(string $name) : string {
		$enemies = array("Skeleton" => "Wolf", "Wolf" => "Skeleton", "Zombie" => "Villager");
		foreach ($enemies as $source => $target) {
			if ($source === $name) {
				return $target;
			}
		}
		return "none";
	}
}
