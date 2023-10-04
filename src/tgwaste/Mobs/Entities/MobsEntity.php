<?php

declare(strict_types=1);

namespace tgwaste\Mobs\Entities;

use pocketmine\data\bedrock\LegacyEntityIdToStringIdMap;
use pocketmine\entity\Entity;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\Living;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

use tgwaste\Mobs\Attributes;
use tgwaste\Mobs\Main;
use tgwaste\Mobs\Motion;
use tgwaste\Mobs\Registrations;

class MobsEntity extends Living {
	const TYPE_ID = "";

    protected int $health = 10;
    protected float $speed = 1.00;
    protected bool $canClimb = false;
    protected bool $gravityMob = true;

    protected float $entitySizeHeigth = 2.5;
    protected float $entitySizeWidth = 1.0;

    protected $canDrop = false;

	public $attackdelay;
	public $defaultlook;
	public $destination;
	public $timer;

	public static function getNetworkTypeId() : string {
		return static::TYPE_ID;
	}

	public function initEntity(CompoundTag $nbt) : void {
		$this->setHealth($this->health);
        $this->setMaxHealth($this->health);
        $this->setMovementSpeed($this->speed);
        $this->setCanClimb($this->canClimb);
        $this->setHasGravity($this->gravityMob);

		$this->attackdelay = 0;
		$this->defaultlook = new Vector3(0, 0, 0);
		$this->destination = new Vector3(0, 0, 0);
		$this->timer = -1;

		parent::initEntity($nbt);
	}

	public function getName() : string {
		$data = explode("\\", get_class($this));
		$name = end($data);
		return $name;
	}

	protected function getInitialSizeInfo() : EntitySizeInfo {
		return new EntitySizeInfo($this->entitySizeHeigth, $this->entitySizeWidth);
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
			$this->setNameTag("$name §c♥§a {$percent}§f% §r");
		} else {
			$damagetags = false;
			$this->setNameTag($this->getName());
		}

		$this->setNameTagVisible($damagetags);
		$this->setNameTagAlwaysVisible($damagetags);
	}

	public function knockBack(float $x, float $z, float $force = 0.4, ?float $verticalLimit = 0.4): void {
		if ($this->isHostile() == true) {
			$this->timer = 20;
			$this->setMovementSpeed(1.00);
		} else {
			$this->timer = 0;
			$this->setMovementSpeed(2.00);
		}
		$this->damageTag();
		parent::knockBack($x, $z, $force);
	}

	public function entityBaseTick(int $diff = 1) : bool {
		(new Motion)->tick($this);
		return parent::entityBaseTick($diff);
	}

	public function mortalEnemy() : string {
		return (new Attributes)->getMortalEnemy($this->getName());
	}

	public function catchesFire() : bool {
		return (new Attributes)->canCatchFire($this->getName());
	}

	public function isFlying() : bool {
		return (new Attributes)->isFlying($this->getName());
	}

	public function isJumping() : bool {
		return (new Attributes)->isJumping($this->getName());
	}

	public function isHostile() : bool {
		return (new Attributes)->isHostile($this->getName());
	}

	public function isNether() : bool {
		return (new Attributes)->isNetherMob($this->getName());
	}

	public function isSnow() : bool {
		return (new Attributes)->isSnowMob($this->getName());
	}

	public function isSwimming() : bool {
		$swim = (new Attributes)->isSwimming($this->getName());
		$ticks = $this->getAirSupplyTicks();
		$maxticks = $this->getMaxAirSupplyTicks();
		if ($swim == true and $this->isBreathing() == false and $ticks < ($maxticks/2)) {
			$this->setAirSupplyTicks($maxticks);
		}
		return $swim;
	}

	public function fall(float $fallDistance) : void {
	}    

    // set flag: canDrop
    public function applyDamageModifiers(EntityDamageEvent $source) : void {
        if (!$this->canDrop) {
            if ($source instanceof EntityDamageByEntityEvent && ($attacker = $source->getDamager()) !== null) {
                $this->canDrop = ($attacker instanceof Player);
            }
        }
        parent::applyDamageModifiers($source);
    }

    public function canDrop() : bool {
    	return $this->canDrop;
    }


}
