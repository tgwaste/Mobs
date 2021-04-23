<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\entity\Entity;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;

trait Traits {
	public $attackdelay;
	public $defaultlook;
	public $destination;
	public $timer;

	public function initEntity(CompoundTag $nbt) : void {
		$this->canClimb(true);
		$this->setImmobile(false);
		$this->setHealth(20);
		$this->setMaxHealth(20);
		$this->setMovementSpeed(1.00);
		$this->setHasGravity(true);

		$this->attackdelay = 0;
		$this->defaultlook = new Vector3(0, 0, 0);
		$this->destination = new Vector3(0, 0, 0);
		$this->timer = -1;

		if ($this->isFlying() == true or $this->isSwimming() == true) {
			$this->setHasGravity(false);
		}

		parent::initEntity($nbt);
	}

	protected function getInitialSizeInfo() : EntitySizeInfo {
		return new EntitySizeInfo(1.8, 0.6);
	}

	public function canSaveWithChunk() : bool {
		return false;
	}

	public function setDefaultLook(Vector3 $defaultlook) {
		$this->defaultlook = $defaultlook;
	}

	public function getDefaultLook() {
		return $this->defaultlook;
	}

	public function setDestination(Vector3 $destination) {
		$this->destination = $destination;
	}

	public function getDestination() : Vector3 {
		return $this->destination;
	}

	public function setTimer(int $timer) {
		$this->timer = $timer;
	}

	public function getTimer() : int {
		return $this->timer;
	}

	public function setAttackDelay(int $attackdelay) {
		$this->attackdelay = $attackdelay;
	}

	public function getAttackDelay() {
		return $this->attackdelay;
	}

	public function damageTag() {
		$damagetags = Main::$instance->damagetags;

		$name = $this->getName();
		$health = $this->getHealth();
		$maxhealth = $this->getMaxHealth();
		$percent = (int)(($health * 100.0) / $maxhealth);

		if ($damagetags == true and $percent < 100) {
			$this->setNameTag("$name §c♥§a $percent §r");
		} else {
			$damagetags = false;
			$this->setNameTag($this->getName());
		}

		$this->setNameTagVisible($damagetags);
		$this->setNameTagAlwaysVisible($damagetags);
	}

	public function knockBack(float $x, float $z, float $base = 0.4): void {
		if ($this->isHostile() == true) {
			$this->timer = 20;
			$this->setMovementSpeed(1.00);
		} else {
			$this->timer = 0;
			$this->setMovementSpeed(2.00);
		}
		$this->damageTag();
		parent::knockBack($x, $z, $base);
	}

	public function entityBaseTick(int $diff = 1) : bool {
		(new Motion)->tick($this);
		return parent::entityBaseTick($diff);
	}
}
