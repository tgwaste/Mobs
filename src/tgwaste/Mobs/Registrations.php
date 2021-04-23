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
use tgwaste\Mobs\Entities\EnderDragon;
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
		(new EntityFactory)->register(Bat::class,
			function(World $world, CompoundTag $nbt) : Bat {
				return new Bat(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Bat', 'minecraft:bat'], EntityLegacyIds::BAT
		);

		(new EntityFactory)->register(Blaze::class,
			function(World $world, CompoundTag $nbt) : Blaze {
				return new Blaze(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Blaze', 'minecraft:blaze'], EntityLegacyIds::BLAZE
		);

		(new EntityFactory)->register(Cat::class,
			function(World $world, CompoundTag $nbt) : Cat {
				return new Cat(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Cat', 'minecraft:cat'], EntityLegacyIds::CAT
		);

		(new EntityFactory)->register(CaveSpider::class,
			function(World $world, CompoundTag $nbt) : CaveSpider {
				return new CaveSpider(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['CaveSpider', 'minecraft:cave_spider'], EntityLegacyIds::CAVE_SPIDER
		);

		(new EntityFactory)->register(Chicken::class,
			function(World $world, CompoundTag $nbt) : Chicken {
				return new Chicken(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Chicken', 'minecraft:chicken'], EntityLegacyIds::CHICKEN
		);

		(new EntityFactory)->register(Cod::class,
			function(World $world, CompoundTag $nbt) : Cod {
				return new Cod(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Cod', 'minecraft:cod'], EntityLegacyIds::COD
		);

		(new EntityFactory)->register(Cow::class,
			function(World $world, CompoundTag $nbt) : Cow {
				return new Cow(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Cow', 'minecraft:cow'], EntityLegacyIds::COW
		);

		(new EntityFactory)->register(Creeper::class,
			function(World $world, CompoundTag $nbt) : Creeper {
				return new Creeper(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Creeper', 'minecraft:creeper'], EntityLegacyIds::CREEPER
		);

		(new EntityFactory)->register(Dolphin::class,
			function(World $world, CompoundTag $nbt) : Dolphin {
				return new Dolphin(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Dolphin', 'minecraft:dolphin'], EntityLegacyIds::DOLPHIN
		);

		(new EntityFactory)->register(EnderDragon::class,
			function(World $world, CompoundTag $nbt) : EnderDragon {
				return new EnderDragon(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['EnderDragon', 'minecraft:ender_dragon'], EntityLegacyIds::ENDER_DRAGON
		);

		(new EntityFactory)->register(Enderman::class,
			function(World $world, CompoundTag $nbt) : Enderman {
				return new Enderman(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Enderman', 'minecraft:enderman'], EntityLegacyIds::ENDERMAN
		);

		(new EntityFactory)->register(Horse::class,
			function(World $world, CompoundTag $nbt) : Horse {
				return new Horse(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Horse', 'minecraft:horse'], EntityLegacyIds::HORSE
		);

		(new EntityFactory)->register(Husk::class,
			function(World $world, CompoundTag $nbt) : Husk {
				return new Husk(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Husk', 'minecraft:husk'], EntityLegacyIds::HUSK
		);

		(new EntityFactory)->register(MagmaCube::class,
			function(World $world, CompoundTag $nbt) : MagmaCube {
				return new MagmaCube(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['MagmaCube', 'minecraft:magma_cube'], EntityLegacyIds::MAGMA_CUBE
		);

		(new EntityFactory)->register(Mooshroom::class,
			function(World $world, CompoundTag $nbt) : Mooshroom {
				return new Mooshroom(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Mooshroom', 'minecraft:mooshroom'], EntityLegacyIds::MOOSHROOM
		);

		(new EntityFactory)->register(Parrot::class,
			function(World $world, CompoundTag $nbt) : Parrot {
				return new Parrot(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Parrot', 'minecraft:parrot'], EntityLegacyIds::PARROT
		);

		(new EntityFactory)->register(Phantom::class,
			function(World $world, CompoundTag $nbt) : Phantom {
				return new Phantom(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Phantom', 'minecraft:phantom'], EntityLegacyIds::PHANTOM
		);

		(new EntityFactory)->register(Pig::class,
			function(World $world, CompoundTag $nbt) : Pig {
				return new Pig(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Pig', 'minecraft:pig'], EntityLegacyIds::PIG
		);

		(new EntityFactory)->register(PolarBear::class,
			function(World $world, CompoundTag $nbt) : PolarBear {
				return new PolarBear(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['PolarBear', 'minecraft:polar_bear'], EntityLegacyIds::POLAR_BEAR
		);

		(new EntityFactory)->register(PufferFish::class,
			function(World $world, CompoundTag $nbt) : PufferFish {
				return new PufferFish(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['PufferFish', 'minecraft:pufferfish'], EntityLegacyIds::PUFFERFISH
		);

		(new EntityFactory)->register(Rabbit::class,
			function(World $world, CompoundTag $nbt) : Rabbit {
				return new Rabbit(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Rabbit', 'minecraft:rabbit'], EntityLegacyIds::RABBIT
		);

		(new EntityFactory)->register(Salmon::class,
			function(World $world, CompoundTag $nbt) : Salmon {
				return new Salmon(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Salmon', 'minecraft:salmon'], EntityLegacyIds::SALMON
		);

		(new EntityFactory)->register(Sheep::class,
			function(World $world, CompoundTag $nbt) : Sheep {
				return new Sheep(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Sheep', 'minecraft:sheep'], EntityLegacyIds::SHEEP
		);

		(new EntityFactory)->register(Skeleton::class,
			function(World $world, CompoundTag $nbt) : Skeleton {
				return new Skeleton(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Skeleton', 'minecraft:skeleton'], EntityLegacyIds::SKELETON
		);

		(new EntityFactory)->register(Slime::class,
			function(World $world, CompoundTag $nbt) : Slime {
				return new Slime(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Slime', 'minecraft:slime'], EntityLegacyIds::SLIME
		);

		(new EntityFactory)->register(Spider::class,
			function(World $world, CompoundTag $nbt) : Spider {
				return new Spider(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Spider', 'minecraft:spider'], EntityLegacyIds::SPIDER
		);

		(new EntityFactory)->register(Squid::class,
			function(World $world, CompoundTag $nbt) : Squid {
				return new Squid(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Squid', 'minecraft:squid'], EntityLegacyIds::SQUID
		);

		(new EntityFactory)->register(Stray::class,
			function(World $world, CompoundTag $nbt) : Stray {
				return new Stray(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Stray', 'minecraft:stray'], EntityLegacyIds::STRAY
		);

		(new EntityFactory)->register(TropicalFish::class,
			function(World $world, CompoundTag $nbt) : TropicalFish {
				return new TropicalFish(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['TropicalFish', 'minecraft:tropicalfish'], EntityLegacyIds::TROPICALFISH
		);

		(new EntityFactory)->register(Villager::class,
			function(World $world, CompoundTag $nbt) : Villager {
				return new Villager(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Villager', 'minecraft:villager'], EntityLegacyIds::VILLAGER
		);

		(new EntityFactory)->register(Wolf::class,
			function(World $world, CompoundTag $nbt) : Wolf {
				return new Wolf(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Wolf', 'minecraft:wolf'], EntityLegacyIds::WOLF
		);

		(new EntityFactory)->register(Zombie::class,
			function(World $world, CompoundTag $nbt) : Zombie {
				return new Zombie(EntityDataHelper::parseLocation($nbt, $world), $nbt);
			},
			['Zombie', 'minecraft:zombie'], EntityLegacyIds::ZOMBIE
		);
	}

	public function loadClasses() : array {
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
			"EnderDragon" => EnderDragon::class,
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

	public function loadFlying() : array {
		return [
			"Bat" => true,
			"EnderDragon" => true,
			"Parrot" => true,
			"Phantom" => true
		];
	}

	public function loadSwimming() : array {
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
