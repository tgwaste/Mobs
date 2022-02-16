<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\player\Player;
use pocketmine\world\World;
use tgwaste\Mobs\Entities\MobsEntity;

class Tools {
	public function isDayTime(World $world) : bool {
		return $world->getSunAngleDegrees() < 90 or $world->getSunAngleDegrees() > 270;
	}

	public function getMobList() {
		$moblist = [];

		foreach (Main::$instance->getServer()->getWorldManager()->getWorlds() as $world) {
			$worldname = $world->getFolderName();

			foreach ($world->getEntities() as $entity) {
				if (!method_exists($entity, "getName")) {
					continue;
				}

				if ($entity instanceof Player) {
					continue;
				}

				$mobname = $entity->getName();

				if (!array_key_exists($worldname, $moblist)) {
					$moblist[$worldname] = [];
				}

				if (!array_key_exists($mobname, $moblist[$worldname])) {
					$moblist[$worldname][$mobname] = 0;
				}

				$moblist[$worldname][$mobname] += 1;
			}
		}

		return $moblist;
	}

	public function listMobs(CommandSender $sender) {
		$total = 0;
		$moblist = $this->getMobList();

		foreach ($moblist as $worldname => $attr) {
			$t = 0;

			foreach ($attr as $name => $value) {
				$t += $value;
			}

			$total += $t;

			$message = "§d$worldname §7(§r$t" . "§7)§r";

			foreach ($attr as $name => $value) {
				$message .= " §9-§r $name §7(§r$value" . "§7)§r";
			}

			$sender->sendMessage($message);
		}

		if (!$total) {
			$sender->sendMessage("No Mobs");
		}
	}

	public function killMobs(CommandSender $sender) {
		$total = 0;

		foreach (Main::$instance->getServer()->getWorldManager()->getWorlds() as $world) {
			foreach ($world->getEntities() as $entity) {
				if (!method_exists($entity, "getName")) {
					continue;
				}

				if ($entity instanceof Player) {
					continue;
				}

				if ($entity instanceof MobsEntity) {
					$total++;
					$entity->kill();
				}
			}
		}

		$sender->sendMessage("Killed §d$total §rMobs");
	}

	public function spawnMessage(Entity $entity, string $header) {
		if (Main::$instance->spawnmsgs == false) {
			return;
		}

		if ($entity instanceof MobsEntity) {
			$name = $entity->getName();
		} else {
			$name = $entity->getNameTag();
		}

		$eid = $entity->getId();
		$nametag = $entity->getNameTag();
		$position = $entity->getPosition();
		$world = $entity->getWorld();

		$worldname = $world->getFolderName();
		$biome = $world->getBiome((int)$position->x, (int)$position->z)->getName();

		$biometag = $this->getBiomeTag($biome);
		$nametag = str_replace(["\n"], "", $nametag);

		Main::$instance->getServer()->getLogger()->info("$header §e$name/$eid §r($nametag) in world §d$worldname §r($biometag)");
	}

	public function getBiomeTag(string $biome) : string {
		$color = "§a";

		if ($biome === "End" or $biome === "Hell" or $biome === "Void") {
			$color = "§c";
		}

		else if ($biome === "Ocean" or $biome === "River") {
			$color = "§b";
		}

		else if ($biome === "Ice Plains") {
			$color = "§e";
		}

		else if ($biome === "Desert") {
			$color = "§6";
		}

		else {
			$color = "§a";
		}

		return "$color$biome" . "§r";
	}
}
