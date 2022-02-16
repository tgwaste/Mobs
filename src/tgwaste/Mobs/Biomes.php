<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\data\bedrock\BiomeIds;
use pocketmine\player\Player;

class Biomes {
	public function getMobsForBiome(string $biome) {
		$biome = strtoupper($biome);
		$biometable = [
			"BIRCH FOREST" => ["Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"DESERT" => ["Cow", "Horse", "IronGolem", "Pig", "Rabbit", "Sheep"],
			"END" => ["Blaze", "MagmaCube", "Mooshroom", "Slime"],
			"FOREST" => ["Bat", "Cat", "Chicken", "Cow", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"HELL" => ["Blaze", "Ghast", "MagmaCube", "Mooshroom", "Slime"],
			"ICE PLAINS" => ["PolarBear"],
			"MOUNTAINS" => ["Bat", "Cat", "Chicken", "Cow", "Horse", "Llama", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"OCEAN" => ["Cod", "Dolphin", "ElderGuardian", "PufferFish", "Salmon", "Squid", "TropicalFish"],
			"PLAINS" => ["Cat", "Chicken", "Cow", "Donkey", "Horse", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep", "Villager"],
			"RIVER" => ["Cod", "PufferFish", "Salmon", "TropicalFish"],
			"SMALL MOUNTAIN" => ["Cat", "Chicken", "Cow", "Horse", "Llama", "Parrot", "Phantom", "Pig", "Rabbit", "Sheep"],
			"SWAMP" => ["Bat", "Cow", "Horse", "Pig", "Rabbit", "Sheep"],
			"TAIGA" => ["Bat", "Cat", "Chicken", "Cow", "Horse", "Ocelot", "Pig", "Rabbit", "Sheep"]
		];

		if (!array_key_exists($biome, $biometable)) {
			$biome = "PLAINS";
		}

		return $biometable[$biome];
	}

	public function getNightMobsForBiome(string $biome) {
		$biome = strtoupper($biome);
		$biometable = [
			"BIRCH FOREST" => ["CaveSpider", "Creeper", "Skeleton", "SkeletonHorse", "Spider", "Wolf", "Zombie"],
			"DESERT" => ["Creeper", "Husk", "Skeleton", "SkeletonHorse", "Spider", "Stray", "Wolf", "Zombie"],
			"END" => ["Enderman"],
			"FOREST" => ["CaveSpider", "Creeper", "Enderman", "Skeleton", "SkeletonHorse", "Spider", "Wolf", "Zombie"],
			"HELL" => ["Skeleton", "Zombie"],
			"ICE PLAINS" => ["Skeleton", "Zombie"],
			"MOUNTAINS" => ["CaveSpider", "Creeper", "Enderman", "Skeleton", "SkeletonHorse", "Spider", "Wolf", "Zombie"],
			"OCEAN" => ["Guardian", "Silverfish"],
			"PLAINS" => ["CaveSpider", "Creeper", "Enderman", "Skeleton", "SkeletonHorse", "Spider", "Wolf", "Zombie", "ZombieVillager"],
			"RIVER" => [],
			"SMALL MOUNTAIN" => ["CaveSpider", "Creeper", "Skeleton", "SkeletonHorse", "Spider", "Wolf", "Zombie"],
			"SWAMP" => ["CaveSpider", "SkeletonHorse", "Spider", "Stray", "Witch", "Zombie"],
			"TAIGA" => ["CaveSpider", "SkeletonHorse", "Spider", "Stray", "Zombie"],
		];

		if (!array_key_exists($biome, $biometable)) {
			$biome = "PLAINS";
		}

		return $biometable[$biome];
	}
}
