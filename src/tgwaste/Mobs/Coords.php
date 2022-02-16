<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\block\Water;
use pocketmine\math\Vector3;
use pocketmine\world\World;
use pocketmine\player\Player;
use tgwaste\Mobs\Entities\MobsEntity;

class Coords {
	public function getSaferSpawn(Vector3 $start, World $world, int $radius) : Vector3 {
		for ($r = $radius; $r > 5; $r -= 5) {
			$x = mt_rand(-$r, $r);
			$m = sqrt(pow($r, 2) - pow($x, 2));
			$z = mt_rand((int)-$m, (int)$m);

			$vec = new Vector3($start->x + $x, $start->y, $start->z + $z);

			$chunk = $world->getOrLoadChunkAtPosition($vec);

			if ($chunk === null) {
				continue;
			}

			$safe = $world->getSafeSpawn($vec);

			if ($safe->y > 0) {
				return $safe;
			}
		}

		return $start;
	}

	public function getRandomDestination(MobsEntity $entity) : Vector3 {
		$pos = $this->getEnemyDestination($entity);

		if (!$pos->equals(new Vector3(0, 0, 0))) {
			return $pos;
		}

		$pos = $this->getSaferSpawn($entity->getPosition(), $entity->getWorld(), 15);

		if ($entity->isFlying() == true) {
			$pos->add(0, 8, 0);
		}

		if ($entity->isSwimming() == true) {
			$pos->add(0, mt_rand(-8, 8), 0);
		}

		$block = $entity->getWorld()->getBlock($pos);

		if ($entity->isSwimming() and !$block instanceof Water) {
			$entity->setTimer(40);
			return new Vector3(0, 0, 0);
		}

		if (!$entity->isSwimming() and $block instanceof Water) {
			$entity->setTimer(40);
			return new Vector3(0, 0, 0);
		}

		if ($block->isSolid()) {
			$entity->setTimer(40);
			return new Vector3(0, 0, 0);
		}

		return $pos;
	}

	public function getEnemyDestination(MobsEntity $entity) : Vector3 { 
		if ($entity->isHostile() == false) {
			return new Vector3(0, 0, 0);
		}

		if ($entity->getTargetEntity() !== null) {
			return $entity->getTargetEntity()->getPosition()->asVector3();
		}

		foreach ($entity->getWorld()->getNearbyEntities($entity->getBoundingBox()->expandedCopy(15, 15, 15)) as $e) {
			if ($e instanceof Player and $e->isAlive() and $e->isCreative() == false) {
				$entity->setTargetEntity($e);
				$pos = $e->getPosition();
				return new Vector3($pos->x, 0, $pos->z);
			}

			if (($e instanceof Player or $e instanceof MobsEntity) and $e->getName() === $entity->mortalEnemy()) {
				$entity->setTargetEntity($e);
				$entity->setMovementSpeed(2.00);
				$pos = $e->getPosition();
				return new Vector3($pos->x, 0, $pos->z);
			}
		}

		return new Vector3(0, 0, 0);
	}
}
