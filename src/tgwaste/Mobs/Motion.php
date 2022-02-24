<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use tgwaste\Mobs\Entities\MobsEntity;

class Motion {
	public function tick(MobsEntity $entity) {
		$timer = $entity->getTimer() - 1;
		$flying = $entity->isFlying();

		$entity->setTimer($timer);

		if ($timer > 0) {
			return $this->wait($entity);
		}

		if ($timer == 0 and $flying == false and mt_rand(0, 1) == 1 and $entity->getTargetEntity() === null) {
			return $entity->setTimer(mt_rand(100, 600));
		}

		$pos = $entity->getDestination();

		if (!$pos->x and !$pos->y and !$pos->z) {
			$entity->setDestination(Main::$instance->coordsobj->getRandomDestination($entity));
		}

		if ($entity->getTimer() > 0) {
			return;
		}

		$this->move($entity);
	}

	public function move(MobsEntity $entity) {
		$motion = $entity->getMotion();
		$location = $entity->getLocation();
		$swimming = $entity->isSwimming();
		$flying = $entity->isFlying();

		if (!$entity->onGround and $motion->y < 0 and $flying == false and $swimming == false) {
			$motion->y *= 0.6;
		}

		else {
			if (mt_rand(0, 500) == 1 or ($entity->isCollided == true and $swimming == true)) {
				# random chance of getting a new destination
				$entity->setDestination(Main::$instance->coordsobj->getRandomDestination($entity));
			}
			$targetpos = $this->calculateMotion($entity);
			$motion->x = $targetpos->x;
			$motion->y = $targetpos->y;
			$motion->z = $targetpos->z;
		}

		if ($entity->getTimer() > 0) {
			return;
		}

		if ($entity->isCollidedHorizontally == true and $swimming == false) {
			$motion->y = 1;
		}

		if ($entity->isJumping() == true and $entity->onGround) {
			$motion->y = 1;
		}

		if ($entity->getName() === "Chicken" and $entity->onGround and mt_rand(0, 100) >= 99) {
			$motion->y = 1;
		}

		$vec = new Vector3($motion->x, $motion->y, $motion->z);
		$look = new Vector3($location->x+$motion->x, $location->y+$motion->y+$entity->getEyeHeight(), $location->z+$motion->z);

		$entity->setDefaultLook($look);

		$entity->lookAt($look);
		$entity->setMotion($vec);
		$this->attackEntity($entity, 4);
	}

	public function wait(MobsEntity $entity) {
		$location = $entity->getLocation();

		if ($entity->lastUpdate % 100 == 0) {
			if ($entity->getHealth() < $entity->getMaxHealth()) {
				$entity->setHealth($entity->getHealth() + Main::$instance->regainhealth);
			}
			$entity->damageTag();
		}

		if ($entity->isFlying() == true) {
			return;
		}

		if ($entity->isSwimming() == true) {
			if (!$entity->isUnderwater()) {
				$entity->setTimer(-1);
			}
			return;
		}

		if ($entity->catchesFire() == true and Main::$instance->toolsobj->isDayTime($entity->getWorld())) {
			$entity->setOnFire(120);
			$entity->setTargetEntity($entity);
		}

		if ($entity->isOnFire()) {
			$this->attackEntity($entity, 4);
		}

		if (mt_rand(1, 200) == 1) {
			$entity->lookAt($entity->getDefaultLook());
			return;
		}

		if (mt_rand(1, 200) == 1) {
			$x = $location->x + mt_rand(-1, 1);
			$y = $location->y + mt_rand(-1, 1);
			$z = $location->z + mt_rand(-1, 1);
			$entity->lookAt(new Vector3($x, $y, $z));
		}
	}

	public function calculateMotion(MobsEntity $entity) : Vector3 {
		$dest = $entity->getDestination();
		$epos = $entity->getPosition();
		$motion = $entity->getMotion();
		$speed = $entity->getMovementSpeed();
		$speed = 1.0;
		$flying = $entity->isFlying();

		$x = $dest->x - $epos->x;
		$y = $dest->y - $epos->y;
		$z = $dest->z - $epos->z;

		if ($x ** 2 + $z ** 2 < 0.7) {
			if ($entity->getTargetEntity() === null) {
				$motion->y = 0;
				$entity->setTimer($flying == true ? 100 : 200);
				$entity->setDestination(new Vector3(0, 0, 0));
			}
		} else {
			$diff = abs($x) + abs($z);

			$motion->x = $speed * 0.15 * ($x / $diff);
			$motion->y = 0;
			$motion->z = $speed * 0.15 * ($z / $diff);

			if ($entity->isSwimming()) {
				$motion->y = $speed * 0.15 * ($y / $diff);
			}
		}

		return new Vector3($motion->x, $motion->y, $motion->z);
	}

	public function attackEntity(MobsEntity $entity, int $damage) {
		$target = $entity->getTargetEntity();

		if ($target === null) {
			return;
		}

		$dist = $entity->getPosition()->distanceSquared($target->getPosition());

		if (!$target->isAlive() or $dist >= 200 or ($target instanceof Player and $target->isCreative() == true)) {
			$entity->setMovementSpeed(1.00);
			$entity->setTargetEntity(null);
			return;
		}

		if ($entity->getAttackDelay() > 20 && $dist < 2) {
			$entity->setAttackDelay(0);
			$ev = new EntityDamageByEntityEvent($entity, $target, EntityDamageEvent::CAUSE_ENTITY_ATTACK, $damage);
			$target->attack($ev);
		}

		$entity->setAttackDelay($entity->getAttackDelay() + 1);

		$pos = $target->getPosition();
		$entity->setDestination(new Vector3($pos->x, 0, $pos->z));
  }
}
