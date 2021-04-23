<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\data\bedrock\BiomeIds;
use pocketmine\entity\Entity;
use pocketmine\player\Player;

class Biomes {
	public function getMobsForBiome(string $biome) {
		$biome = strtoupper($biome);

		$biometable = [
			"BIRCH FOREST" => ["Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"DESERT" => ["Cow", "Horse", "Pig", "Rabbit", "Sheep"],
			"END" => ["Blaze", "MagmaCube", "Mooshroom", "Slime"],
			"FOREST" => ["Bat", "Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"HELL" => ["Blaze", "MagmaCube", "Mooshroom", "Slime"],
			"ICE PLAINS" => ["PolarBear"],
			"MOUNTAINS" => ["Bat", "Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"OCEAN" => ["Cod", "Dolphin", "PufferFish", "Salmon", "Squid", "TropicalFish"],
			"PLAINS" => ["Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep", "Villager"],
			"RIVER" => ["Cod", "PufferFish", "Salmon", "TropicalFish"],
			"SMALL MOUNTAIN" => ["Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"SWAMP" => ["Bat", "Cow", "Horse", "Pig", "Rabbit", "Sheep"],
			"TAIGA" => ["Bat", "Cat", "Chicken", "Cow", "Horse", "Pig", "Rabbit", "Sheep"]
		];

		if (!array_key_exists($biome, $biometable)) {
			$biome = "PLAINS";
		}

		return $biometable[$biome];
	}

	public function getNightMobsForBiome(string $biome) {
		$biome = strtoupper($biome);

		$biometable = [
			"BIRCH FOREST" => ["CaveSpider", "Creeper", "Skeleton", "Spider", "Wolf", "Zombie"],
			"DESERT" => ["Creeper", "Husk", "Skeleton", "Spider", "Stray", "Wolf", "Zombie"],
			"END" => ["Enderman"],
			"FOREST" => ["CaveSpider", "Creeper", "Enderman", "Skeleton", "Spider", "Wolf", "Zombie"],
			"HELL" => ["Skeleton", "Zombie"],
			"ICE PLAINS" => ["Skeleton", "Zombie"],
			"MOUNTAINS" => ["CaveSpider", "Creeper", "Enderman", "Skeleton", "Spider", "Wolf", "Zombie"],
			"OCEAN" => [],
			"PLAINS" => ["CaveSpider", "Creeper", "Enderman", "Skeleton", "Spider", "Wolf", "Zombie"],
			"RIVER" => [],
			"SMALL MOUNTAIN" => ["CaveSpider", "Creeper", "Skeleton", "Spider", "Wolf", "Zombie"],
			"SWAMP" => ["CaveSpider", "Spider", "Stray", "Zombie"],
			"TAIGA" => ["CaveSpider", "Spider", "Stray", "Zombie"],
		];

		if (!array_key_exists($biome, $biometable)) {
			$biome = "PLAINS";
		}

		return $biometable[$biome];
	}
}
