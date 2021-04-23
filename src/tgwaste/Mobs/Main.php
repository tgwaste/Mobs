<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {
	public static $instance;

	public $classes;
	public $damagetags;
	public $flying;
	public $nospawn;
	public $regainhealth;
	public $spawnmobs;
	public $spawnmsgs;
	public $swimming;

	protected function onEnable() : void {
		self::$instance = $this;

		(new Registrations)->registerEntities();

		$this->classes = (new Registrations)->loadClasses();
		$this->flying = (new Registrations)->loadFlying();
		$this->swimming = (new Registrations)->loadSwimming();

		$this->saveDefaultConfig();
		$this->getScheduler()->scheduleRepeatingTask(new Schedule(), 200);
		$this->getServer()->getPluginManager()->registerEvents(new Listen(), $this);

		$this->damagetags = $this->getConfig()->get("damagetags");
		$this->nospawn = $this->getConfig()->get("nospawn");
		$this->regainhealth = $this->getConfig()->get("regainhealth");
		$this->spawnmobs = $this->getConfig()->get("spawnmobs");
		$this->spawnmsgs = $this->getConfig()->get("spawnmsgs");
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		if ($label === "listmobs") {
			(new Funcs)->listMobs($sender);
			return true;
		}

		if ($label === "killmobs") {
			(new Funcs)->killMobs($sender);
			return true;
		}

		if ($label === "summon") {
			if (count($args) < 1) {
				return false;
			}

			if (!array_key_exists($args[0], $this->classes)) {
				$sender->sendMessage("§cInvalid Mob§r");
				$available = "";
				foreach ($this->classes as $mobname => $typeclass) {
					$available = $available . " " . $mobname;
				}
				$sender->sendMessage("Available Mobs:§d$available §r");
				return true;
			}

			(new Spawn)->spawnEntity($args[0], $sender->getWorld(), $sender->getPosition());

			return true;
		}

		return false;
	}
}
