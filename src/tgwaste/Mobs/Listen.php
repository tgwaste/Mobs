<?php

declare(strict_types=1);

namespace tgwaste\Mobs;

use pocketmine\entity\Entity;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDespawnEvent;
use pocketmine\event\entity\EntitySpawnEvent;
use pocketmine\player\Player;

class Listen implements Listener {
	public function onEntityDamageByEntityEvent(EntityDamageByEntityEvent $event) {
		$entity = $event->getEntity();
	}

	public function onEntityDamageEvent(EntityDamageEvent $event) {
		$entity = $event->getEntity();
	}

	public function onEntityDespawnEvent(EntityDespawnEvent $event) {
		$entity = $event->getEntity();
		if (method_exists($entity, "getName") and $entity instanceof Entity) {
			Main::$instance->toolsobj->spawnMessage($entity, "Despawned");
		}
	}

	public function onEntitySpawnEvent(EntitySpawnEvent $event) {
		$entity = $event->getEntity();
		if ($entity instanceof Entity) {
			Main::$instance->toolsobj->spawnMessage($entity, "Spawned");
		}
	}
}
