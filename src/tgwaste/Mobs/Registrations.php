<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\EntityFactory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\world\World;
use tgwaste\Mobs\Entities\Bat;
use tgwaste\Mobs\Entities\Blaze;
use tgwaste\Mobs\Entities\Cat;
use tgwaste\Mobs\Entities\CaveSpider;
use tgwaste\Mobs\Entities\Chicken;
use tgwaste\Mobs\Entities\Cod;
use tgwaste\Mobs\Entities\Cow;
use tgwaste\Mobs\Entities\Creeper;
use tgwaste\Mobs\Entities\Dolphin;
use tgwaste\Mobs\Entities\Enderman;
use tgwaste\Mobs\Entities\Horse;
use tgwaste\Mobs\Entities\Husk;
use tgwaste\Mobs\Entities\MagmaCube;
use tgwaste\Mobs\Entities\Mooshroom;
use tgwaste\Mobs\Entities\Parrot;
use tgwaste\Mobs\Entities\Phantom;
use tgwaste\Mobs\Entities\Pig;
use tgwaste\Mobs\Entities\PolarBear;
use tgwaste\Mobs\Entities\PufferFish;
use tgwaste\Mobs\Entities\Rabbit;
use tgwaste\Mobs\Entities\Salmon;
use tgwaste\Mobs\Entities\Sheep;
use tgwaste\Mobs\Entities\Skeleton;
use tgwaste\Mobs\Entities\Slime;
use tgwaste\Mobs\Entities\Spider;
use tgwaste\Mobs\Entities\Squid;
use tgwaste\Mobs\Entities\Stray;
use tgwaste\Mobs\Entities\TropicalFish;
use tgwaste\Mobs\Entities\Villager;
use tgwaste\Mobs\Entities\Wolf;
use tgwaste\Mobs\Entities\Zombie;

class Registrations {
	public function registerEntities() {
		$entityFactory = EntityFactory::getInstance();
		foreach (Main::$instance->classes as $entityName => $typeClass) {
			$entityFactory->register($typeClass,
				static function(World $world, CompoundTag $nbt) use($typeClass): MobsEntity {
					$entityClass = new $className(EntityDataHelper::parseLocation($nbt, $world), $nbt);
					return $entityClass;
				},
			[$entityName], $typeClass::TYPE_ID);
		}
	}

	public function getClasses() : array {
		return [
			"Bat" => Bat::class,
			"Blaze" => Blaze::class,
			"Cat" => Cat::class,
			"CaveSpider" => CaveSpider::class,
			"Chicken" => Chicken::class,
			"Cod" => Cod::class,
			"Cow" => Cow::class,
			"Creeper" => Creeper::class,
			"Dolphin" => Dolphin::class,
			"Enderman" => Enderman::class,
			"Horse" => Horse::class,
			"Husk" => Husk::class,
			"MagmaCube" => MagmaCube::class,
			"Mooshroom" => Mooshroom::class,
			"Parrot" => Parrot::class,
			"Phantom" => Phantom::class,
			"Pig" => Pig::class,
			"PolarBear" => PolarBear::class,
			"PufferFish" => PufferFish::class,
			"Rabbit" => Rabbit::class,
			"Salmon" => Salmon::class,
			"Sheep" => Sheep::class,
			"Skeleton" => Skeleton::class,
			"Slime" => Slime::class,
			"Spider" => Spider::class,
			"Squid" => Squid::class,
			"Stray" => Stray::class,
			"TropicalFish" => TropicalFish::class,
			"Villager" => Villager::class,
			"Wolf" => Wolf::class,
			"Zombie" => Zombie::class
		];
	}

	public function getFlying() : array {
		return [
			"Bat" => true,
			"Parrot" => true,
			"Phantom" => true
		];
	}

	public function getSwimming() : array {
		return [
			"Cod" => true,
			"Dolphin" => true,
			"PufferFish" => true,
			"Salmon" => true,
			"Squid" => true,
			"TropicalFish" => true
		];
	}
}
